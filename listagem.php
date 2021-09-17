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
                    <form action="" method="POST">
                        <td class="hidden">
                            <input type="number" name="id-info" readonly hidden value="<?php echo $result[$i]['id'] ?>">
                        </td>                        
                        <td>
                            <input type="text" class="input-name" readonly value="<?php echo $result[$i]['Nome'] ?>">
                        </td>                           
                        <td>                           
                            <input id ="<?php echo $result[$i]['id']?>" name="renda" type="text" readonly class="input-badge" value="R$ <?php echo $result[$i]['Renda'] ?>">                                  

                        </td>                    
                        <td class="hidden-col">                            
                                <input type="submit" value="i" name="submit-info" class="btn-info">                            
                        <input type="submit" value="x" name="submit-del" class="btn-del">                      
                        </td>                            
                    </form>                 
                </tr> 
            <?php } ?>  
            </tbody>   
        </table>

    </div>
</div>


<script src="./js/nav.js"></script>
</section>

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
            el[i].style.backgroundColor = '#70f68c'        
    }

    

</script>
