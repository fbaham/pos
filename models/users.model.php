<?php

require_once "conn.php";
class UsersModel{
  static public function mdl_show_users($table, $item, $value){
    $stmt = Conn::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");
    $stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
    $stmt -> execute();
    return $stmt -> fetch();
  }
}

?>
