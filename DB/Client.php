<?php
include ("Connection.php");

class Client extends Connection {    

    public function getAllClients() {
        $stmt = $this->connectDB()->prepare("SELECT * FROM Clientes ORDER BY cli_id");
        $stmt->execute();

        $data = [];
        $i = 0;

        while($Fetch = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[$i] = [
                "id"=>$Fetch['cli_id'],
                "Nome"=>$Fetch['nome'],
                "CPF"=>$Fetch['cpf'],
                "Nascimento"=>$Fetch['data_nasc'],
                "Cadastro"=>$Fetch['data_cad'],
                "Renda"=>$Fetch['renda']
            ];
            $i++;
        }        
        return $data;
    }


    public function mountQuery($startDate, $endDate) {  
        $query = "AND data_cad BETWEEN '$startDate' AND '$endDate'";
        return $query;        
    }


    public function getQuery() {

        if(!isset($_GET['filter'])) {
            $filter = '';
        } else {            
            $filter = $_GET['filter'];
        }


        switch ($filter) {
            case 'month': 
                $startDate = date('Y-m-01');
                $endDate = date('Y-m-t');
                $query = $this->mountQuery($startDate, $endDate);  
                return $query;                      
                break;
            case 'week':                 
                $currentDate = date("Y/m/d");
                $startDate = new DateTime($currentDate);
                $startDate = $startDate->modify('-7 day');
                $startDate = $startDate->format("Y-m-d");            
                $endDate = $currentDate; 
                $query = $this->mountQuery($startDate, $endDate);
                return $query;                        
                break;
            case 'day':                
                $startDate = date("Y/m/d");
                $endDate = date("Y/m/d");
                $query = $this->mountQuery($startDate, $endDate);
                return $query;                   
                break; 
            case 'all':                 
                $query = '';
                return $query;
                break;
            break;
                            
        }   
        
               
        
    }


    public function getQtdByClass($classList) {     
        
        $filtro = $this->getQuery();
                   

            switch ($classList) {
                case 'A': 
                    $stmt = $this->connectDB()->prepare("SELECT * FROM clientes WHERE renda < 980 " . $filtro);                          
                    break;
                case 'B': 
                    $stmt = $this->connectDB()->prepare("SELECT * FROM clientes WHERE renda BETWEEN 980.01 AND 2500 " .  $filtro);                          
                    break;
                case 'C': 
                    $stmt = $this->connectDB()->prepare("SELECT * FROM clientes WHERE renda > 2500 " . $filtro);                          
                    break;                 
            } 

            $stmt->execute();
            $data = [];
            $i = 0;
    
            while($Fetch = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $data[$i] = [  
                    "renda"=>$Fetch['renda']
                ];
                $i++;
            }
            return count($data);
    }


    public function overEighteen() {

        $filter = $this->getQuery();

        $stmt = $this->connectDB()->prepare("SELECT AVG(renda) FROM clientes");
        $stmt->execute();

        $data = [];
        $i = 0;

        while($Fetch = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[$i] = [  
                "renda"=>$Fetch['avg']
            ];
            $i++;
        }
       

        $stmt = $this->connectDB()->prepare("SELECT * FROM clientes WHERE EXTRACT(YEAR FROM AGE(data_cad, data_nasc)) > 18 AND renda > " . $data[0]['renda']. " " . $filter);
        $stmt->execute();

        $data = [];
        $i = 0;

        while($Fetch = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[$i] = [  
                "nome"=>$Fetch['nome']
            ];
            $i++;
        }
        
        return count($data);     
        
    }

    public function checkID($id) {

        $stmt = $this->connectDB()->prepare("SELECT * FROM clientes WHERE cli_id = $id ORDER BY cli_id");
        $stmt->execute();

        $data = [];
        $i = 0;

        while($Fetch = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[$i] = [  
                "id"=>$Fetch['cli_id']
            ];
            $i++;
        }
        return $data;
    }

    public function getClientByID($id) {

        $stmt = $this->connectDB()->prepare("SELECT * FROM clientes WHERE cli_id = $id ORDER BY cli_id");
        $stmt->execute();

        $data = [];
        $i = 0;

        while($Fetch = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[$i] = [  
                "id"=>$Fetch['cli_id'],                            
                "Nome"=>$Fetch['nome'],
                "CPF"=>$Fetch['cpf'],
                "Nascimento"=>$Fetch['data_nasc'],                
                "Renda"=>$Fetch['renda']            
            ];
            $i++;
        }

        return $data;
    }

    public function verifyCpf($cpf) { 
            

        $stmt = $this->connectDB()->prepare("SELECT * FROM clientes WHERE cpf = $cpf");
        $stmt->execute();

        $data = [];
        $i = 0;

        while($Fetch = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[$i] = [                            
                "CPF"=>$Fetch['cpf']                            
            ];
            $i++;
        }

        return $data;   
        
    }

    public function getClientByName($nome) {

        $stmt = $this->connectDB()->prepare("SELECT * FROM clientes WHERE nome LIKE '%".$nome."%'");        
        $stmt->execute();

        $data = [];
        $i = 0;

        while($Fetch = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[$i] = [    
                "id"=>$Fetch['cli_id'],                          
                "Nome"=>$Fetch['nome'],
                "CPF"=>$Fetch['cpf'],
                "Nascimento"=>$Fetch['data_nasc'],                
                "Renda"=>$Fetch['renda']           
            ];
            $i++;
        }

        return $data;

    }

    public function setClient($inputData) {

        try {  
            $stmt = $this->connectDB()->prepare('INSERT INTO clientes (nome, cpf, data_nasc, data_cad, renda) VALUES(:nome, :cpf, :data_nasc, :data_cad, :renda)');
            $stmt->execute(array(
              ':nome' => $inputData[0],
              ':cpf' => $inputData[1],
              ':data_nasc' => $inputData[2],
              ':data_cad' => $inputData[3],
              ':renda' => $inputData[4]
            ));          
            
          } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function deleteClient($id) {

        try {           
          
            $stmt = $this->connectDB()->prepare('DELETE FROM clientes WHERE cli_id = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();          
            
          } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
          }
        
    }
    
    public function updateClient($inputData) {

        $id = $inputData[4];
        
        try {           
          
            $stmt = $this->connectDB()->prepare('UPDATE clientes SET
            nome = :nome,
            cpf = :cpf,
            data_nasc = :nascimento,
            renda = :renda
            WHERE cli_id = :id');            

            $stmt->execute(array(              
              ':nome' => $inputData[0],
              ':cpf' => $inputData[1],
              ':nascimento' => $inputData[2],
              ':renda' => $inputData[3],
              ':id' => $inputData[4]
            ));                
            
            
          } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
          }

    }

    

}


?>