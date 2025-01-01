import { getTokens, isLogin } from "../../../Authentication";
import { roleValidation } from "../validation/roleValidation";
import { selectRole } from "../helper/handleSelectRequest";


$(document).ready(function(){
    if(isLogin("Admin")){
        var idx = $("#idx").val()
    var url = "https://3fe8-103-194-175-22.ngrok-free.app";

    // set data by idx
    $.ajax({
        url: `${url}/${idx}`,
        type: 'GET',
        dataType: 'json',
        headers: {
            "Accept": "application/json",
            "ngrok-skip-browser-warning": "69420",
        },
        success: function (response) {
            // console.log(response);
            if (response.data) {
                var dataById = response.data;
                $('input[name="name"]').val(dataById.name)
                $('input[name="detail"]').val(dataById.detail)
            }
        },
        error: function (xhr) {
            if(xhr.status == 422){
                var errors = xhr.responseJSON.errors;
                alert(errors);
                console.log(errors);
                console.log(Object.keys(errors));
                // dapertin semua keys error lalu tampilkan sesuai dengan name
                Object.keys(errors).forEach((key) => {
                    var input = $(`input[name="${key}"]`);
                    input.addClass("is-invalid");
                    var errorMessage = errors[key].join(', ');
                    input.next().text(`${key.charAt(0).toUpperCase() + key.slice(1)}: ${errorMessage}`);
                });
            }
        }
    });

$('.forms').submit(function (e) {
    e.preventDefault();

    if(roleValidation() === false) {
        return;
    }

    var form = new FormData();
    form.append("name", $("input[name='name']").val());
    form.append("detail", $("input[name='detail']").val());
    var urlEncodedData = new URLSearchParams(form).toString();
    $.ajax({
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            "ngrok-skip-browser-warning": "69420",
        },
        url: `${url}/${idx}`,
        type: 'PATCH',
        processData: false,
        contentType: false,
        data: urlEncodedData,
        success: function (data) {
            localStorage.setItem("alert",JSON.stringify([{"status":"success","message":"data role berhasil di update"}]));
            window.location.href = "/pages/helper"
        },
        error: function (jqxhr, textStatus, error) {
            var err = textStatus + ", " + error;
            console.log("Request Failed: " + err);
        }
    });
});
    }
})
