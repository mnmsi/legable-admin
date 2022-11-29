function changeMasterKeyStatus(url) {
    $.ajax({
        type: "get",
        url: url,
        dataType: "json",
        success: function (response) {
            showAjaxMessageOnDivById('statusDiv', response.status, response.message)
        },
        error: function (error) {
            showAjaxMessageOnDivById('statusDiv', 'danger', error.responseJSON.message)
        }
    });
}

//password show hide functionality

$(document).ready(function (){
    $(".password-eye").on("click",function (){
        let type = $(this).prev().attr("type");
        if(type === "password"){
            $(this).children().attr("src","/image/common/eyeClose.svg")
            $(this).prev().attr("type","text")
        }else{
            $(this).prev().attr("type","password")
            $(this).children().attr("src","/image/common/eyeOpen.svg")
        }
    })
})
