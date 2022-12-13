//Drawer Tag for security panel
$("#pageModal").on("hidden.bs.modal", function () {
    $("#securityForm").trigger('reset')
    $(this).find("small.text-danger").html("")
});

$("#fileShowModal").on("hidden.bs.modal", function () {
    $("#allTypeContent").attr('src', "")
});

$("#uploadFileAjax").on("hidden.bs.modal", function () {
    $("#fileUploadFormA").trigger('reset')
    $("#contentErrors").html("")
    $("#contentDrawerDiv").hide()
    $("#contentBoxDiv").hide()

    $(".custom-file-upload").text('select a file to upload');
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
            showContent(response.data)
        }, error: function (error) {
            showSmallText('message', 'danger', error.responseJSON.message)
        }
    });
}

function showContent(image) {

    $("#allTypeContent").attr('src', image);
    $("#pageModal").modal('hide')
    $("#fileShowModal").modal('show')
}

function addBoxClick(id) {
    $("#drawerId").val(id);
    // let box = $("#box-drawer");
    // box.prop('disabled', "disabled");
    $(`#box-drawer option[value=${id}]`).attr("selected", true);
    // let value = box.val();
    $("#addBoxModal").modal('show');
}

function showContentModal(that) {
    $('#uploadFileAjax').modal('show');
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

    let formData = new FormData(that);
    formData.append('file', $("#fileUpload")[0].files[0])

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method: 'POST',
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function (response) {

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

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method: 'POST',
        url: url,
        data: new FormData(that),
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function (response) {

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

            } else {
                showAjaxMessageOnDivById("boxErrors", "danger", response.msg)
            }
        },
        error: function (error) {
            showHtmlOnAjaxResponse("boxErrors", error.responseJSON.errors)
        }
    });
}
