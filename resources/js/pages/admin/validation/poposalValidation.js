
export const proposalValidation = () =>{
    var isValid = true;
    $(".form-group input").each(function () {
        const input = $(this);
        const inputName = input.attr("name");

        // Validasi untuk input yang tidak diisi
        if (!input.val() || input.val().trim() === "") {
            input.addClass("is-invalid");
            input.next().text(`${inputName.charAt(0).toUpperCase() + inputName.slice(1)} is required`);
            isValid = false
        } else {
            input.removeClass("is-invalid");
            input.next().text("");  // Menghapus pesan kesalahan jika input valid
            isValid = true
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
        if (!$(this).val()) {
            $(this).addClass("is-invalid");
            $(this).next().html(`${$(this).attr("name")} is required`);
            isValid = false;
        }
    })

    return isValid;
}


