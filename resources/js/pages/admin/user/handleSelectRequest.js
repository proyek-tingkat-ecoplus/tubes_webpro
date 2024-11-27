    export const selectUserRequest = (id) => {
        $.ajax({
            url: "/api/role",
            method: "GET",
            success: function (response) {
                console.log(response)
                if (response && response.data) {
                    const roles = response.data;
                    const selectElement = $('select[name="role"]');
                    selectElement.empty();
                    selectElement.append('<option value="">Select a role</option>');
                    roles.forEach(function (role) {
                        selectElement.append('<option value="' + role.id + '">' + role.name + '</option>');
                    });

                    // selected when change
                    if(id){
                        selectElement.val(id).change();
                    }
                }
            },
            error: function (error) {
                console.error("Error fetching roles:", error);
            }
        });
    }
