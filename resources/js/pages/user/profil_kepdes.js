$(document).ready(function () {
    $.ajax({
        url: '/api/user/profiles',  
        type: 'GET',
        headers: {
            'Authorization': 'Bearer ' + getTokens()  
        },
        success: function (data) {
            if (data && data.profiles) {
                $('#kepalaDinasPhoto').attr('src', data.profiles.kepala_dinas.photo);
                $('#kepalaDinasName').text(data.profiles.kepala_dinas.name);
                $('#kepalaDinasPosition').text(data.profiles.kepala_dinas.position);

                $('#wakilKepalaDinasPhoto').attr('src', data.profiles.wakil_kepala_dinas.photo);
                $('#wakilKepalaDinasName').text(data.profiles.wakil_kepala_dinas.name);
                $('#wakilKepalaDinasPosition').text(data.profiles.wakil_kepala_dinas.position);

                $('#sekretarisDinasPhoto').attr('src', data.profiles.sekretaris_dinas.photo);
                $('#sekretarisDinasName').text(data.profiles.sekretaris_dinas.name);
                $('#sekretarisDinasPosition').text(data.profiles.sekretaris_dinas.position);

                $('#bendaharaDinasPhoto').attr('src', data.profiles.bendahara_dinas.photo);
                $('#bendaharaDinasName').text(data.profiles.bendahara_dinas.name);
                $('#bendaharaDinasPosition').text(data.profiles.bendahara_dinas.position);
            }
        },
        error: function () {
            Swal.fire('Error', 'Gagal memuat data profil.', 'error');
        }
    });
});
