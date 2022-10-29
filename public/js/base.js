$(function () {
    if (isCurrentUrl('content')) {
        if (history.state != null || history.state !== '') {
            $("#contents").html(history.state.data)
        }
    }
});

window.onpopstate = (event) => {

    let state = event.state;

    if (isCurrentUrl('content')) {
        if ($.isEmptyObject(state)) {
            location.reload()
        } else {
            $("#contents").html(state.data)
        }
    }
};

window.onclick = (event) => {

    let target = $(event.target).closest("a");
    if (target.attr('id') === 'content') {
        history.pushState(null, '', target.attr('href'))
    }
}

function isCurrentUrl(path) {
    return location.href === location.origin + `/${path}`
}

