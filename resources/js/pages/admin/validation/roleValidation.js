
export const roleValidation = () =>{
    var isValid = true;
    $(".form-group input").each(function () {
        const input = $(this);
        const inputName = input.attr("name");

        if (!input.val() | input.val().trim() === "") {
            input.addClass("is-invalid");
            input.next().text(`${inputName.charAt(0).toUpperCase() + inputName.slice(1)} is required`);
            isValid = false
        } else {
            input.removeClass("is-invalid");
            input.next().text("");
            isValid = true
        }
    });

    // $(".form-group select").each(function () {
    //     if (!$(this).val()) {
    //         $(this).addClass("is-invalid");
    //         $(this).next().html(`${$(this).attr("name")} is required`);
    //         isValid = false;
    //     }
    // })

    return isValid;
}
