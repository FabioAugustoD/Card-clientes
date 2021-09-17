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