import { getTokens } from "../../../Authentication";

$(document).ready(function () {
    let userRole = null;

    axios.get('/api/user/role').then(response => {
        userRole = response.data.role;

        if (userRole !== 'admin sdm') {
            document.querySelector('.btn-table').style.display = 'none';
        }
    });

    axios.get('/api/user/profile').then(response => {
        document.getElementById('profileName').textContent = response.data.name;
        document.getElementById('profileEmail').textContent = response.data.email;
        document.getElementById('profileAddress').textContent = response.data.address;
        document.getElementById('profilePhone').textContent = response.data.phone;
    });

    let table = new DataTable('#table-proposal', {
        ajax: {
            url: '/api/proposal',
            method: 'GET',
            headers: { 'Authorization': 'Bearer ' + getTokens() },
            dataSrc: 'data'
        },
        columns: [
            { data: 'id' },
            { data: 'title' },
            { data: 'description' },
            {
                data: 'attachment',
                render: function (data) {
                    return `<a href="/storage/${data}" target="_blank">Lihat File</a>`;
                }
            },
            { data: 'status' },
            {
                data: null,
                render: function (data) {
                    let actions = '';
                    if (userRole === 'kepala desa') {
                        actions += `<a href="/pages/proposal/${data.id}/edit" class="btn btn-warning btn-sm">Edit</a>`;
                    }
                    if (userRole === 'admin sdm') {
                        actions += `<button class="btn btn-danger btn-sm delete-btn" data-id="${data.id}">Hapus</button>`;
                    }
                    return actions;
                }
            }
        ]
    });

    $(document).on('click', '.delete-btn', function () {
        const id = $(this).data('id');
        Swal.fire({
            title: 'Hapus Proposal?',
            text: 'Anda yakin ingin menghapus proposal ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
        }).then(result => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/api/proposal/${id}/delete`,
                    method: 'DELETE',
                    headers: { 'Authorization': 'Bearer ' + getTokens() },
                    success: function () {
                        table.ajax.reload();
                        Swal.fire('Terhapus!', 'Proposal berhasil dihapus.', 'success');
                    }
                });
            }
        });
    });
});
