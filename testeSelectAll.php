<?php
require_once './model/UsuarioDAO.php';
require_once './model/Usuario.php';
require_once './model/Rifa_tagsDAO.php';
require_once './model/Rifa_tags.php';


$rifa_tagsDAO = new Rifa_tagsDAO();
$rifa_tagsDAO = new Rifa_tagsDAO(true);
// $consulta = $userDAO->select('');
// $result['result'] = false;
// $result['quant'] = 0;
// $result['dados'] = [];
// if($consulta){
//     $result['result'] = true;
//     $result['quant'] = sizeof($consulta);
//     $result['dados'] = $consulta;
// }
// echo json_encode($result);
//var_dump(new Rifa(true));
if($rifa_tagsDAO){
    var_dump($rifa_tagsDAO);
  }
  else{
    var_dump($rifa_tagsDAO->getErro());
}
var_dump($rifa_tagsDAO->listarTodos(1));