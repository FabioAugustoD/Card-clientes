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
                            <input class="input-cad" type="text" name="nome" max="150" required>
                        </td> 
                    </tr> 
                    <tr>                   
                        <td>
                            <label for="name">CPF </label>
                        </td> 
                        <td>
                            <input class="input-cad" type="text" name="cpf" onpaste="return false;" 
                        autocomplete="off" onkeypress="return isNumber(event)"
                        minlength="11" maxlength="11">
                        </td> 
                    </tr> 
                    <tr>                   
                        <td>
                            <label for="name">Data Nascimento</label>
                        </td> 
                        <td>
                            <input class="input-cad" type="date" name="data-nasc" max="<?php getCurrentTime() ?>" required>
                        </td> 
                    </tr> 
                    <tr>                   
                        <td>
                            <label for="name">Data Cadastro</label>
                        </td> 
                        <td>
                            <input class="input-cad" type="date" name="data-cad" value="<?php getCurrentTime()?>" readonly>
                        </td> 
                    </tr> 
                    <tr>                   
                        <td>
                            <label for="number">Renda Familiar</label>
                        </td> 
                        <td>
                            <input class="input-cad" type="text" name="renda" step="0.01" min="0">
                        </td> 
                    </tr>   
                </tbody>   
           </table>
    
            <input class="btn-cad" type="submit" value="Enviar" name="submit-cad">       
    
          </div>

          <?php 
          if(isset($_SESSION['status']) && $_SESSION['status'] != '') {
          ?>

            <div class="form-msg-alert">
              <div>
                <span><?php echo $_SESSION['status'];?></span>
              </div>            
            </div>

          <?php
            unset($_SESSION['status']);    
          }
          ?>
          
       </form>
  
    </div>
  </div>
</section>




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







  
    

