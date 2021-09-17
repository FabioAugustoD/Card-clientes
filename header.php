<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Styles/index.css">
    <link rel="stylesheet" href="./Styles/header.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
     integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
     crossorigin="anonymous">
    </script>    
    
    <title>Document</title>
</head>
<header>
    <?php

    error_reporting(0);    
    include("./DB/Client.php");
    include("./functions.php");

    
    ?>

<div class="sidebar">
    <div class="logo-details">
      <img class="image" src="https://tempus.digital/wp-content/uploads/2019/11/Logo.svg" alt="">        
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
     
     
      <li>
       <a href="http://localhost/Card-clientes/index.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">Cadastro</span>
       </a>
       <span class="tooltip">Cadastro</span>
     </li>

     <li>
       <a href="http://localhost/Card-clientes/listagem.php">
       <i class='bx bx-message-square-detail' ></i>
         <span class="links_name">Listar</span>
       </a>
       <span class="tooltip">Listar</span>
     </li>

     <li>
       <a href="http://localhost/Card-clientes/relatorio.php">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Relatório</span>
       </a>
       <span class="tooltip">Relatório</span>
     </li>

    
     <li class="profile">
         <div class="profile-details">
           <img src="https://media-exp1.licdn.com/dms/image/D4D35AQGsv3KKN7roWg/profile-framedphoto-shrink_200_200/0/1630446551579?e=1631919600&v=beta&t=apWihw11_SGUO3HxAj__XXU3hvWzR1Vd4eZpwNKWy2Y" alt="profileImg">
           <div class="name_job">
             <div class="name">Fabio Augusto</div>
             <div class="job">Web developer</div>
           </div>
         </div>
         <i class='bx bx-log-out' id="log_out" ></i>
     </li>
    </ul>
  </div>
    
    
</header>




    
