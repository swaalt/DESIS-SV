$(document).ready(function() {
    $('#voting-form').submit(function(e) {
        e.preventDefault();
        $('.error-message').text('');
        var formData = $(this).serialize();
        
        $.ajax({
            type: "POST",
            url: "Helper/ValidateHelper.php",
            data: $(this).serialize(), // Envía los datos del formulario
            dataType: 'json',
            success: function(response) {
                // Procesar la respuesta del servidor
                if (response.success) {
                    $('#voting-form').unbind('submit').submit();
                } else {
                    $.each(response.errors, function(key, value) {
                        $('#' + key + '-error').text(value);
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});