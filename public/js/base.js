$(function () {
    if (location.href === location.origin + '/content') {
        if (history.state != null || history.state !== '') {
            $("#contents").html(history.state.data)
        }
    }
});

window.onpopstate = (event) => {

    let state = event.state;

    if (location.href === location.origin + '/content') {
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

