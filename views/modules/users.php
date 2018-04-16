<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Administrar usuarios
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Administrar usuarios</li>
    </ol>
  </section>

  <section class="content">

    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalCreateUser">Agregar Usuario</button>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Foto</th>
              <th>Perfil</th>
              <th>Estado</th>
              <th>Último login</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Administrador</td>
              <td>admin</td>
              <td><img src="views\img\users\default\anonymous.png" alt="" class="img-thumbnail" width="40px"></td>
              <td>Administrator</td>
              <td><button class="btn btn-success btn-xs">Activado</button></td>
              <td>2018-04-16</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                </div>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>Administrador</td>
              <td>admin</td>
              <td><img src="views\img\users\default\anonymous.png" alt="" class="img-thumbnail" width="40px"></td>
              <td>Administrator</td>
              <td><button class="btn btn-success btn-xs">Activado</button></td>
              <td>2018-04-16</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                </div>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>Administrador</td>
              <td>admin</td>
              <td><img src="views\img\users\default\anonymous.png" alt="" class="img-thumbnail" width="40px"></td>
              <td>Administrator</td>
              <td><button class="btn btn-danger btn-xs">Desactivado</button></td>
              <td>2018-04-16</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        Footer
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- MODAL AGREGAR USUARIO -->

<!-- Modal -->
<div id="modalCreateUser" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
      <!-- header -->
        <div class="modal-header" style="background: #3C8DBC; color: white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Usuario</h4>
        </div>
        <!-- body -->
        <div class="modal-body">
          <div class="box-body">
            <!-- NOMBRE -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" name="newName" placeholder="Ingresar nombre" required>
              </div>
            </div>
            <!-- USUARIO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" class="form-control input-lg" name="newUser" placeholder="Ingresar nombre de usuario" required>
              </div>
            </div>
            <!-- PASSWORD -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control input-lg" name="newPass" placeholder="Ingresar password" required>
              </div>
            </div>
            <!-- PERFIL -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="newType">
                  <option value="">Seleccionar perfil</option>
                  <option value="Administrator">Administrador</option>
                  <option value="Special">Especial</option>
                  <option value="Seller">Vendedor</option>
                </select>
              </div>
            </div>
            <!-- FOTO -->
            <div class="form-group">
              <div class="panel text-uppercase">SUBIR FOTO</div>
              <input type="file" id="newPhoto" name="newPhoto">
              <p class="help-block">Peso máximo de la foto 200 MB</p>
              <img src="views\img\users\default\anonymous.png" alt="" class="img-thumbnail" width="100px">
            </div>
          </div>
        </div>
        <!-- footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar usuario</button>
        </div>
      </form>
    </div>

  </div>
</div>
