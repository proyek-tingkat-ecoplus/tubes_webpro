import { getTokens, isLogin } from "../../../Authentication";
import { roleValidation } from "../validation/roleValidation";
import { selectRole } from "../helper/handleSelectRequest";


$(document).ready(function(){
    if(isLogin("Petugas")){
        var idx = $("#idx").val()

    // set data by idx
    $.ajax({
        url: "/api/role/"+idx,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            if (response.data) {
                var dataById = response.data;
                $('input[name="name"]').val(dataById.name)
                $('input[name="description"]').val(dataById.description)
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

    var form = new FormData(this);
    form.append('_method', 'PATCH'); // kalau patch harus make ini
    form.append('_token', $('meta[name="csrf_token"]').attr('content')); // CSRF token
    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
        'Authorization': 'Bearer ' + getTokens()
    },
        url: `/api/role/${idx}/edit`,
        type: 'POST',
        processData: false,
        contentType: false,
        data: form,
        success: function (data) {
            localStorage.setItem("alert",JSON.stringify([{"status":"success","message":"data role berhasil di update"}]));
            window.location.href = "/pages/role"
        },
        error: function (jqxhr, textStatus, error) {
            var err = textStatus + ", " + error;
            console.log("Request Failed: " + err);
        }
    });
});
    }
})
