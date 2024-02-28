$(document).ready(function() {
    $('#voting-form').submit(function(e) {
        e.preventDefault();
        $('.error-message').text('');

        // Variable para almacenar los mensajes de error
        var errors = [];
        //Validaciones de todos los campos antes de hacer el submit del formulario
        // se consideran los campos nombre / alias / email / checks / inputs
        //
        var fullName = $('#voter-full-name').val().trim();
        if (fullName === '') {
            $('#voter-full-name-error').text('El campo Nombre y Apellido no puede estar en blanco.');
            errors.push('Nombre y Apellido');
        }

       
        var alias = $('#voter-nickname').val().trim();
        if (alias.length < 6 ) {
            $('#voter-nickname-error').text('El alias debe contener más de 5 dígitos.');
            errors.push('Alias');
        } else if(!(/[a-zA-Z]/.test(alias) && /[0-9]/.test(alias))){
            $('#voter-nickname-error').text('El alias debe contener letras y números.');
            errors.push('Alias');
        }

        var regex = /^\d{7,8}-[0-9Kk]$/;
        var rutVoter = $('#voter-rut').val().trim();
        if (!regex.test(rutVoter)) {
            $('#voter-rut-error').text('El RUT debe estar escrito en el siguiente formato "xxxxxxxx-x".');
            errors.push('RUT');
        }
        var emailVoter = $('#voter-email').val().trim();
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (!emailRegex.test(emailVoter)) {
            $('#voter-email-error').text('El correo electrónico no es válido.');
            errors.push('Correo electrónico');
        }
        
        var checkedSources = $('input[name="voter-referral-source[]"]:checked').length;

        if (checkedSources < 2) {
            $('#voter-referral-source-error').text('Seleccione al menos dos opciones.');
            errors.push('Checkbox');
        }

        var regionId = $('#voter-region').val();
        var communeId = $('#voter-commune').val();
        var candidateId = $('#voter-candidate').val();
        
       
        regionId = regionId || "";
        communeId = communeId || "";
        candidateId = candidateId || "";
        if (regionId === null || regionId === '') {
            $('#voter-region-error').text('Seleccione una región.');
            errors.push('Región');
        }

        if (communeId === null || communeId === '') {
            $('#voter-commune-error').text('Seleccione una comuna.');
            errors.push('Comuna');
        }

       
        if (candidateId === null || candidateId ==='') {
            $('#voter-candidate-error').text('Seleccione un candidato.');
            errors.push('Candidato');
        }


        if (errors.length > 0) {
            return;
        }

        this.submit();
    });
});
