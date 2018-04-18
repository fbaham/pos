<?php
class UserController{
  // INGRESO DE USUARIO
  static public function ctr_user_login(){
    if(isset($_POST['user'])){
      if(preg_match('/^[a-zA-Z0-9]+$/', $_POST['user']) && preg_match('/^[a-zA-Z0-9]+$/', $_POST['pass'])){
        $crypt_password = crypt($_POST["pass"], '$2a$07$7lMDoTjtJHIj81Cldeg1B$');
        $table = "users";
        $item = "user";
        $value = $_POST['user'];
        $response = UsersModel::mdl_show_users($table, $item, $value);
        if($response['user'] == $_POST['user'] && $response['password'] == $crypt_password){
          $_SESSION['Login'] = 'ok';
          $_SESSION['id'] = $response['id'];
          $_SESSION['name'] = $response['name'];
          $_SESSION['user'] = $response['user'];
          $_SESSION['photo'] = $response['photo'];
          $_SESSION['type'] = $response['type'];
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
        $path = '';
        if(isset($_FILES['newPhoto']['tmp_name'])){
          list($width, $height) = getimagesize($_FILES['newPhoto']['tmp_name']);
          $new_width = 500;
          $new_height = 500;
          // DIRECTORIO DE LA IMAGEN
          $directory = "views/img/users/" . $_POST["newUser"];
          mkdir($directory, 0755);
          //APLICAR FUNCIONES DE PHP DE ACUERDO AL TIPO DE LA IMAGEN
          if($_FILES['newPhoto']['type'] == "image/jpeg"){
            //GUARDAR IMAGEN EN DIRECTORIO
            $random = mt_rand(100,999);
            $path = "views/img/users/" . $_POST['newUser'] . "/" . $random . ".jpg";
            $origin = imagecreatefromjpeg($_FILES['newPhoto']['tmp_name']);
            $destiny = imagecreatetruecolor($new_width, $new_height);
            imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            imagejpeg($destiny, $path);
          }

          if($_FILES['newPhoto']['type'] == "image/png"){
            //GUARDAR IMAGEN EN DIRECTORIO
            $random = mt_rand(100,999);
            $path = "views/img/users/" . $_POST['newUser'] . "/" . $random . ".png";
            $origin = imagecreatefrompng($_FILES['newPhoto']['tmp_name']);
            $destiny = imagecreatetruecolor($new_width, $new_height);
            imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            imagepng($destiny, $path);
          }

        }
        $table = "users";
        $crypt_password = crypt($_POST["newPass"], '$2a$07$7lMDoTjtJHIj81Cldeg1B$');

        $data = array("name" => $_POST["newName"],
                      "user" => $_POST["newUser"],
                      "pass" => $crypt_password,
                      "type" => $_POST["newType"],
                      "photo" => $path);
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
