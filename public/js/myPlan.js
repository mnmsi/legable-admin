

function autoRenewal(url) {
    $.ajax({
        type: "get",
        url: url,
        dataType: "json",
        success: function (response) {
            showAjaxMessageOnDivById('autoRenewalStatus', response.status, response.message)
        },
        error: function (error) {
            showAjaxMessageOnDivById('autoRenewalStatus', 'danger', error.responseJSON.message)
        }
    });
}

function hidePlanModal() {
    $('#planModal').modal('hide')
    $('#planFormId').trigger('reset');
    location.reload()
}
