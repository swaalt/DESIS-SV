<?php

/**
 * Clase CandidateModel
 * Esta clase maneja las consultas relacionadas con las candidaturas de los votantes en la base de datos.
 */
class CandidateModel
{
  public $con;
  // constructor encargado de establecer la conexión
  public function __construct()
  {
    $config = parse_ini_file(__DIR__ . '/../.env');
    $host = $config['DB_HOST'];
    $user = $config['DB_USER'];
    $password = $config['DB_PASSWORD'];
    $dbName = $config['DB_NAME'];
    $port = $config['DB_PORT'];

    $this->con = mysqli_connect($host, $user, $password, $dbName, $port);
    if (!$this->con) {
      echo 'Error al conectar en la base de datos.' . mysqli_connect_error($this->con);
    }
  }
  /**
   * Método regionVoter
   * Este método ejecuta una consulta SQL para obtener los candidatos presidenciales desde la base de datos.
   * @param string $table_name El nombre de la tabla de la base de datos.
   * 
   */
  public function ApplicantForCandidacy($table_name)
  {
    $array = array();
    $query = "SELECT id_candidacy, name_candidacy FROM " . $table_name . "";
    $result = mysqli_query($this->con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
      $array[] = $row;
    }
    return $array;
  }
}
