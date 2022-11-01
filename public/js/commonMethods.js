function showAjaxMessageOnDivById(id, type, msg) {
    $("#" + id).html(`<div class="alert alert-${type} justify-content-center">
                            ${msg}
                        </div>`)
}

function showSmallText(id, type, msg) {
    $("#" + id).html(`<small class="text-small text-${type} ml-3" id="message">${msg}</small>`)
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

function isAO(val) {
    return val instanceof Array || val instanceof Object;
}

function isNullOrUndef(variable) {

    return (variable !== null && variable !== undefined);
}

function isString(val) {
    return typeof val === 'string';
}

function jsonParse(data)
{
    try {
        return JSON.parse(data);
    } catch (e) {
        return false;
    }
}
