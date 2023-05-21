<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
  <label for="fk_Rifa_id">fk_Rifa_id:</label>
  <input type="number" id="fk_Rifa_id" name="fk_Rifa_id" required>
  <br>
  <label for="fk_Tags_id">fk_Tags_id</label>
  <input type="number" id="fk_Tags_id" name="fk_Tags_id" required>
  <br>
  <input type="submit" value="Cadastrar">
</form>
    <?php
    require_once 'model/Rifa_tagsDAO.php';
    require_once 'model/Rifa_tags.php';
    
    // verifica se os dados foram enviados pelo formulário
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // obtém os dados do formulário
        $fk_Rifa_id = $_POST['fk_Rifa_id'];
        $fk_Tags_id = $_POST['fk_Tags_id'];

      // cria um novo objeto Rifa_tags com os dados do formulário
      $rifa_tags = new Rifa_tags($fk_Rifa_id, $fk_Tags_id, 'CURRENT_TIMESTAMP');
    
      var_dump($rifa_tags);

      // cria um novo objeto Rifas_tagsDAO e insere um novo rifa_tags no banco de dados
      $Rifa_tagsDAO = new Rifa_tagsDAO();
      $rifa_tags = $Rifa_tagsDAO->insert($rifa_tags);
      if($rifa_tags){
        var_dump($rifa_tags);
      }
      else{
        var_dump($Rifa_tagsDAO->getErro());
      }         
    }
    ?>
</body>
</html>

