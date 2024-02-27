<?php
/**
 * Clase Database
 * Esta clase se encarga de manejar la conexión a la base de datos y ejecutar consultas SQL.
 */
session_start();// Inicia una nueva sesión o reanuda la existente.
class Database {
    public $con;  
      public function __construct()  
      {  
           $this->con = mysqli_connect('localhost', 'root', '', 'desis-answers', 3307);  
           if(!$this->con)  
           {  
                echo 'Error al conectar en la base de datos.' . mysqli_connect_error($this->con);  
           }  
      }
       /**
     * Método regionVoter
     * Este método ejecuta una consulta SQL para obtener las regiones de los votantes desde la base de datos.
     * @param string $table_name El nombre de la tabla de la base de datos.
     * @return array Un array que contiene las regiones de votantes.
     */
      public function regionVoter($table_name)  
      {  
           $array = array();  
           $query = "SELECT id_region, name_region FROM ".$table_name."";  
           $result = mysqli_query($this->con, $query);  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  
      }
      public function communeVoter($table_name)
      {
        $array = array();
        $query = "SELECT id_commune, name_commune FROM ".$table_name."";
        $result = mysqli_query($this->con, $query);  
        while($row = mysqli_fetch_assoc($result))  
        {  
             $array[] = $row;  
        }  
        return $array;  
      }
    }