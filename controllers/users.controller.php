<?php
class UserController{
  public function ctr_user_login(){
    if(isset($_POST['user'])){
      if(preg_match('/^[a-zA-Z0-9]+$/', $_POST['user']) && preg_match('/^[a-zA-Z0-9]+$/', $_POST['pass'])){
        $table = "users";
        $item = "user";
        $value = $_POST['user'];
        $response = UsersModel::mdl_show_users($table, $item, $value);
        if($response['user'] == $_POST['user'] && $response['password'] == $_POST['pass']){
          $_SESSION['Login']='ok';
          echo '<script>
            window.location = "home";
          </script>';
        } else {
          echo '<br /><div class="alert alert-danger">Error al ingresar, intentalo nuevamente</div>';
        }
      }
    }
  }
}

?>
