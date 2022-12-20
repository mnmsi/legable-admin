//Drawer Tag for security panel
$("#pageModal").on("hidden.bs.modal", function () {
    $("#securityForm").trigger('reset')
    $(this).find("small.text-danger").html("")
});

$("#fileShowModal").on("hidden.bs.modal", function () {
    $("#allTypeContent").attr('src', "")
    $("#allTypeContent").show();
    $("#pdf_viewer").attr('src', "")
    $("#my_pdf_viewer").hide();
    $("#statusDiv").html("");
    $("#informationDiv").html("");
    $("#excel_data").html("");
    $("#word_container").html("");
    $("#pdf_viewer").attr('src', "")

});

$("#helpCenterModal").on("hidden.bs.modal", function () {
    $("#helpCenterForm").trigger('reset');
});

$("#uploadFileWithoutAjax").on("hidden.bs.modal", function () {
    $(".custom-file-upload").text('select a file to upload');
    $("#fileUploadForm").trigger('reset')
    $('.field-error-txt').text('');
});

$("#uploadFileAjax").on("hidden.bs.modal", function () {
    $("#fileUploadFormA").trigger('reset')
    $("#contentErrors").html("")
    $("#contentDrawerDiv").hide()
    $("#contentBoxDiv").hide()
    $("#passwordFieldA").hide()

    $(".custom-file-upload").text('select a file to upload');
    $('#passwordField').hide();

    $(this).find('button, input[type=submit]').prop('disabled', false);
});

$("#addBoxModal").on("hidden.bs.modal", function () {
    $("#boxCreateFormId").trigger('reset')
    $("#boxErrors").html("")
});

// show modal
function showSecurityPanel(contentKey, contentName, contentType) {

    if (checkEventPropagationByClass('content-dropdown')) {
        return;
    }

    $('input#drawer-key').val(contentKey)
    $('input#drawer-name').val(contentName)
    $('input#drawer-type').val(contentType)
    $('#pageModal').removeClass('content-modal').modal('show');
}

function enterDrawer(url, that) {

    if (checkEventPropagationByClass('content-dropdown')) {
        return;
    }

    let dataObj = {url: url, drawer_name: $(that).attr('data-drawer-name')}

    $("#contents").load(url, function (responseTxt) {
        dataObj.data = responseTxt
        history.pushState(dataObj, dataObj.drawer_name)
    })
}

function checkSecurity(event, that, url) {
    event.preventDefault();
    let formData = $(that).serialize()
    let dataObj = {url: url, drawer_name: $("#drawer-name").val()}
    if ($("#drawer-type").val() === 'file') {
        getFile(url, formData);
    } else {
        loadDrawer(url, formData, dataObj);
    }
}

function loadDrawer(url, formData, dataObj) {
    $("#contents").load(`${url}?${formData}`, function (responseTxt, statusTxt) {
        $("#unlockBtn").prop('disabled', false);
        if (statusTxt === 'error') {
            let rep = JSON.parse(responseTxt);
            $("#message").html(rep.message)
        } else {
            dataObj.data = responseTxt
            history.pushState(dataObj, dataObj.drawer_name)
            $("#pageModal").modal('hide')
            $("#securityForm").trigger('reset')
            $(this).find("small.text-danger").html("")
        }
    })
}

function getFile(url, formData) {
    $.ajax({
        url: url,
        type: "GET",
        data: formData,
        success: function (response) {

            $("#unlockBtn").prop('disabled', false);
            clearShowDiv();

            if (response.fileMime) {
                if (response.fileMime.includes('excel') || response.fileMime.includes('csv')) {
                    showExcelFile(response.data, response.fileName)

                } else if ((response.fileMime.includes('msword') || response.fileMime.includes('document')) && !response.fileMime.includes('presentation')) {
                    parseWordDocxFile(response.data, response.fileName)

                } else if (response.fileMime.includes('pdf')) {
                    pdfRender(response.data, response.file_name)

                } else if (response.fileMime.includes('powerpoint') || response.fileMime.includes('presentation')) {

                    pptRender(response.data, response.fileName)
                } else {
                    showContent(response.data)
                }

            } else {
                showSmallText('message', 'danger', error.responseJSON.message ?? "Something went wrong!!")
            }

        }, error: function (error) {
            $("#unlockBtn").prop('disabled', false);
            showSmallText('message', 'danger', error.responseJSON.message ?? "Something went wrong!!")
        }
    });
}

function showContent(image, mimeType) {

    console.log(mimeType)

    clearShowDiv();

    if (mimeType === 'word') {
        axios({
            method: 'get',
            url: `${image}`,
            responseType: 'blob'
        }).then(function (response) {

            let reader = new FileReader();
            reader.readAsArrayBuffer(response.data);

            reader.onloadend = function (event) {

                let arrayBuffer = reader.result;

                mammoth.convertToHtml({arrayBuffer: arrayBuffer}).then(function (resultObject) {
                    $("#word_container").html(resultObject.value);
                })
            };
        })

        $("#allTypeContent").hide();
        $("#pageModal").modal('hide')
        $("#fileShowModal").modal('show');

    }
    else if (mimeType === 'excel') {

        axios({
            method: 'get',
            url: `${image}`,
            responseType: 'blob'
        }).then(function (response) {

            let reader = new FileReader();
            reader.readAsArrayBuffer(response.data);

            reader.onload = function (event) {

                let data = new Uint8Array(reader.result);
                let work_book = XLSX.read(data, {type: 'array'});
                let sheet_name = work_book.SheetNames;
                let sheet_data = XLSX.utils.sheet_to_json(work_book.Sheets[sheet_name[0]], {header: 1});

                if (sheet_data.length > 0) {
                    var table_output = '<table class="table table-striped table-bordered">';
                    for (var row = 0; row < sheet_data.length; row++) {
                        table_output += '<tr>';
                        for (var cell = 0; cell < sheet_data[row].length; cell++) {
                            if (row == 0) {
                                table_output += '<th>' + sheet_data[row][cell] + '</th>';
                            } else {
                                table_output += '<td>' + sheet_data[row][cell] + '</td>';
                            }
                        }
                        table_output += '</tr>';
                    }

                    table_output += '</table>';
                    $('#excel_data').html(table_output);
                }
            }

            $("#allTypeContent").hide();
            $("#pageModal").modal('hide')
            $("#fileShowModal").modal('show');
        })
    }
    else if (mimeType === 'powerpoint') {
        axios({
            method: 'get',
            url: `${image}`,
            responseType: 'blob'
        }).then(function (response) {

            let reader = new FileReader();
            reader.readAsDataURL(response.data);

            reader.onloadend = function () {
                $("#ppt_data").pptxToHtml({
                    pptxFileUrl: reader.result,
                });
            }

            $("#allTypeContent").hide();
            $("#pageModal").modal('hide')
            $("#fileShowModal").modal('show');
        })
    }
    else {
        $("#allTypeContent").attr('src', image);
        $("#pageModal").modal('hide')
        $("#fileShowModal").modal('show')
    }
}

function addBoxClick(id) {
    $("#drawerId").val(id);
    // let box = $("#box-drawer");
    // box.prop('disabled', "disabled");
    $(`#box-drawer option[value=${id}]`).attr("selected", true);
    // let value = box.val();
    $("#addBoxModal").modal('show');
}

function showAjaxContentModal(that) {
    $('#uploadFileAjax').modal('show');
}

function showContentModal(that) {
    $('#uploadFileWithoutAjax').modal('show');
}

//triggered when modal is about to be shown
$('#uploadFileAjax').on('show.bs.modal', function (e) {

    let button = $("#uploadContentBtn")
    //get data-id attribute of the clicked element
    let contentType = button.data('content-type');
    let contentId = button.data('content-id');

    //populate the textbox
    $(e.currentTarget).find('input[name="content_type"]').val(contentType);
    $(e.currentTarget).find('input[name="content_id"]').val(contentId);

    if (contentType === 'drawer') {
        $("#contentDrawerDiv").show();
        $('#drawerSelectId option[value="' + contentId + '"]').attr('selected', 'selected')
        $("#boxSelectId").removeAttr("name")
    } else {
        $("#contentBoxDiv").show();
        $('#boxSelectId option[value="' + contentId + '"]').attr('selected', 'selected')
        $("#drawerSelectId").removeAttr("name")
    }
});

function uploadFileByAjax(event, that, url) {
    event.preventDefault();

    let button = $(that).find('button, input[type=submit]');
    button.prop('disabled', true);

    let formData = new FormData(that);
    if ($("#fileUpload")[0].files[0] !== undefined) {
        formData.append('file', $("#fileUpload")[0].files[0])
    }

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method: 'POST',
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function (response) {
            button.prop('disabled', false);

            if (response.status) {
                showAjaxMessageOnDivById("contentErrors", "success", "Successful!!")

                //Log data on content
                $("#contents").html(response.data)

                //Update state
                let dataObj = {url: location.href, drawer_name: response.drawer_name, data: response.data}
                history.replaceState(dataObj, dataObj.drawer_name)

                //Hide modal after 3 seconds
                setTimeout(function () {
                    $("#uploadFileAjax").modal('hide')
                }, 2000)

            } else {
                showAjaxMessageOnDivById("contentErrors", "danger", response.errors)
            }
        },
        error: function (error) {
            button.prop('disabled', false);
            showHtmlOnAjaxResponse("contentErrors", error.responseJSON.errors)
        }
    });
}

function orderDrawer(url, order) {

    $.ajax({
        url: url,
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            order: order
        },
        success: function (response) {
            console.log("success")
        }, error: function (error) {
            console.log("error")
        }
    });
}

function uploadBoxByAjax(event, that, url) {
    event.preventDefault();
    let button = $(that).find('button, input[type=submit]');
    button.prop('disabled', true);

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method: 'POST',
        url: url,
        data: new FormData(that),
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function (response) {
            button.prop('disabled', false);

            if (response.status) {
                showAjaxMessageOnDivById("boxErrors", "success", response.msg)

                let drawerIn = $("#drawerId");
                if (drawerIn.val() !== "" || drawerIn.val() !== null || drawerIn.val() !== undefined) {
                    //Log data on content
                    $("#contents").html(response.data)

                    //Update state
                    let dataObj = {url: location.href, drawer_name: response.drawer_name, data: response.data}
                    history.replaceState(dataObj, dataObj.drawer_name)
                }

                //Hide modal after 3 seconds
                setTimeout(function () {
                    $("#addBoxModal").modal('hide')
                }, 2000)

                location.reload()

            } else {
                showAjaxMessageOnDivById("boxErrors", "danger", response.msg)
            }
        },
        error: function (error) {
            button.prop('disabled', false);
            showHtmlOnAjaxResponse("boxErrors", error.responseJSON.errors)
        }
    });
}

$("#checkPassA").change(function () {
    if ($(this).is(":checked")) {
        $('#passwordFieldA').show('fast');
    } else {
        $('#passwordFieldA').hide('fast');
    }
});

//    show file name
$("#fileUpload").on("change", function (e) {
    $(".custom-file-upload").text($(this).val().replace(/C:\\fakepath\\/i, ''));
})


//  show file name
$("#file-upload").on("change", function (e) {
    $(".custom-file-upload").text($(this).val().replace(/C:\\fakepath\\/i, ''));
})

$("#checkPassW").change(function () {
    if ($(this).is(":checked")) {
        $('#passwordField').show('fast');
    } else {
        $('#passwordField').hide('fast');
    }
});


function fileChange() {
    $(".custom-file-upload").text(event.target.files[0].name);
}
