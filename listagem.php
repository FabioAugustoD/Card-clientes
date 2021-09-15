<?php include("./header.php");

    $client = new Client();
    $result = $client->getClients();

?>


<div class="card">
    <div class="card-container">  

    <div class="card-conteiner-search">
        <input type="text">
    </div>

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Renda</th>    
                </tr>
            </thead>
            <tbody>
            <?php for ($i=0; $i < count($result) ; $i++) { ?>
                <tr>
                    <td><?php echo $result[$i]['Nome'] ?></td>                           
                    <td>
                        <div class="badge">
                            <div class="badge-content">
                                <span>R$</span>
                                <span><?php echo $result[$i]['Renda'] ?></span>
                            </div>
                        </div>
                    </td>                              
                </tr>                
            <?php } ?>  
            </tbody>
    </table>

    </div>

    </div>