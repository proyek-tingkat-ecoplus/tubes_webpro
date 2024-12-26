document.addEventListener('DOMContentLoaded', function () {
    let userRole = null;

    axios.get('/api/user-role').then(response => {
        userRole = response.data.role;
        document.getElementById('userRole').textContent = userRole;

        if (userRole !== 'admin sdm') {
            document.getElementById('addProposalBtn').style.display = 'none';
        }
    });

    axios.get('/api/profile').then(response => {
        document.getElementById('profileName').textContent = response.data.name;
        document.getElementById('profileEmail').textContent = response.data.email;
        document.getElementById('profileAddress').textContent = response.data.address;
        document.getElementById('profilePhone').textContent = response.data.phone;
    });

    axios.get('/api/proposal').then(response => {
        const tableBody = document.querySelector('#proposalTable tbody');
        tableBody.innerHTML = '';
        response.data.data.forEach(proposal => {
            tableBody.innerHTML += `
                <tr>
                    <td>${proposal.id}</td>
                    <td>${proposal.title}</td>
                    <td>${proposal.description}</td>
                    <td><a href="/storage/${proposal.attachment}" target="_blank">Lihat File</a></td>
                    <td>${proposal.status}</td>
                    <td>
                        ${userRole === 'kepala desa' ? `<a href="/edit/${proposal.id}" class="btn btn-warning btn-sm">Edit</a>` : ''}
                        ${userRole === 'admin sdm' ? `<button onclick="deleteProposal(${proposal.id})" class="btn btn-danger btn-sm">Hapus</button>` : ''}
                    </td>
                </tr>`;
        });
    });

    window.deleteProposal = function (id) {
        if (confirm('Yakin ingin menghapus proposal ini?')) {
            axios.delete(`/api/proposal/${id}/delete`).then(() => {
                alert('Proposal berhasil dihapus.');
                location.reload();
            });
        }
    }
});
