
document.addEventListener('DOMContentLoaded', function() {

    // custom.js
document.getElementById('contactForm').addEventListener('submit', function (e) {
    e.preventDefault();

    // Get form fields
    const fname = document.getElementById('fname');
    const lname = document.getElementById('lname');
    const email = document.getElementById('email');
    const phone = document.getElementById('phone');
    const message = document.getElementById('message');

    // Regular expression for email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // Regular expression for phone number validation (only digits, length between 7-15)
    const phoneRegex = /^\d{7,15}$/;

    // Clear any previous error messages
    const formFields = [fname, lname, email, phone, message];
    formFields.forEach(field => {
        field.classList.remove('is-invalid');
    });

    // Validation logic
    let isValid = true;

    if (fname.value.trim() === '') {
        fname.classList.add('is-invalid');
        isValid = false;
    }

    if (lname.value.trim() === '') {
        lname.classList.add('is-invalid');
        isValid = false;
    }

    if (!emailRegex.test(email.value.trim())) {
        email.classList.add('is-invalid');
        isValid = false;
    }

    if (!phoneRegex.test(phone.value.trim())) {
        phone.classList.add('is-invalid');
        isValid = false;
    }

    if (message.value.trim() === '') {
        message.classList.add('is-invalid');
        isValid = false;
    }

    // Handle submission if valid
    if (isValid) {
        alert('Thank you for contacting us! We will get back to you soon.');
        this.reset(); // Optionally reset the form after submission
    } else {
        alert('Please correct the errors in the form.');
    }
});
    // document.getElementById('submitButton').addEventListener('click', function(event) {
    //     event.preventDefault()
    //     console.log('Tombol submit ditekan.');
    //     // Tampilkan pesan sukses menggunakan SweetAlert
    //     Swal.fire({
    //         title: 'Pesan Anda Berhasil Terkirim',
    //         text: 'Terima kasih sudah menghubungi kami!',
    //         icon: 'success',
    //         confirmButtonText: 'OK'
    //     });
    // });
});
