<?php include("./header.php");



$client = new Client();
// $result = $client->overEighteen();

// $client->getQuery();

?>

<section>

<div class="report-card">

    <div class="report-menu">

        <div class="report-menu-container">
            <span>Relatório de controle | SETEMBRO 2021</span>
        </div>

        <div class="report-menu-container">
            <ul class="filter-links">
                <li>
                  <a href="http://localhost/Card-clientes/relatorio.php?filter=all">
                    <span>  
                        Todos                      
                    </span>
                 </a>                  
                </li>
                <li>
                  <a href="http://localhost/Card-clientes/relatorio.php?filter=month">
                    <span> 
                        Mês                       
                    </span>
                 </a>                  
                </li>
                <li>
                  <a href="http://localhost/Card-clientes/relatorio.php?filter=week">
                    <span>  
                        Semana                      
                    </span>
                 </a>                  
                </li>
                <li>
                  <a href="http://localhost/Card-clientes/relatorio.php?filter=day">
                    <span>   
                        Dia                     
                    </span>
                 </a>                  
                </li>                
            </ul>
        </div>
    </div>


    <div class="report-inner">  
           
    <div class="report-inner-card"> 
                <div class="card-header">                    
                        <span>
                            CLIENTES 
                        </span>                   
                        <span>
                        <img src="https://img.icons8.com/ios-filled/50/000000/18-plus.png"/>
                        </span>                                      
                </div> 
                
                <div class="card-header">
                        <span>
                            Total 
                        </span>                   
                        <span>
                          <?php echo $client->overEighteen()?>
                        </span>                                 
                </div>             
    </div>

    <div class="report-inner-card"> 
                <div class="card-header">                    
                        <span>
                            CLASSE 
                        </span>                   
                        <span>
                        <img src="https://img.icons8.com/ios/50/000000/circled-a.png"/>
                        </span>                                      
                </div> 
                
                <div class="card-header">
                        <span>
                            Total 
                        </span>                   
                        <span>
                           <?php echo $client->getQtdByClass('A')?>
                        </span>                                 
                </div>             
    </div>

    <div class="report-inner-card"> 
                <div class="card-header">                    
                        <span>
                            CLASSE 
                        </span>                   
                        <span>
                        <img src="https://img.icons8.com/ios/50/000000/xbox-b.png"/>
                        </span>                                      
                </div> 
                
                <div class="card-header">
                        <span>
                            Total 
                        </span>                   
                        <span>
                           <?php echo $client->getQtdByClass('B')?>
                        </span>                                 
                </div>             
    </div>

    <div class="report-inner-card"> 
                <div class="card-header">                    
                        <span>
                            CLASSE 
                        </span>                   
                        <span>
                        <img src="https://img.icons8.com/ios/50/000000/circled-c.png"/>
                        </span>                                      
                </div> 
                
                <div class="card-header">
                        <span>
                            Total 
                        </span>                   
                        <span>
                           <?php echo $client->getQtdByClass('C')?>
                        </span>                                 
                </div>             
    </div>

         

        

          

          

         

        </div>
    </div>

</div>

</section>


   


<script src="./js/nav.js"></script>