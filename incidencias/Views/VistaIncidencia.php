<?php
namespace Incidencias;

class VistaIncidencia {

    public static function renderIncidencias($incidencias) {
?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>INCIDENCIAS</h1>
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
                    <th>Latitud</th>
                    <th>Longitud</th>
                    <th>Ciudad</th>
                    <th>Dirección</th>
                    <th>Etiqueta</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Cliente</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                
<?php
    foreach($incidencias as $incidencia) {
        echo "<tr>";
        echo "<td>".$incidencia->getLongitud()."</td>";
        echo "<td>".$incidencia->getLatitud()."</td>";
        echo "<td>".$incidencia->getCiudad()."</td>";
        echo "<td>".$incidencia->getDireccion()."</td>";
        echo "<td>".$incidencia->getEtiqueta()."</td>";
        echo "<td>".$incidencia->getDescripcion()."</td>";
        echo "<td>".$incidencia->getEstado()."</td>";
        echo "<td>".$incidencia->getIdCliente()."</td>";
        echo "<td>";
        echo "<a class='text-danger ml-2' id='deleteincidencia' idincidencia='".$incidencia->getId()."'><i class='fas fa-trash-alt'></i></a>";
        echo "<a class='text-warning ml-2' id='updateincidencia' idincidencia='".$incidencia->getId()."' estado='".$incidencia->getEstado()."'><i class='fas fa-pencil-alt'></i></a>";
        echo "<a class='text-primary ml-2' id='vermapa' etiqueta='".$incidencia->getEtiqueta()."' longitud='".$incidencia->getLongitud()."' latitud='".$incidencia->getLatitud()."'><i class='fas fa-map-marked-alt'></i></a>";
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


    //Formulario para insertar incidencia
    public static function renderFormNuevaIncidencia() {
?>

<div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card card-info mt-3">
              <div class="card-header">
                <h3 class="card-title">Nueva Incidencia</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id="formincidencia">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="latitud" class="col-sm-1 col-form-label">Latitud</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="latitud" name='latitud' placeholder="20.45" required>
                    </div>
                    <label for="longitud" class="col-sm-1 col-form-label ml-3">Longitud</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="longitud" name='longitud' placeholder="-18.35" required>
                    </div>                    
                  </div>   
                  <div class="form-group row">
                    <label for="ciudad" class="col-sm-1 col-form-label">Ciudad</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="ciudad" name='ciudad' placeholder="Almería" required>
                    </div>
                    <label for="etiqueta" class="col-sm-1 col-form-label ml-3">Etiqueta</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="etiqueta" name='etiqueta' placeholder="inc1">
                    </div>
                  </div>                                                   
                  <div class="form-group row">
                    <label for="direccion" class="col-sm-1 col-form-label">Dirección</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="direccion" name='direccion' placeholder="Av. Lucero 2" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Descripción</label>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-11">
                        <textarea name="descripcion" class="form-control" rows="3" placeholder="Escribe algo ..."></textarea>
                    </div>
                  </div> 
                  <!-- Estos campos se pasan con el valor por defecto -->
                  <input type="hidden" name="estado" value="abierta">
                  <input type="hidden" name="id_cliente" value=1>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info" action='insertinc'>Crear</button>
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