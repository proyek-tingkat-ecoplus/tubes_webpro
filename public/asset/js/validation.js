export const validation_formm = (element, array) => {
    console.log(typeof(element));
    var formData = {};
    $(element).each(function () {
        console.log($(this).val());
        if (!$(this).val()) {
            isValid = false;
            $(this).css("border-bottom", "1px solid red");
            $(`#${$(this).attr("id")}Error`).text($(this).attr("id") + " is required.");
        } else {
            $(element).css("border-bottom", "1px solid grey");
            $(`#${$(this).attr("id")}Error`).text("");
            formData[$(this).attr("id")] = $(this).val().trim(); // Collect input values
        }
    });
    return formData;
};
