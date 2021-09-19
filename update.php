<?php 
session_start();

include("./header.php");

$id = $_GET['id'];
$client = new Client();
$update = $client->getClientByID($id);

$_SESSION['cpf'] = $update[0]['CPF'];


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
                            <tr class="hidden"> 
                                <input type="number" name="id" hidden readonly value="<?php echo $id?>">
                            </tr>          
                            <tr>                   
                                <td>
                                    <label for="name">Nome </label>
                                </td> 
                                <td>
                                <input class="input-cad" type="text" name="nome" value="<?php echo $update[0]['Nome']?>" max="150" required> 
                                </td> 
                            </tr> 
                            <tr>                   
                                <td>
                                    <label for="name">CPF </label>
                                </td> 
                                <td>
                                <input class="input-cad" type="text" name="cpf" value="<?php echo $update[0]['CPF']?>" onpaste="return false;" 
                                autocomplete="off" onkeypress="return isNumber(event)"
                                minlength="10" maxlength="11"> 
                                </td> 
                            </tr> 
                            <tr>                   
                                <td>
                                    <label for="name">Data Nascimento</label>
                                </td> 
                                <td>
                                <input class="input-cad" type="date" name="data-nasc" value="<?php echo $update[0]['Nascimento']?>" max="<?php getCurrentTime() ?>" required> 
                                </td> 
                            </tr>                 
                            <tr>                   
                                <td>
                                    <label for="number">Renda Familiar</label>
                                </td> 
                                <td>
                                <input class="input-cad" type="number" name="renda" value="<?php echo $update[0]['Renda']?>" min="0" step="any">
                                </td> 
                            </tr>   
                        </tbody>   
                    </table>

                     <input  class="btn-cad" type="submit" value="Enviar" name="submit-up">

                </div>
            </form>

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

        </div>
    </div>
</section>


<script src="./js/nav.js"></script>


