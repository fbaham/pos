<?php
class UserController{

  static public function ctr_user_login(){
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

  static public function ctr_create_user(){
    if(isset($_POST['newUser'])){
      if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newName"]) &&
			    preg_match('/^[a-zA-Z0-9]+$/', $_POST["newUser"]) &&
			    preg_match('/^[a-zA-Z0-9]+$/', $_POST["newPass"])){
        $table = "users";
        $data = array("name" => $_POST["newName"],
                      "user" => $_POST["newUser"],
                      "pass" => $_POST["newPass"],
                      "type" => $_POST["newType"]);
        $response = UsersModel::mdl_create_user($table, $data);
        if($response=='ok'){
          echo '<script>
        					swal({
        						type: "success",
        						title: "¡El usuario ha sido guardado correctamente!",
        						showConfirmButton: true,
        						confirmButtonText: "Cerrar"
        					}).then(function(result){
        						if(result.value){
        							window.location = "users";
        						}
        					});
      					</script>';
        } elseif($response == 'error') {
          echo "<script>
                  swal({
                    type: 'error',
                    title: '¡Error al crear usuario!',
                    showConfirmButton: true,
                    confirmButtonText: 'Cerrar',
                    closeOnConfirm: false
                  }).then((result)=>{
                    if (result.value){
                      window.location = 'users';
                    }
                  });
                </script>";
        }
      } else {
        echo "<script>
                swal({
                  type: 'error',
                  title: '¡El usuario no puede ir vacío o llevar caracteres especiales!',
                  showConfirmButton: true,
                  confirmButtonText: 'Cerrar',
                  closeOnConfirm: false
                }).then((result)=>{
                  if (result.value){
                    window.location = 'users';
                  }
                });
              </script>";
      }
    }
  }

}

?>
