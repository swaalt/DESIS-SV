/* Ajax encargado de validar mediante PHP si es que los campos del formulario son correctos, 
si son correctos se guardan en la BBDD.
*/
$(document).ready(function () {
    $('#voting-form').submit(function (e) {
        e.preventDefault();
        $('.error-message').text('');

        $.ajax({
            type: "POST",
            url: "Helper/ValidateHelper.php",
            data: $(this).serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    $('#voting-form').unbind('submit').submit();
                    $('#vote-status').text(response.message);
                    $('#vote-status').fadeIn().delay(3000).fadeOut();
                } else {
                    $.each(response.errors, function (key, value) {
                        $('#' + key + '-error').text(value);
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});
