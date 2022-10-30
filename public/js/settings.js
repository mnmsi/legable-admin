function changeMasterKeyStatus(url) {
    $.ajax({
        type: "get",
        url: url,
        dataType: "json",
        success: function (response) {
            showSuccessMessageOnDivById('statusDiv', response.status, response.message)
        },
        error: function (error) {
            showSuccessMessageOnDivById('statusDiv', 'danger', error.responseJSON.message)
        }
    });
}

function showSuccessMessageOnDivById(id, type, msg) {
    $("#" + id).html(`<div class="alert alert-${type} justify-content-center">
                            ${msg}
                        </div>`)
}
