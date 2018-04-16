<?php

require_once "conn.php";
class UsersModel{

  static public function mdl_show_users($table, $item, $value){
    $stmt = Conn::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");
    $stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
    $stmt -> execute();
    return $stmt -> fetch();
    $stmt -> close();
    $stmt = null;
  }

  static public function mdl_create_user($table, $data){
    $stmt = Conn::connect()->prepare("INSERT INTO $table (name, user, password, type) VALUES (:name, :user, :pass, :type)");
    $stmt -> bindParam(":name", $data['name'], PDO::PARAM_STR);
    $stmt -> bindParam(":user", $data['user'], PDO::PARAM_STR);
    $stmt -> bindParam(":pass", $data['pass'], PDO::PARAM_STR);
    $stmt -> bindParam(":type", $data['type'], PDO::PARAM_STR);
    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt -> close();
    $stmt = null;
  }
}

?>
