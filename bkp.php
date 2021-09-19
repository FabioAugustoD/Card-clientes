<div class="card">
  <div class="card-container"> 

    <form action="" method="POST" autocomplete="off">
        <div class="form">       
                
            <div class="form-info">          
                    <input type="number" name="id" hidden readonly value="<?php echo $id?>">            
                <label for="name">Nome </label>
                    <input type="text" name="nome" value="<?php echo $update[0]['Nome']?>" max="150" required> 
                <label for="name">CPF </label>
                    <input type="text" name="cpf" value="<?php echo $update[0]['CPF']?>" onpaste="return false;" 
                    autocomplete="off" onkeypress="return isNumber(event)"
                    minlength="10" maxlength="11"> 
                <label for="name">Data Nascimento </label>                
                    <input type="date" name="data-nasc" value="<?php echo $update[0]['Nascimento']?>" max="<?php getCurrentTime() ?>" required>                
                <label for="name">Renda Familiar </label>
                    <input type="number" name="renda" value="<?php echo $update[0]['Renda']?>" min="0">
                    <input type="submit" value="Alterar" name="submit-up">
            </div>

            
        </div>

      </form>

  </div>
</div>



<ul>
                <li><h1>Classe A:</h1> <?php echo $client->getQtdByClass('A')?></li>
                <li><h1>Classe B:</h1> <?php echo $client->getQtdByClass('B')?></li>
                <li><h1>Classe C:</h1> <?php echo $client->getQtdByClass('C')?></li>
                <li><h1>Acima de 18 e renda superior média: <?php echo $client->overEighteen()?></h1></li>
            </ul>