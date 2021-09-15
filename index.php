<?php

session_start();
$_SESSION['status'] = 'OK';

include("./header.php");
include("./functions.php");


function getCurrentTime() {
    date_default_timezone_set('America/Sao_Paulo');   
    echo date('Y-m-d'); 
}

?>

<div class="card">
  <div class="card-container"> 

    <form action="" method="POST" autocomplete="off">
        <div class="form">       
                
            <div class="form-info"> 
                    
                <label for="name">Nome </label>
                    <input type="text" name="nome" max="150" required> 
                <label for="name">CPF </label>
                    <input type="text" name="cpf" onpaste="return false;" 
                    autocomplete="off" onkeypress="return isNumber(event)"
                    minlength="11" maxlength="11"> 
                <label for="name">Data Nascimento </label>
                    <input type="date" name="data-nasc" max="<?php getCurrentTime() ?>" required/>
                <label for="name">Data Cadastro </label>
                    <input type="date" name="data-cad" value="<?php getCurrentTime()?>" readonly />
                <label for="name">Renda Familiar </label>
                    <input type="number" name="renda" min="0"/>
                    <input type="submit" value="Submit" name="submit-btn">
            </div>
        </div>

      </form>

  </div>
</div>

    <?php 

    if($_SESSION['status'] == 'fail') {
      echo ' <div class="alert">
              <span>Numero de Cpf inválido!</span>          
           </div>
           ';
      session_unset();
    }     
    
  ?>  

<div class="card">
    <div class="card-container"> 

    <!-- <form action="" method="POST">
      <div class="form">       
        
        <div class="form-info"> 

          <div class="form-info-group-1">  
            <label for="name">Nome </label>
            <div class="form-name">
              <input type="text" name="name">
            </div>        
            
            <label for="name">CPF </label>
            <div class="form-phone">
              <input type="email" name="cpf">
            </div>              
          </div>
          
          <div class="form-info-group-2">
            
            <label for="name">Data de Nascimento </label>
            <div class="form-sob">
              <input type="date" name="data-nasc">
            </div>
            
            <label for="name">Data de Cadastro </label>
            <div class="form-email">
              <input type="text" name="data-cad" disabled value="">
            </div>  

            <label for="name">Renda Familiar </label>
            <div class="form-email">
              <input type="text" name="renda" >
            </div>             
          </div>  

        </div>

        <div class="form-btn">
          <input type="button" value="ENVIAR">
        </div>   

      </div>
    </form>  -->

    </div>

    <script>

        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }

    </script>

</div>



  
    

