//Drawer Tag for security panel
$("#pageModal").on("hidden.bs.modal", function () {
    $("#securityForm").trigger('reset')
    $(this).find("small.text-danger").html("")
});

// $("#securityForm").submit(function (event) {
//     event.preventDefault()
//     let formData = $(this).serialize()
//     $("#contents").load(`{{url("security/check")}}?${formData}`, function (responseTxt, statusTxt) {
//         if (statusTxt === 'error') {
//             let rep = JSON.parse(responseTxt);
//             $("#message").html(rep.message)
//         } else {
//             $("#pageModal").modal('hide')
//             $("#securityForm").trigger('reset')
//             $(this).find("small.text-danger").html("")
//         }
//     })
// })

function showSecurityPanel(drawerKey) {
    $('input#drawer-key').val(drawerKey)
    $('#pageModal').removeClass('content-modal').modal('show');
}

function enterDrawer(url) {
    $("#contents").load(url)
}

function checkSecurity(event, that, url) {
    event.preventDefault();
    let formData = $(that).serialize()
    $("#contents").load(`${url}?${formData}`, function (responseTxt, statusTxt) {
        if (statusTxt === 'error') {
            let rep = JSON.parse(responseTxt);
            $("#message").html(rep.message)
        } else {
            $("#pageModal").modal('hide')
            $("#securityForm").trigger('reset')
            $(this).find("small.text-danger").html("")
        }
    })
}
