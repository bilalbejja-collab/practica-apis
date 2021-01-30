<?php
namespace Incidencias;

class VistaCliente {

    public static function renderClientes($clientes) {
?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CLIENTES</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tabla" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Localidad</th>
                    <th>Móvil</th>
                    <th>DNI</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                
<?php
    foreach($clientes as $cliente) {
        echo "<tr>";
        echo "<td>".$cliente->getNombre()."</td>";
        echo "<td>".$cliente->getDireccion()."</td>";
        echo "<td>".$cliente->getLocalidad()."</td>";
        echo "<td>".$cliente->getMovil()."</td>";
        echo "<td>".$cliente->getDNI()."</td>"; 
        echo "<td>";
        echo "<a class='text-danger ml-2' id='deletecliente' idcliente='".$cliente->getId()."'><i class='fas fa-trash-alt'></i></a>";
        echo "</td>";        
        echo "</tr>";
    }

?>

            </tbody>
            </table>


            </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 


 <?php

    }


    //Formulario para insertar cliente
    public static function renderFormNuevoCliente() {
      ?>
      
      <div class="container-fluid">
              <div class="row">
                <div class="col-12">
      
                  <div class="card card-info mt-3">
                    <div class="card-header">
                      <h3 class="card-title">Nuevo Cliente</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" id="formcliente">
                      <div class="card-body">
                        <div class="form-group row">
                          <label for="nombre" class="col-sm-1 col-form-label">nombre</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control" id="nombre" name='nombre' placeholder="Javier" required>
                          </div>
                          <label for="dni" class="col-sm-1 col-form-label ml-3">DNI</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control" id="dni" name='dni' placeholder="48456522L" required>
                          </div>                    
                        </div>   
                        <div class="form-group row">
                          <label for="ciudad" class="col-sm-1 col-form-label">Localidad</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control" id="localidad" name='localidad' placeholder="Almería" required>
                          </div>
                          <label for="movil" class="col-sm-1 col-form-label ml-3">Móvil</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control" id="movil" name='movil' placeholder="655441579">
                          </div>
                        </div>                                                   
                        <div class="form-group row">
                          <label for="direccion" class="col-sm-1 col-form-label">Dirección</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="direccion" name='direccion' placeholder="Av. Lucero 2" required>
                          </div>
                        </div>
      
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-info" action='insertcli'>Crear</button>
                      </div>
                      <!-- /.card-footer -->
                    </form>
                  </div>
                  <!-- /.card -->
      
                </div>
              </div>
          </div>
      
      <?php
          }
  
    
}

?>   