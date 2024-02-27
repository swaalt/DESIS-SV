<?php  
/**
 * Clase Controller
 * Esta clase maneja las solicitudes entrantes y decide qué vista mostrar según el parámetro 'page' en la URL.
 */
Class Controller {
     /**
     * Método index
     * Este método es el punto de entrada principal para la gestión de solicitudes.
     * Se encarga de determinar qué vista mostrar según el parámetro 'page' en la URL.
     */
    public function index() {
 // Obtener el valor del parámetro 'page' de la URL y filtrarlo para evitar ataques XSS.
        $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);
//se elige la vista según la entrada index.php?page=
        switch ($page) {
            case ($page === "vote-form"):
                require "View/vote-form.php";
                break;
                default:
                require "View/vote-form.php";
                break;
        }
        
    }
}

            