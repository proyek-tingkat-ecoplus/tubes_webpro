import { ajax, data } from "jquery";
import {
    getTokens,
    isLogin
} from "../../../Authentication";

$(document).ready(function () {
    if (isLogin("Petugas")) {

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


        let table = new DataTable('#table-user', {
            dom: "<'row'<'col-sm-12 col-md-5 btn-table'><'col-sm-12 col-md-3'<'ms-4'f>><'col-sm-12 col-md-4 pdf-button'>>" +
                "<'row mt-3'<'col-sm-12'tr>>" +
                "<'row mt-2'<'col-md-8 col-12'i><'col-md-4 col-12'p>>",
            ordering: false,
            info: true,
            filtering: false,
            searching: true,
            serverside: true,
            processing: true,
            responsive: true,
            autoWidth: false,
            ajax: {
                url: "/api/user/table",
                method: 'GET',
                dataSrc: 'data',
                headers: {
                    'Authorization': 'Bearer ' + getTokens()
                }
            },
            columns: [{
                    data: 'id'
                },
                {
                    data:'avatar',
                },
                {
                    data: 'username'
                },
                {
                    data: 'email'
                },
                {
                    data: 'role'
                },
                {
                    data: 'status',
                    render: function (data, type, row) {
                        if (data == 'Active') {
                            return `<span class="badge bg-primary me-1">${data}</span>`;
                        } else if (data === 'Non Aktif') {
                            return `<span class="badge bg-danger me-1">${data}</span>`;
                        } else {
                            return `<span class="badge bg-warning me-1">${data}</span>`;
                        }
                    }
                },
                {
                    data: null,
                    render: function (data, type, row) { // buat render di column aksi
                        console.log(row)
                        return `
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                            data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/pages/user/${data.id}/editpass"><i
                                    class='bx bxs-lock-open-alt'></i> Change Password</a>
                            <a class="dropdown-item" href="/pages/user/${data.id}/detail"><i
                                    class='bx bxs-user-detail'></i> Detail</a>
                            <a class="dropdown-item" href="/pages/user/${data.id}/edit"><i
                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                            <a class="dropdown-item delete-btn" data-id="${data.id}">
                                    <i class="bx bx-trash me-1"></i> Delete</a>
                        </div>
                    </div>
                `;
                    }
                }
            ],
        });

        $(document).on("click", ".delete-btn", function () {
            let userId = $(this).data("id");
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
                        url: `/api/user/${userId}/delete`,
                        headers : {
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
        $(".btn-table").append('<a href="/pages/user/add" class="btn btn-primary ">Tambah Pengguna</a>');
        $(".pdf-button").append('<button class="btn btn-danger mt-md-0 mt-3 me-2">Export PDF</button>' +
            '<button class="btn btn-primary mt-md-0 mt-3 me-2 btn-excel">Export Excel</button>');

            $(".btn-excel").click(function () {
                $.ajax({
                    url: "/api/exports/users/excel",
                    headers: {
                        'Authorization': 'Bearer ' + getTokens()
                    },
                    xhrFields: {
                        responseType: 'blob' // Set response type to blob
                    },
                    success: function (data, status, xhr) {
                        const link = document.createElement('a'); // buat link
                        const url = window.URL.createObjectURL(data); // buat object url dari data blob atau yg berantakan
                        link.href = url; // set href link jadi nanti a link di click manual di browser di link.click()
                        link.setAttribute('download', 'users.xlsx'); // ubah attribute name
                        document.body.appendChild(link); // harus di append
                        link.click();  // click link
                        link.remove(); // hapus link
                        window.URL.revokeObjectURL(url); // revoke object url
                    },
                    error: function (jqxhr, textStatus, error) {
                        console.log("Request Failed: " + textStatus + ", " + error);
                    }
                });
            });
    }
})
