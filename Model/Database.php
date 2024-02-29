<?php

/**
 * Clase Database
 * Esta clase se encarga de manejar la conexión a la base de datos y ejecutar consultas SQL para mostrar 
 * las regiones/comunas correspondientes.
 */

session_start(); // Inicia una nueva sesión o reanuda la existente.
class Database
{
     public $con;
     // Constructor que inicia la conexión con la BD
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
      * Este método ejecuta una consulta SQL para obtener las regiones y comunas de los votantes desde la base de datos.
      * @param string $table_name El nombre de la tabla de la base de datos.
      * @return array Un array que contiene las regiones de votantes.
      */
     public function regionVoter($table_name)
     {
          $array = array();
          $query = "SELECT id_region, name_region FROM " . $table_name . "";
          $result = mysqli_query($this->con, $query);
          while ($row = mysqli_fetch_assoc($result)) {
               $array[] = $row;
          }
          return $array;
     }
     /**
      * Método regionVoter
      * Este método devuelve las comunas disponibles
      */
     public function communeVoter($table_name)
     {
          $array = array();
          $query = "SELECT id_commune, name_commune FROM " . $table_name . "";
          $result = mysqli_query($this->con, $query);
          while ($row = mysqli_fetch_assoc($result)) {
               $array[] = $row;
          }
          return $array;
     }
     /**
      * Método getCommunesByRegion
      * Devuelve la comuna correspondiente según la región seleccionada por la persona.
      * @return array Un array que contiene las comunas correspondientes de la región.
      */
     public function getCommunesByRegion($region_id)
     {
          $comunas = array();
          $query = "SELECT id_commune, name_commune FROM commune WHERE fk_id_region = ?";
          $statement = mysqli_prepare($this->con, $query);
          mysqli_stmt_bind_param($statement, 'i', $region_id);
          mysqli_stmt_execute($statement);
          $result = mysqli_stmt_get_result($statement);
          while ($row = mysqli_fetch_assoc($result)) {
               $comunas[] = $row;
          }

          return $comunas;
     }
}
