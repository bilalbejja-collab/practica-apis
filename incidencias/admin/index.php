<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>INCIDENCIAS</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <span class="brand-text font-weight-light">INCIDENCIAS</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  CLIENTES
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link" id='verclientes'>
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ver</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link" id="nuevocliente">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Nuevo</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-exclamation-circle"></i>
                <p>
                  INCIDENCIAS
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link" id='verincidencias'>
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ver</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link" id='nuevaincidencia'>
                    <i class="far fa-circle nav-icon"></i>
                    <p>Nueva</p>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id='contenido'>


    </div>
    <footer class="main-footer">
      <strong>Copyright &copy; 2020-2021 BB</strong> All rights reserved.
    </footer>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- Modal para modifican incidencia -->
  <div id="updateincidenciamodal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-info">Modificar incidencia</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Estado:</p>
          <div class="form-group">
            <form id='formupdateincidencia' method='post'>
              <select class='form-control' id='selecEstado' name='estado'>
                <option value='abierta'>Abierta</option>
                <option value='enproceso'>En proceso</option>
                <option value="cerrada">Cerrada</option>
              </select>
              <input type='hidden' id='idIncidencia' name='id' value="">

          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" action='updateinc'>Modificar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Fin modal modificar incidencia -->
  <!-- Modal para ver en mapa la incidencia -->
  <div id="mapaincidenciamodal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-info">Localizar incidencia</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id='googleMap' style="width:100%;height:400px;>
        
      </div>
      <div class=" modal-footer">

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Fin modal modificar incidencia -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script>
    //VER CLIENTES
    document.getElementById('verclientes').addEventListener("click", async function() {
      let formData = new FormData();
      formData.append("action", "verclientes"); //Acción al controlador para verclientes
      let res = await fetch("../Controllers/controller.php", {
        method: "POST",
        body: formData,
      });
      let data = await res.text();
      //Pintamos la respuesta en el contenedor
      document.getElementById("contenido").innerHTML = data;
      //Que la tabla coja los estilos
      $('#tabla').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
    //VER INCIDENCIAS
    document.getElementById('verincidencias').addEventListener("click", async function() {
      let formData = new FormData();
      formData.append("action", "verincidencias"); //Acción al controlador para verclientes
      let res = await fetch("../Controllers/controller.php", {
        method: "POST",
        body: formData,
      });
      let data = await res.text();
      //Pintamos la respuesta en el contenedor
      document.getElementById("contenido").innerHTML = data;
      //Que la tabla coja los estilos
      $('#tabla').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
    //NUEVA INCIDENCIA
    document.getElementById('nuevaincidencia').addEventListener("click", async function() {
      let formData = new FormData();
      formData.append("action", "nuevaincidencia"); //Acción al controlador para verclientes
      let res = await fetch("../Controllers/controller.php", {
        method: "POST",
        body: formData,
      });
      let data = await res.text();
      //Pintamos la respuesta en el contenedor
      document.getElementById("contenido").innerHTML = data;
    });
    //NUEVO CLIENTE
    document.getElementById('nuevocliente').addEventListener("click", async function() {
      let formData = new FormData();
      formData.append("action", "nuevocliente"); //Acción al controlador para verclientes
      let res = await fetch("../Controllers/controller.php", {
        method: "POST",
        body: formData,
      });
      let data = await res.text();
      //Pintamos la respuesta en el contenedor
      document.getElementById("contenido").innerHTML = data;
    });
    //BOTÓN CREAR INCIDENCIA Y CREAR CLIENTE
    document.getElementById("contenido").addEventListener("click", async function(e) {
      if (e.target.closest("button[action=insertinc]")) {
        document.getElementById("formincidencia").addEventListener("submit", async function(e2) {
          e2.preventDefault(); //Para que no envíe el formulario antes
          let formData = new FormData(e2.target);
          formData.append("action", "insertincidencia"); //Acción al controlador para insertar
          let res = await fetch("../Controllers/controller.php", {
            method: "POST",
            body: formData,
          });
          let data = await res.text();
          //Pintamos la respuesta en el contenedor
          document.getElementById("contenido").innerHTML = data;
          //Que la tabla coja los estilos
          $('#tabla').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });

        });
      }
      if (e.target.closest("button[action=insertcli]")) {
        document.getElementById("formcliente").addEventListener("submit", async function(e2) {
          e2.preventDefault(); //Para que no envíe el formulario antes
          let formData = new FormData(e2.target);
          formData.append("action", "insertcliente"); //Acción al controlador para insertar
          let res = await fetch("../Controllers/controller.php", {
            method: "POST",
            body: formData,
          });
          let data = await res.text();
          //Pintamos la respuesta en el contenedor
          document.getElementById("contenido").innerHTML = data;
          //Que la tabla coja los estilos
          $('#tabla').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      }
    });
    //BOTÓN BORRAR INCIDENCIA
    document.getElementById("contenido").addEventListener("click", async function(e) {
      let link = e.target.closest("a[id=deleteincidencia]");
      if (link) {
        let formData = new FormData();
        formData.append("action", "deleteincidencia");
        formData.append("id", link.getAttribute('idincidencia'));
        let res = await fetch("../Controllers/controller.php", {
          method: "POST",
          body: formData,
        });
        let data = await res.text();
        //Pintamos la respuesta en el contenedor
        document.getElementById("contenido").innerHTML = data;
        //Que la tabla coja los estilos
        $('#tabla').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      }
    });
    //BOTÓN BORRAR CLIENTE
    document.getElementById("contenido").addEventListener("click", async function(e) {
      let link = e.target.closest("a[id=deletecliente]");
      if (link) {
        let formData = new FormData();
        formData.append("action", "deletecliente");
        formData.append("id", link.getAttribute('idcliente'));
        let res = await fetch("../Controllers/controller.php", {
          method: "POST",
          body: formData,
        });
        let data = await res.text();
        //Pintamos la respuesta en el contenedor
        document.getElementById("contenido").innerHTML = data;
        //Que la tabla coja los estilos
        $('#tabla').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      }
    });
    //BOTÓN UPDATE INCIDENCIA ABRIR FORM
    document.getElementById("contenido").addEventListener("click", async function(e) {
      let link = e.target.closest("a[id=updateincidencia]");
      if (link) {
        $('#updateincidenciamodal').modal('show');
        //Cargo en el modal el estado y el identificador de la incidencia
        var modal = $('#updateincidenciamodal');
        modal.find('#selecEstado').val(link.getAttribute('estado'));
        modal.find('#idIncidencia').val(link.getAttribute('idincidencia'));
      }
    });
    //BOTÓN UPDATE ESTADO INCIDENCIA EN EL MODAL
    document.getElementById("formupdateincidencia").addEventListener("submit", async function(e) {
      console.log('updateincidencia');
      e.preventDefault(); //Para que no envíe el formulario antes
      let formData = new FormData(e.target);
      formData.append("action", "updateincidencia"); //Acción al controlador para insertar
      let res = await fetch("../Controllers/controller.php", {
        method: "POST",
        body: formData,
      });
      let data = await res.text();
      $('#updateincidenciamodal').modal('hide');
      document.getElementById("contenido").innerHTML = data;
      //Que la tabla coja los estilos
      $('#tabla').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });

    //BOTÓN VER MAPA
    document.getElementById("contenido").addEventListener("click", async function(e) {
      let link = e.target.closest("a[id=vermapa]");
      if (link) {
        $('#mapaincidenciamodal').modal('show');
        //Datos de la incidencia
        longitud = link.getAttribute('longitud');
        latitud = link.getAttribute('latitud');
        label = link.getAttribute('etiqueta');
        var posicion = new google.maps.LatLng(latitud, longitud);
        var mapCentro = {
          center: posicion,
          zoom: 10,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapCentro);

        var marker = new google.maps.Marker({
          position: posicion,
          label: label,
          map: map
        });


      }
    });
  </script>
</body>

</html>