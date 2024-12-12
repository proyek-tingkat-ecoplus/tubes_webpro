
export const pemetaanValidation = () =>{
    var isValid = true;
    $("#addLocationForm input").each(function () {
        const input = $(this);
        const inputName = input.attr("name");
        console.log(input);

        if (!input.val()) {
            input.addClass("is-invalid");
            input.next().text(`${inputName} is required`);
            isValid = false
        } else {
            input.removeClass("is-invalid");
            input.next().text("");
            isValid = true
        }
    });

    // validation
    $("#addLocationForm select").each(function () {
        if (!$(this).val()) {
            $(this).addClass("is-invalid");
            $(this).next().html(`${$(this).attr("name")} is required`);
            isValid = false;
        }
    })

    $("#addLocationForm textarea").each(function () {
        if (!$(this).val()) {
            $(this).addClass("is-invalid");
            $(this).next().html(`${$(this).attr("name")} is required`);
            isValid = false;
        }
    })

    return isValid;
}
