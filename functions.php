<?php

if(isset($_POST['submit-cad'])){  

    $inputData = [
        $_POST['nome'],
        $_POST['cpf'],
        $_POST['data-nasc'],
        $_POST['data-cad'],
        $_POST['renda']
    ];

    $client = new Client();
    $cpf = $_POST['cpf'];

    if(validaCPF($inputData) === true) {                       

            $checkCpf = $client->verifyCpf($cpf);
            if(!empty($checkCpf)) {      
                //Cpf existente  
                return false ;
            } else {        
                $client->setClient($inputData);
                $_SESSION['cadastro'] = 'success'; 
                header('Location: https://localhost/Card-clientes/');
                return true ;
            } 
        
    }   
    
}     

if(isset($_POST['submit-info'])) {       

    $inputData =  $_POST['id-info'];
    $client = new Client();
    $id = $client->checkID($inputData);  

    header('Location: https://localhost/Card-clientes/update.php?id='.$id[0]['id']);
}

if(isset($_POST['submit-del'])) {
    
    $inputData =  $_POST['id-info']; 
    $client = new Client();
    $client->deleteClient($inputData); 
}

if(isset($_POST['submit-up'])) {
    
    $inputData = [
        $_POST['nome'],
        $_POST['cpf'],
        $_POST['data-nasc'],       
        $_POST['renda'],
        $_POST['id']
    ];    

    $client = new Client();
    $cpf = $_POST['cpf'];

    if(validaCPF($inputData) === true) {
        // echo 'Cpf valido';
        if ($_SESSION['cpf'] === $cpf) {
                $client->updateClient($inputData);   

        } else {

            $checkCpf = $client->verifyCpf($cpf);
            if(!empty($checkCpf)) {      
                echo 'Cpf existente no Banco!';
                return false ;
            } else {        
                $client->updateClient($inputData);
                return true ;
            } 
        }
    }
}


if(isset($_POST['submit-search'])) {

    $inputData = $_POST['nome'];    
    header('Location: https://localhost/Card-clientes/listagem.php?nome='.$inputData);
   
}

function validaCPF($inputData) {
    

    $cpf = $inputData[1];

    // Extrai somente os números
    $newCpf = preg_replace( '/[^0-9]/is', '', $cpf );

    // Verifica se foi informado todos os digitos corretamente
    if (strlen($newCpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $newCpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $newCpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($newCpf[$c] != $d) {
            $_SESSION['cpf-status'] = 'fail';                   
            return false ;                
        }
    }
          
    
    return true ;
        
}

?>