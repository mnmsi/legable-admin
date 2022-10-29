function showSuccessMessageOnDivById(id, type, msg) {
    $("#" + id).html(`<div class="alert alert-${type} justify-content-center">
                            ${msg}
                        </div>`)
}
