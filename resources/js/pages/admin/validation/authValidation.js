export const authValidation = () =>{
    var isValid = true;
    $($("input")).each(function () {
        if (!$(this).val()) {
            isValid = false;
            $(this).css("border-bottom", "1px solid red");
            $(`#${$(this).attr("id")}Error`).text($(this).attr("id") + " is required.");
        } else {
            $(this).css("border-bottom", "1px solid grey");
            $(`#${$(this).attr("id")}Error`).text("");
            //formData[$(this).attr("id")] = $(this).val().trim();
        }
    });
    return isValid;
}
