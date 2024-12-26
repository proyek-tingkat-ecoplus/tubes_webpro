import { getTokens } from "../../../Authentication";

    export const selectRole = (id) => {
        $.ajax({
            url: "/api/role",
            method: "GET",
            headers: {
                'Authorization': 'Bearer ' + getTokens()
            },
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

    export const selectUser = (id) => {
        $.ajax({
            url: "/api/user",
            method: "GET",
            headers: {
                'Authorization': 'Bearer ' + getTokens()
            },
            success: function (response) {
                console.log(response)
                if (response && response.data) {
                    const data = response.data;
                    const selectElement = $('select[name="user"]');
                    selectElement.empty();
                    selectElement.append('<option value="">Select a user</option>');
                    data.forEach(function (data) {
                        selectElement.append('<option value="' + data.id + '">' + data.username + data.email  + '</option>');
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

    export const selectAlat = (id) => {
        $.ajax({
            url: "/api/inventaris",
            method: "GET",
            headers: {
                'Authorization': 'Bearer ' + getTokens()
            },
            success: function (response) {
                console.log(response)
                if (response && response.data) {
                    const data = response.data;
                    const selectElement = $('select[name="alat_id"]');
                    selectElement.empty();
                    selectElement.append('<option value="">Select a alat</option>');
                    data.forEach(function (data) {
                        selectElement.append('<option value="' + data.id + '">' + data.nama_alat + " " + data.jenis  + '</option>');
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

    export const selectForum = (id) => {
        $.ajax({
            url: "/api/forum",
            method: "GET",
            headers: {
                "Authorization": "Bearer " + getTokens()
            },
            success: function (response) {
                console.log(response)
                if (response && response.data) {
                    const data = response.data;
                    const selectElement = $('select[name="forum_id"]');
                    selectElement.empty();
                    selectElement.append('<option value="">Select a forum</option>');
                    data.forEach(function (data) {
                        selectElement.append('<option value="' + data.id + '">' + data.name + '</option>');
                    });

                    // selected when change
                    if(id){
                        selectElement.val(id).change();
                    }
                }
            },
            error: function (error) {
                console.error("Error fetching forum:", error);
            }
        });
    }
