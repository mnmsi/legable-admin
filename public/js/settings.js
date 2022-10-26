function changeMasterKeyStatus(url) {
    $.ajax({
        type: "get",
        url: url,
        dataType: "json",
        success: function (response) {
            showSuccessMessageOnDivById('statusDiv', response.message)
        },
        error: function (error) {
            showSuccessMessageOnDivById('statusDiv', error.responseJSON.message)
        }
    });
}

function showSuccessMessageOnDivById(id, msg) {
    $("#" + id).html(`<div class="alert alert-success justify-content-center">
                            ${msg}
                        </div>`)
}
