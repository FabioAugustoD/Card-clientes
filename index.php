<?php


include("./header.php");

session_start();

function getCurrentTime() {
    date_default_timezone_set('America/Sao_Paulo');   
    echo date('Y-m-d'); 
}

?>

<section class="home-section">  
  <div class="card">
      <div class="card-container">  
  
      <form action="" method="POST" autocomplete="off">
          <div class="form">   
          
          <table>
              <thead>
                  <tr>
                      <th>Cadastro</th>  
                      <th></th>                          
                  </tr>
              </thead>
              <tbody>
            
                  <tr>                   
                      <td>
                          <label for="name">Nome </label>
                      </td> 
                      <td>
                          <input type="text" name="nome" max="150" required>
                      </td> 
                  </tr> 
                  <tr>                   
                      <td>
                          <label for="name">CPF </label>
                      </td> 
                      <td>
                          <input type="text" name="cpf" onpaste="return false;" 
                      autocomplete="off" onkeypress="return isNumber(event)"
                      minlength="11" maxlength="11">
                      </td> 
                  </tr> 
                  <tr>                   
                      <td>
                          <label for="name">Data Nascimento</label>
                      </td> 
                      <td>
                          <input type="date" name="data-nasc" max="<?php getCurrentTime() ?>" required>
                      </td> 
                  </tr> 
                  <tr>                   
                      <td>
                          <label for="name">Data Cadastro</label>
                      </td> 
                      <td>
                          <input type="date" name="data-cad" value="<?php getCurrentTime()?>" readonly>
                      </td> 
                  </tr> 
                  <tr>                   
                      <td>
                          <label for="number">Renda Familiar</label>
                      </td> 
                      <td>
                          <input type="text" name="renda">
                      </td> 
                  </tr>   
              </tbody>   
          </table>
  
          <input class="btn-cad" type="submit" value="Submit" name="submit-cad">       
  
          </div>
        </form>
  
      </div>
  </div>
</section>

  <?php 

if($_SESSION['cpf-status'] == 'fail') {
  echo ' <div class="alert">
          <span>Numero de Cpf inválido!</span>          
       </div>
       ';
       unset($_SESSION['cpf-status']);
} 

if($_SESSION['cadastro'] == 'success') {
  echo ' <div class="alert">
          <span>Operação bem Sucedida!</span>          
       </div>
       ';
       unset($_SESSION['cadastro']);

}

?>  


<script src="./js/nav.js"></script>
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







  
    

