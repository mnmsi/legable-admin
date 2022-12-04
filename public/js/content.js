//Drawer Tag for security panel
$("#pageModal").on("hidden.bs.modal", function () {
    $("#securityForm").trigger('reset')
    $(this).find("small.text-danger").html("")
});

$("#fileShowModal").on("hidden.bs.modal", function () {
    $("#allTypeContent").attr('src', "")
});

// show modal

function showSecurityPanel(contentKey, contentName, contentType) {
    $('input#drawer-key').val(contentKey)
    $('input#drawer-name').val(contentName)
    $('input#drawer-type').val(contentType)
    $('#pageModal').removeClass('content-modal').modal('show');
}

function enterDrawer(url, that) {
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
    let box = $("#box-drawer");
    box.prop('disabled', "disabled");
    $(`#box-drawer option[value=${id}]`).attr("selected", true);
    let value = box.val();
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
});

function uploadFileByAjax(event, that, url) {
    event.preventDefault();

    let data = new FormData(that);

    for (const pair of data.entries()) {
        console.log(`${pair[0]}, ${pair[1]}`);
    }


    $.ajax({
        type: 'POST',
        url: url,
        // headers: {'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')},
        data: new FormData(that),
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function (response) {
            console.log(response)
        },
        error: function (error) {
            console.log(error)
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
