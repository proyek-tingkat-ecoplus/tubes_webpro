document.getElementById('submitBtn').addEventListener('click', function (event) {
    var energiInput = document.getElementById('energi');
    var errorEnergiDiv = document.getElementById('error-energi');
    var penanggungJawabInput = document.getElementById('penanggungJawab');
    var errorPJDiv = document.getElementById('error-penanggungJawab');

    errorEnergiDiv.style.display = 'none';
    errorEnergiDiv.textContent = '';
    errorPJDiv.style.display = 'none';
    errorPJDiv.textContent = '';

    if (energiInput.value.length < 5) {
        errorEnergiDiv.textContent = 'Nama Energi Terbarukan harus terdiri dari minimal 5 karakter.';
        errorEnergiDiv.style.display = 'block';
        energiInput.classList.add('is-invalid');
        event.preventDefault();
    } else {
        energiInput.classList.remove('is-invalid');
    }

    if (penanggungJawabInput.value.length < 5) {
        errorPJDiv.textContent = 'Nama Penanggungjawab harus terdiri dari minimal 5 karakter.';
        errorPJDiv.style.display = 'block';
        penanggungJawabInput.classList.add('is-invalid');
        event.preventDefault();
    } else {
        penanggungJawabInput.classList.remove('is-invalid');
    }


});