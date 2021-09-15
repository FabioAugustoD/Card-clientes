<?php

if(isset($_POST['submit-btn'])){  

    $inputData = [
        $_POST['nome'],
        $_POST['cpf'],
        $_POST['data-nasc'],
        $_POST['data-cad'],
        $_POST['renda']
    ];

     validaCPF($inputData);
}       

function validaCPF($inputData) {

    $cpf = $inputData[1];

    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            $_SESSION['status'] = 'fail';   
            echo 'Cpf inválido!';
            // echo $_SESSION['status'];
            // header('Location: https://localhost/Card-clientes/index.php');      
            return false ;     
            
        }
    }

    $_SESSION['status'] = 'success';  
    $client = new Client();
    $client->setClient($inputData);
    
    // echo $_SESSION['status'];  
    // header('Location: https://localhost/Card-clientes/index.php');
    return true ;
        
}

?>