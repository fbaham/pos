<?php
class Conn{
  public function connect(){
    $link = new PDO("mysql:host=localhost;dbname=pos","root","");
    $link ->exec("set names utf8");
    return $link;
  }
}

?>
