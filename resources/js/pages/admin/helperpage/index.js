import {
    getTokens,
    isLogin
} from "../../../Authentication";

$(document).ready(function () {
    if (isLogin("Admin")) {
        var url = "https://3fe8-103-194-175-22.ngrok-free.app";
        // get alert flash message
        if (localStorage.getItem("alert")) {
            alert = JSON.parse(localStorage.getItem("alert"))[0]
            var color = (alert['status'] == "success") ? "success" : "danger";
            $("#alert").addClass(`alert alert-${color}`)
            $("#alert").append(`<div>${JSON.parse(localStorage.getItem("alert"))[0]['message']}</div>`)
            $("#alert").append(`<button type="button" class="btn-close text-light" data-bs-dismiss="alert" aria-label="Close"></button>`)

            //remmove flash message after 3000 sec
            setInterval(() => {
                $("#alert").removeClass(`alert alert alert-${color}`)
                $("#alert").html("")
                localStorage.removeItem("alert")
            }, 3000)
        }


        let table = new DataTable('#table-helper', {
            dom: "<'row'<'col-sm-12 col-md-5 btn-table'><'col-sm-12 col-md-7'<''f>>>" +
                    "<'row mt-3'<'col-sm-12'tr>>" +
                    "<'row mt-2'<'col-md-8 col-12'i><'col-md-4 col-12'p>>",
            ordering: false,
            info: true,
            searching: true,
            processing: true,
            responsive: true,
            autoWidth: false,
            ajax: {
                url:url,
                method: 'GET',
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "ngrok-skip-browser-warning": "69420",
                },
                dataSrc: function (json) {
                    if (!json || typeof json !== 'object' || !json.data) {
                        console.error('Invalid JSON Response:', json);
                        return [];
                    }
                    return json.data;
                },
                error: function (jqxhr, textStatus, error) {
                    console.error("Request Failed: " + textStatus + ", " + error);
                    console.error("Response Data:", jqxhr.responseText);
                }
            },
            columns: [
                { data: 'id' },
                {
                    data: 'name',
                    render: function (data, type, row) {
                        return data ? data : 'N/A'; // Handle null values
                    }
                },
                {
                    data: 'detail',
                    render: function (data, type, row) {
                        return data ? data : 'N/A'; // Handle null values
                    }
                },
                {
                    data: null,
                    render: function (data, type, row) {
                        return `
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/pages/helper/${data.id}/edit">
                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                </a>
                                <a class="dropdown-item delete-btn" data-id="${data.id}">
                                    <i class="bx bx-trash me-1"></i> Delete
                                </a>
                            </div>
                        </div>`;
                    }
                }
            ],
        });

        $(document).on("click", ".delete-btn", function () {
            let roleId = $(this).data("id");
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: `${url}/${roleId}`,
                        headers: {
                            'Authorization': 'Bearer ' + getTokens()
                        },
                        success: function (data) {
                            table.ajax.reload(); // ini buat reload table
                            Swal.fire({
                                title: "Success!",
                                text: "Data successfully deleted",
                                icon: "success"
                            });
                        },
                        error: function (jqxhr, textStatus, error) {
                            console.log("Request Failed: " + textStatus + ", " + error);
                            Swal.fire({
                                title: "Failed!",
                                text: "Data deletion failed",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        });


        // Search functionality
        $("#search").keyup(function () {
            table.search(this.value).draw();
        })
        // ini buat nambah button
        $(".btn-table").append('<a href="/pages/helper/add" class="btn btn-primary">Tambah Data</a>');


            $(".btn-excel").click(function () {
                $.ajax({
                    url: "/api/exports/role/excel",
                    headers: {
                        'Authorization': 'Bearer ' + getTokens()
                    },
                    xhrFields: {
                        responseType: 'blob'
                    },
                    success: function (data, status, xhr) {
                        const link = document.createElement('a');
                        const url = window.URL.createObjectURL(data);
                        link.href = url;
                        link.setAttribute('download', 'role.xlsx');
                        document.body.appendChild(link);
                        link.click();
                        link.remove();
                        window.URL.revokeObjectURL(url);
                    },
                    error: function (jqxhr, textStatus, error) {
                        console.log("Request Failed: " + textStatus + ", " + error);
                    }
                });
            });
    }
})
