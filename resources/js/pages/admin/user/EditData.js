import { isLogin } from "../../../Authentication";
import { selectUserRequest } from "./handleSelectRequest";

$(document).ready(function(){
    if(isLogin("Petugas")){
        var idx = $("#idx").val()

    // set data by idx
    $.ajax({
        url: "/api/user/"+idx,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            if (response.data) {
                var dataById = response.data;
                $('input[name="name"]').val(dataById.username)
                $('input[name="email"]').val(dataById.email)
                selectUserRequest(dataById.role.id)
                $('select[name="status"]').val("admin").change()
            }
        },
        error: function (jqxhr, textStatus, error) {
            var err = textStatus + ", " + error;
            console.log("Initial Request Failed: " + err);
        }
    });

var validation = () => {
    console.log('validation');
    $('input, select').removeClass('is-invalid');
    let isValid = true;


    $(".form-group input").each(function () {
        const input = $(this);
        const inputName = input.attr("name");

        // Validasi untuk input yang tidak diisi
        if (!input.val()) {
            input.addClass("is-invalid");
            input.next().text(`${inputName.charAt(0).toUpperCase() + inputName.slice(1)} is required`);
            isValid = false
        } else {
            input.removeClass("is-invalid");
            input.next().text("");  // Menghapus pesan kesalahan jika input valid
            isValid = true
        }

        // Validasi khusus untuk email
        if (inputName === "email") {
             //[^\s@] karakter spasi selain @ dan spasi + . + karakter selain @ dan spasi
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(input.val())) {
                input.addClass("is-invalid");
                input.next().text('Please enter a valid email address');
                isValid = false
            }
        }
        if (inputName === "password_confirmation") {
            const password = $('input[name="password"]').val();
            if (input.val() !== password) {
                input.addClass("is-invalid");
                input.next().text('Password confirmation does not match');
                isValid = false
            }
        }
    });

    $(".form-group select").each(function () {
        if(!$(this).val()){
            $(this).addClass("is-invalid");
            $(this).next().html(`${$(this).attr("name")} is required`);
            isValid = false;
        }
    })

    return isValid;
}
$('.form').submit(function (e) {
    e.preventDefault();

    if(validation() === false) {
        return;
    }

    var form = new FormData(this);
    form.append('_method', 'PATCH'); // kalau patch harus make ini
    form.append('_token', $('meta[name="csrf_token"]').attr('content')); // CSRF token
    //form.append('id', parseInt(lastId) + 1);
    // var name = form.get('name');
    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
    },
        url: `/api/user/${idx}/edit`,
        type: 'POST',
        processData: false,
        contentType: false,
        data: form,
        success: function (data) {
            localStorage.setItem("alert",JSON.stringify([{"status":"success","message":"data user berhasil di update"}]));
            window.location.href = "/pages/user"
        },
        error: function (jqxhr, textStatus, error) {
            var err = textStatus + ", " + error;
            console.log("Request Failed: " + err);
        }
    });
});
    }
})
