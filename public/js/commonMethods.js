function showAjaxMessageOnDivById(id, type, msg) {
    $("#" + id).html(`<div class="alert alert-${type} justify-content-center">
                            ${msg}
                        </div>`)
}

function showHtmlOnAjaxResponse(id, msg) {
    $("#" + id).html(msg)
}

function showSmallText(id, type, msg) {
    $("#" + id).html(`<small class="text-small text-${type} ml-3" id="message">${msg}</small>`)
}

function isCurrentUrl(path = '') {
    return location.href === location.origin + `/${path}`
}

let myRedirect = function (redirectUrl, arg, value) {
    let csrf = $("[name='csrf-token']").attr('content');
    let form = $('<form action="' + redirectUrl + '" method="post">' +
        '<input type="hidden" name="_token" value="' + csrf + '"/>' +
        '<input type="hidden" name="' + arg + '" value="' + value + '"/>' + '</form>');
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

function jsonParse(data) {
    try {
        return JSON.parse(data);
    } catch (e) {
        return false;
    }
}

function base64MimeType(encoded) {
    var result = null;

    if (typeof encoded !== 'string') {
        return result;
    }

    var mime = encoded.match(/data:([a-zA-Z0-9]+\/[a-zA-Z0-9-.+]+).*,.*/);

    if (mime && mime.length) {
        result = mime[1];
    }

    return result;
}

function checkEventPropagationByClass(selector) {
    return $(event.target).closest("." + selector).length || $(event.target).hasClass(selector);
}
