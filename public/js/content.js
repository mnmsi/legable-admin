//Drawer Tag for security panel
$("#pageModal").on("hidden.bs.modal", function () {
    $("#securityForm").trigger('reset')
    $(this).find("small.text-danger").html("")
});

function showSecurityPanel(drawerKey, drawerName) {
    $('input#drawer-key').val(drawerKey)
    $('input#drawer-name').val(drawerName)
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
    let dataObj = {url: url, drawer_name: $(that).attr('data-drawer-name')}

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
