import { getTokens, isLogin, me } from "../../Authentication";
import { SetNotification } from "../notification";

$(document).ready(function () {
if (isLogin(["Admin", "Kepala Desa"])) {
    if (localStorage.getItem("alert")) {
        const alert = JSON.parse(localStorage.getItem("alert"))[0];
        const color = (alert.status == "success") ? "success" : "danger";
        $("#alert").addClass(`alert alert-${color}`);
        $("#alert").append(`<div>${alert.message}</div>`);
        $("#alert").append(`<button type="button" class="btn-close text-light" data-bs-dismiss="alert" aria-label="Close"></button>`);

        setTimeout(() => {
            $("#alert").removeClass(`alert alert-${color}`);
            $("#alert").html("");
            localStorage.removeItem("alert");
        }, 3000);
    }

    let table = new DataTable('#table-proposal', {
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
            url: "/api/proposal/table",
            method: 'GET',
            dataSrc: 'data',
            headers: {
                'Authorization': 'Bearer ' + getTokens()
            }
        },
        columns: [
            {data: 'id'},
            {data: 'title'},
            {data: 'description'},
            {data: 'attachment',
                render: function(data) {
                    return `<a href="/attachment/${data}">Download</a>`;
                }
            },
            {data: 'start_date'},
            {data: 'end_date'},
            {data: 'status'},
            {
                data: null,
                render: function(data) {
                    return `
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/pages/proposal/${data.id}/edit">
                                    <i class="bxF bx-edit-alt me-1"></i> Edit
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
                    url: `/api/proposal/${userId}/delete`,
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
                        SetNotification("Proposal successfully deleted");
                        window.location.reload();
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


    $('.form').submit (async function (e) {
        e.preventDefault();
        const form = new FormData(this);
        const user = await me();
        form.append('user_id', user.id);
        submitProposal(form);
    });


    $("#search").keyup(function() {
        table.search(this.value).draw();
    });

    $(".btn-table").append('<a href="/pages/proposal/add" class="btn btn-primary">Tambah Proposal</a>');
    $(".pdf-button").append(
        '<button class="btn btn-danger mt-md-0 mt-3 me-2 btn-pdf">Export PDF</button>' +
        '<button class="btn btn-primary mt-md-0 mt-3 me-2 btn-excel">Export Excel</button>'
    );

    $(".btn-excel").click(function() {
        $.ajax({
            url: "/api/exports/proposal/excel",
            headers: {'Authorization': 'Bearer ' + getTokens()},
            xhrFields: {responseType: 'blob'},
            success: function(data) {
                downloadFile(data, 'proposal.xlsx');
            },
            error: handleExportError
        });
    });

    $(".btn-pdf").click(function() {
        $.ajax({
            url: "/api/exports/proposal/pdf",
            headers: {'Authorization': 'Bearer ' + getTokens()},
            xhrFields: {responseType: 'blob'},
            success: function(data) {
                downloadFile(data, 'proposal.pdf');
            },
            error: handleExportError
        });
    });
}
});

function submitProposal(form) {

$.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
        'Authorization': 'Bearer ' + getTokens()
    },
    url: "/api/proposal/add",
    type: 'POST',
    processData: false,
    contentType: false,
    data: form,
    success: function(data) {
        localStorage.setItem("alert", JSON.stringify([{
            "status": "success",
            "message": "Proposal berhasil ditambahkan"
        }]));
        SetNotification("Proposal berhasil ditambahkan");
        window.location.href = "/pages/proposal";
    },
    error: function(xhr) {
        console.log(xhr.responseText);
        Swal.fire({
            title: "Error!",
            text: "Failed to submit proposal",
            icon: "error"
        });
    }
});
}

function downloadFile(data, filename) {
const link = document.createElement('a');
const url = window.URL.createObjectURL(data);
link.href = url;
link.setAttribute('download', filename);
document.body.appendChild(link);
link.click();
link.remove();
window.URL.revokeObjectURL(url);
}

function handleExportError(xhr) {
console.log(xhr.responseText);
Swal.fire({
    title: "Error!",
    text: "Export failed",
    icon: "error"
});
}

var proposalId = $("#idx").val();

if (proposalId) {
    $.ajax({
        url: `/api/proposal/${proposalId}`,
        headers: {
            "Authorization": "Bearer " + getTokens(),
        },
        type: "GET",
        success: function (data) {
            console.log(data.data.id);

             $("input[name='title']").val(data.data.title);
             $("input[name='description']").val(data.data.description);
             $("input[name='start_date']").val(data.data.start_date);
             $("input[name='end_date']").val(data.data.end_date);
             $("input[name='status']").val(data.data.status);
            // document.querySelector("input[name='description']").value = data.description;
            // document.querySelector("input[name='start_date']").value = data.start_date;
            // document.querySelector("input[name='end_date']").value = data.end_date;
            // document.querySelector("select[name='status']").value = data.status;
        },
        error: function (xhr) {
            console.error("Failed to load proposal data:", xhr.responseText);
            Swal.fire({
                title: "Error!",
                text: "Failed to load proposal data.",
                icon: "error",
            });
        },
    });
}

$('.forms').submit(function(e) {
    e.preventDefault();
    const form = new FormData(this);
    form.append('_method', 'PATCH'); // kalau patch harus make ini
    form.append('_token', $('meta[name="csrf_token"]').attr('content')); // CSRF token
    form.append('user_id', $('select[name="user"]').val());
    form.append('attachment', $('input[name="attachment"]').val());
    const url = proposalId ? '/api/proposal/${proposalId}' : "/api/proposal/add";
    const method = proposalId ? "PATCH" : "POST";

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
            'Authorization': 'Bearer ' + getTokens()
        },
        url: `/api/proposal/${proposalId}/edit`,
        type: 'POST',
        processData: false,
        contentType: false,
        data: form,
        success: function(data) {
            localStorage.setItem("alert", JSON.stringify([{
                "status": "success",
                "message": "Proposal berhasil diedit"
            }]));
            window.location.href = "/pages/proposal";
        },
        error: function(xhr) {
            console.log(xhr.responseText);
            Swal.fire({
                title: "Error!",
                text: "Failed to submit proposal",
                icon: "error"
            });
        }
    });
});

