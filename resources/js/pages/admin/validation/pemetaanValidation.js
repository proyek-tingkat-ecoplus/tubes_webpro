export const pemetaanValidation = () => {
    let isValid = true;

    // Clear previous validation states
    $("#addLocationForm input, #addLocationForm select, #addLocationForm textarea").removeClass("is-invalid");
    $("#addLocationForm .invalid-feedback").text("");

    // Validate inputs
    $("#addLocationForm input").each(function () {
        const input = $(this);
        const inputName = input.attr("name");

        if (!input.val() | input.val().trim() === "") {
            input.addClass("is-invalid");
            input.next().text(`${inputName} is required`);
            isValid = false;
        }
    });

    // Validate selects
    $("#addLocationForm select").each(function () {
        if (!$(this).val()) {
            $(this).addClass("is-invalid");
            $(this).next().text(`${$(this).attr("name")} is required`);
            isValid = false;
        }
    });

    // Validate textareas
    $("#addLocationForm textarea").each(function () {
        if (!$(this).val()) {
            $(this).addClass("is-invalid");
            $(this).next().text(`${$(this).attr("name")} is required`);
            isValid = false;
        }
    });

    return isValid;
};
