<?php
namespace Incidencias;

class VistaIndex {

    public static function render($libros) {

?>     
 
 <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ISBN</th>
      <th scope="col">Título</th>
      <th scope="col">Subtítulo</th>
      <th scope="col">Descripción</th>
      <th scope="col">Autor</th>
      <th scope="col">Editorial</th>
      <th scope="col">Imagen</th>
      <th scope="col">Ejemplares</th>
      <th scope="col">Disponibles</th>
      <th scope="col">ACCIONES</th>
    </tr>
  </thead>
  <tbody>

<?php
    //Pintamos los libros
    foreach($libros as $libro) {
        echo "<tr>";
        echo "<td>".$libro->getISBN()."</td>";
        echo "<td>".$libro->getTitulo()."</td>";
        echo "<td>".$libro->getSubtitulo()."</td>";
        echo "<td>".$libro->getDescripcion()."</td>";
        echo "<td>".$libro->getAutor()."</td>";
        echo "<td>".$libro->getEditorial()."</td>";
        echo "<td><img width='50' src='".$libro->getImagen()."'></td>";
        echo "<td>".$libro->getNumejem()."</td>";
        echo "<td>".$libro->getNumejemdisp()."</td>";
        echo "<td><button class='text-primary books' action='delete' value='".$libro->getId()."'><i class='fas fa-trash-alt px-2'></i></button></td>";
        echo "</tr>";
    }

?>


   </tbody>
 </table>

 
<?php
        
        
    }

}

?>