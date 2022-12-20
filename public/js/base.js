$(function () {
    if (isCurrentUrl('content') || isCurrentUrl('drawer') || isCurrentUrl()) {
        if (history.state != null || history.state !== '') {
            $("#contents").html(history.state.data)
        }
    }
});

window.onpopstate = (event) => {

    let state = event.state;

    if (isCurrentUrl('content') || isCurrentUrl('drawer') || isCurrentUrl()) {
        if ($.isEmptyObject(state)) {
            location.reload()
        } else {
            $("#contents").html(state.data)
        }
    }

    location.reload()
};

window.onclick = (event) => {

    let target = $(event.target).closest("a");
    if (target.attr('id') === 'content' || target.attr('id') === 'dashboard' || target.attr('id') === 'secretDrawer') {
        history.pushState(null, '', target.attr('href'))
    }
}

function updateNotificationStatus(notId) {
    $.ajax({
        type: "get",
        url: "http://34.207.161.107/wp-json/wl/v1/notification/?id=" + notId,
        dataType: "json",
        success: function (response) {
            console.log('success')
        },
        error: function (error) {
            console.log('error')
        }
    });
}

$('form').on('submit', function(e) {
    $(this).find('button, input[type=button]').prop('disabled', true);
});
