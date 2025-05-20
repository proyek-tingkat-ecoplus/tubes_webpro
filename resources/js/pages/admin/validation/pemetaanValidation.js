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
        if(inputName == "judul_report"){
            if(input.val().length < 5){
                input.addClass("is-invalid");
                input.next().text(`${inputName} must be at least 5 characters`);
                isValid = false;
            }
            if(input.val().length > 50){
                input.addClass("is-invalid");
                input.next().text(`${inputName} must be less than 50 characters`);
                isValid = false;
            }
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
        let inputName = $(this).attr("name");
        let input = $(this);
        if(inputName == "deskripsi"){
            if(input.val().length < 20){
                input.addClass("is-invalid");
                input.next().text(`${inputName} must be at least 20 characters`);
                isValid = false;
            }
            if(input.val().length > 500){
                input.addClass("is-invalid");
                input.next().text(`${inputName} must be less than 500 characters`);
                isValid = false;
            }
        }
    });

    return isValid;
};
