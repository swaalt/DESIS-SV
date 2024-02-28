<?php
use Respect\Validation\Validator as v;
/**
 * Clase Controller
 * Esta clase maneja las solicitudes entrantes y decide qué vista mostrar según el parámetro 'page' en la URL.
 */
require_once './Model/VotesModel.php';
require_once './Model/Database.php';
require_once './Model/CandidateModel.php';
class Controller
{
    private $database;
    private $votesModel;
    private $candidateModel;

    public function __construct()
    {
        $this->database = new Database();
        $this->votesModel = new VotesModel();
        $this->candidateModel = new CandidateModel();
    }

    /**
     * Método index
     * Este método es el punto de entrada principal para la gestión de solicitudes.
     * Se encarga de determinar qué vista mostrar según el parámetro 'page' en la URL.
     */
    public function index()
    {
        // Obtener el valor del parámetro 'page' de la URL y filtrarlo para evitar ataques XSS.
        $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);
        //se elige la vista según la entrada index.php?page=

        switch ($page) {
            case ($page === "vote-form"):
                $this->showVoteForm();
                break;
            default:
                $this->showVoteForm();
                break;
        }
    }
      /**
     * Función showvoteform
     *esta función se encarga de mostrar las candidaturas, regiones y comunas disponibles, además de permitir insertar votos.
     * @requires 'View/vote-form.php'
     */
    public function showVoteForm()
    {

        $candidaturas = $this->candidateModel->ApplicantForCandidacy('candidacy');
        $regiones = $this->database->regionVoter('region');
        $comunas = $this->database->communeVoter('commune');
        //se obtienen los datos tras el post del form
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $fullName = $_POST['voter-full-name'];
            $alias = $_POST['voter-nickname'];
            $rut = $_POST['voter-rut'];
            $email = $_POST['voter-email'];
            $regionId = $_POST['voter-region'];
            $communeId = $_POST['voter-commune'];
            $candidateId = $_POST['voter-candidate'];
            $referralSources = isset($_POST['voter-referral-source']) ? implode(', ', $_POST['voter-referral-source']) : '';
            // Esta sección se encarga de evaluar si es que el rut está duplicado en la BBDD
            if ($this->votesModel->isDuplicateRUT($rut)) {
                echo "Ya se ha registrado un voto con este RUT.";
                return;
            }
            
            $inserted = $this->votesModel->insertVote($this->database->con, $fullName, $alias, $rut, $email, $communeId, $candidateId, $referralSources);
            if ($inserted) {
                echo "El voto se ha agregado correctamente.";
            } else {
                echo "Error al agregar el voto.";
            }

        
        }


        require_once 'View/vote-form.php';
    }
  
}
