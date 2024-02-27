$(document).ready(function() {
    $('#voting-form').submit(function(e) {
        e.preventDefault();
        $('.error-message').text('');

        // Variable para almacenar los mensajes de error
        var errors = [];

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
        
        




        if (errors.length > 0) {
            return;
        }

        this.submit();
    });
});
