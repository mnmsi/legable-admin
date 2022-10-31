function showSuccessMessageOnDivById(id, type, msg) {
    $("#" + id).html(`<div class="alert alert-${type} justify-content-center">
                            ${msg}
                        </div>`)
}

function isCurrentUrl(path) {
    return location.href === location.origin + `/${path}`
}

let myRedirect = function (redirectUrl, arg, value) {
    let csrf = $("[name='csrf-token']").attr('content');
    let form = $('<form action="' + redirectUrl + '" method="post">' +
        '<input type="hidden" name="_token" value="' + csrf + '"></input>' +
        '<input type="hidden" name="' + arg + '" value="' + JSON.stringify(value).replaceAll('"', "'") + '"></input>' + '</form>');
    $('body').append(form);
    $(form).submit();
};
