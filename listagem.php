<?php include("./header.php");

    

    session_start();

    if(!$_GET['nome']) {
        $client = new Client();
        $result = $client->getAllClients();
    } else {
        $client = new Client();
        $result = $client->getClientByName($_GET['nome']);
    }   
    

?>


<section class="home-section">
    <div class="card">
        <div class="card-container">  
            
            <div class="card-conteiner-search">
                <form action="" method="POST">
                    <input class="input-search" type="text" name="nome">
                    <input class="btn-search" type="submit" name="submit-search" value="Procurar">
                </form>
            </div>
            
            <form action="" method="POST">                                              
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Renda</th>
                            <th class="hidden"></th>    
                        </tr>
                    </thead>
                    <tbody>
                    <?php for ($i=0; $i < count($result) ; $i++) { ?>
                        <tr key="<?php echo $result[$i]['id']?>">
                                <td>
                                    <input type="text" class="input-name" readonly value="<?php echo $result[$i]['Nome'] ?>">
                                </td>                           
                                <td>                           
                                    <input id ="<?php echo $result[$i]['id']?>" name="renda"  type="text" readonly class="input-badge" value="R$ <?php echo $result[$i]['Renda'] ?>">
                                </td>                    
                                <td class="hidden-col">  
                                <input type="radio" name="id-info" value="<?php echo $result[$i]['id'] ?>">   
                                </td>                                                  
                            </tr> 
                            <?php } ?>  
                    </tbody>   
                </table>
                    <input type="submit" value="Editar" name="submit-info" class="btn-info">                            
                    <input type="submit" value="Excluir" name="submit-del" class="btn-del">                      
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

<script>
    
    let el = document.querySelectorAll("input[name='renda']")
    
    const parseInt = (str) => {
        let parsedStr = str.replace('R$ ', '')  
        return parsedStr      
    }    

    for (let i = 0; i < el.length; i++) {

        let value = parseInt(el[i].value)  

        if (value <= 980) 
            el[i].style.backgroundColor = '#ff4747c2'        
        else if (value > 980 && value < 2500) 
            el[i].style.backgroundColor = '#ffcf87'            
        else 
            el[i].style.backgroundColor = '#70f68cbf'        
    }

    

</script>
