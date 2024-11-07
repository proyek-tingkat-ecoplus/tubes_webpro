// custom.js
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('submitButton').addEventListener('click', function(event) {
        event.preventDefault()
        console.log('Tombol submit ditekan.');
        // Tampilkan pesan sukses menggunakan SweetAlert
        Swal.fire({
            title: 'Pesan Anda Berhasil Terkirim',
            text: 'Terima kasih sudah menghubungi kami!',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    });
});
