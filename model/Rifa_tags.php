<?php

class Rifa_tags {
  public int  $fk_Rifa_id;
  public int  $fk_Tags_id;
  public string $creation_time;

  public function __construct($c=0, $fk_Rifa_id=0, $fk_Tags_id=0, $creation_time="") {
    if($c){
      $this->fk_Rifa_id = $fk_Rifa_id;
      $this->fk_Tags_id = $fk_Tags_id;
      $this->creation_time = $creation_time;
    }
  }

  // Getters e Setters
  public function getfk_Rifa_id() {
    return $this->fk_Rifa_id;
  }

  public function setfk_Rifa_id($fk_Rifa_id) {
    $this->fk_Rifa_id = $fk_Rifa_id;
  }

  public function getfk_Tags_id() {
    return $this->fk_Tags_id;
  }

  public function setfk_Tags_id($fk_Tags_id) {
    $this->fk_Tags_id = $fk_Tags_id;
  }
  public function getCreationTime() {
    return $this->creation_time;
  }

  public function setCreationTime($creation_time) {
    $this->creation_time = $creation_time;
  }
}
