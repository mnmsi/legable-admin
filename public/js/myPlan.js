function autoRenewal(url) {
    $.ajax({
        type: "get",
        url: url,
        dataType: "json",
        success: function (response) {
            showSuccessMessageOnDivById('autoRenewalStatus', response.status, response.message)
        },
        error: function (error) {
            showSuccessMessageOnDivById('autoRenewalStatus', 'danger', error.responseJSON.message)
        }
    });
}
