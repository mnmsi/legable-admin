function changeMasterKeyStatus(url) {
    $.ajax({
        type: "get",
        url: url,
        dataType: "json",
        success: function (response) {
            $("#statusDiv").html(`
                        <div class="alert alert-success justify-content-center">
                            ${response.message}
                        </div>`)
        },
        error: function (error) {
            $("#generate_master_key").html(error.responseJSON.message)
        }
    });
}
