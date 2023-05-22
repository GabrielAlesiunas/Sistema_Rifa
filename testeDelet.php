<?php
require_once './model/Rifa_tags.php';
require_once './model/Rifa_tagsDAO.php';

$rifa_tagsDAO = new Rifa_tagsDAO(true);
if($rifa_tagsDAO){
  var_dump($rifa_tagsDAO);
}
else{
  var_dump($rifa_tagsDAO->getErro());
}
var_dump($rifa_tagsDAO->deleteById(1));