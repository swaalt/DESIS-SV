<?php

require_once '../Model/Database.php';

class UpdateController
{
    private $database;
    public function __construct()
    {
        $this->database = new Database();
    }

    /** GetComunasByRegion
     * Función encargado de obtener las comunas según la la región pasada por AJAX, para en caso de existir, buscar las comunas
     * buscar comunas que concuerden con el ID y devolverlo como options para el select
     * @depends GET REGION_ID
     * return: options. 
     **/
    public function getComunasByRegion()
    {
        if (isset($_GET['region_id'])) {
            $regionId = $_GET['region_id'];
            $comunas = $this->database->getCommunesByRegion($regionId);
            $options = '<option disabled selected value="">Selecciona una comuna</option>';
            foreach ($comunas as $comuna) {

                $options .= '<option value="' . $comuna['id_commune'] . '">' . $comuna['name_commune'] . '</option>';
            }
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
