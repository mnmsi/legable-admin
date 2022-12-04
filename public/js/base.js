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
};

window.onclick = (event) => {

    let target = $(event.target).closest("a");
    if (target.attr('id') === 'content' || target.attr('id') === 'dashboard' || target.attr('id') === 'secretDrawer') {
        history.pushState(null, '', target.attr('href'))
    }
}
