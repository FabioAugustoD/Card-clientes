<?php
include ("Connection.php");

class Client extends Connection {    

    public function getClients() {
        $BFetch = $this->connectDB()->prepare("SELECT * FROM Clientes");
        $BFetch->execute();

        $data = [];
        $i = 0;

        while($Fetch = $BFetch->fetch(PDO::FETCH_ASSOC)) {
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

    public function delete() {
        
    }
    
    public function update() {

    }

    

}


?>