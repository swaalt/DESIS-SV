<?php

// Incluir el archivo que contiene la clase Database
require_once '../Model/Database.php';

class UpdateController {
    private $database;
    public function __construct() {
        $this->database = new Database();
    }

    public function getComunasByRegion() {
        // Verificar si se recibió el ID de la región
        if (isset($_GET['region_id'])) {
            // Obtener el ID de la región enviado desde la solicitud AJAX
            $regionId = $_GET['region_id'];

            // Crear una instancia de la clase Database


            // Obtener las comunas asociadas con la región seleccionada
            $comunas = $this->database->getCommunesByRegion($regionId);

            // Construir las opciones de comuna
            $options = '<option disabled selected value="">Selecciona una comuna</option>';
            foreach ($comunas as $comuna) {
                
                $options .= '<option value="' . $comuna['id_commune'] . '">' . $comuna['name_commune'] . '</option>';
            }

            // Devolver las opciones de comuna como respuesta a la solicitud AJAX
            echo $options;
        } else {
            // Si no se recibe el ID de la región, devolver un mensaje de error
            echo 'Error: ID de región no especificado.';
        }
    }
}

// Crear una instancia del controlador y llamar al método correspondiente
$updateController = new UpdateController();
$updateController->getComunasByRegion();
?>
