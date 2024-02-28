<?php

/**
 * Clase VotesModel
 * Esta clase se encarga de insertar los datos de los votantes.
 */
require_once 'Database.php';
class VotesModel
{
  public $con;
  private $database;
  public function __construct()
  {
    $this->database = new Database();
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
 * función isDuplicateRUT
 * Esta función evalua si es que el rut que la persona intentar hacer submit, no es duplicado.
 * @param string $rut El rut de input.
* @return boolean si es que el rut ya fue ingresado en la BBDD.
 */
  public function isDuplicateRUT($rut)
  {

    $query = "SELECT COUNT(*) FROM votes WHERE rut = ?";
    $stmt = mysqli_prepare($this->database->con, $query);
    mysqli_stmt_bind_param($stmt, "s", $rut);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($this->database->con);
    return $count > 0;
  }
   /**
   * función insertVote
   * Esta función inserta el voto en la BBDD.
   * @param string ,$connection $fullName, $alias, $rut, $email, $communeId, $candidateId, $referralSources.
   * @return boolean respecto al éxito de insertar el dato.
   */
  public function insertVote($connection, $fullName, $alias, $rut, $email, $communeId, $candidateId, $referralSources)
  {
    $query = "INSERT INTO votes (name_surname, nickname, rut, email, fk_id_commune, fk_id_candidate, how_met) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "ssssiis", $fullName, $alias, $rut, $email, $communeId, $candidateId, $referralSources);
    $success = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $success;
  }
}
