function changeMasterKeyStatus(url) {
    $.ajax({
        type: "get",
        url: url,
        dataType: "json",
        success: function (response) {
            showAjaxMessageOnDivById('statusDiv', response.status, response.message)
        },
        error: function (error) {
            showAjaxMessageOnDivById('statusDiv', 'danger', error.responseJSON.message)
        }
    });
}
