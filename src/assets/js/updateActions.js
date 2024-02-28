
/* Ajax encargado de actualizar la comuna según la región seleccionada
@data region_id , debido a que actualiza la comuna según la fk de la región.
*/
$('#voter-region').change(function() {
   
    var region_id = $(this).val();
    $('#voter-commune').prop('disabled', false);

    $.ajax({
        url: 'Controller/UpdateController.php',
        method: 'GET',
        data: { region_id: region_id },
        success: function(response) {
          
            $('#voter-commune').html(response);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
});
