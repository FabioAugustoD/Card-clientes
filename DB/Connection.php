<?php

abstract Class Connection {

  protected function connectDB() {

        $host = 'localhost';
        $db = 'bd_clientes';
        $user = 'postgres';
        $password = 'admin';
        $port = '5432';
        
        try {
            $dsn = "pgsql:host=$host;port=$port;dbname=$db;";	
            $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        
            if ($pdo) {
                //  echo "Connected to the $db database successfully!";
                return $pdo;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        } finally {
            if ($pdo) {
                $pdo = null;
            }
        }
    }     

}

?>