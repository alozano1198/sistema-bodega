<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');

include ('../app/controllers/devoluciones/listado_de_devoluciones.php');
include ('../app/controllers/almacen/listado_de_productos.php');
include ('../app/controllers/clientes/listado_de_clientes.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Registro de Nueva Devolución</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

           <div class="row">
                       <div class="col-md-12">
                           <div class="card card-outline card-primary">
                               <div class="card-header">
                                <?php 
                                $contador_de_devoluciones = 0;
                                foreach ($devoluciones_datos as $devoluciones_dato) {
                                  $contador_de_devoluciones = $contador_de_devoluciones + 1;
                                }
                                ?>
                                   <h3 class="card-title"><i class="fa fa-shopping-bag"></i> Devolución No. 
                                   <input type="text" style="text-align: center;" name="" id="" value="<?php echo $contador_de_devoluciones + 1;?>" disabled></h3>
                                   <div class="card-tools">
                                       <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                           <i class="fas fa-minus"></i>
                                       </button>
                                   </div>

                               </div>

                               <div class="card-body">
                                   <b>Producto</b>

                                   <button type="button" class="btn btn-primary" data-toggle="modal"
                                               data-target="#modal-buscar_producto">
                                           <i class="fa fa-search"></i>
                                           Buscar producto
                                       </button>
                                       <!-- modal para visualizar datos de los proveedor -->
                                       <div class="modal fade" id="modal-buscar_producto">
                                           <div class="modal-dialog modal-lg">
                                               <div class="modal-content">
                                                   <div class="modal-header" style="background-color: #1d36b6;color: white">
                                                       <h4 class="modal-title">Busqueda del producto</h4>
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                           <span aria-hidden="true">&times;</span>
                                                       </button>
                                                   </div>
                                                   <div class="modal-body">
                                                       <div class="table table-responsive">
                                                           <table id="example1" class="table table-bordered table-striped table-sm">
                                                               <thead>
                                                               <tr>
                                                                   <th><center>No.</center></th>
                                                                   <th><center>Selecionar</center></th>
                                                                   <th><center>Código</center></th>
                                                                   <th><center>Categoría</center></th>
                                                                   <th><center>Imagen</center></th>
                                                                   <th><center>Nombre</center></th>
                                                                   <th><center>Descripción</center></th>
                                                                   <th><center>Stock</center></th>
                                                                   <th><center>Fecha compra</center></th>
                                                                   <th><center>Usuario</center></th>
                                                               </tr>
                                                               </thead>
                                                               <tbody>
                                                               <?php
                                                               $contador = 0;
                                                               foreach ($productos_datos as $productos_dato){
                                                                   $id_producto = $productos_dato['id_producto']; ?>
                                                                   <tr>
                                                                       <td><?php echo $contador = $contador + 1; ?></td>
                                                                       <td>
                                                                           <button class="btn btn-info" id="btn_selecionar<?php echo $id_producto;?>">
                                                                               Selecionar
                                                                           </button>
                                                                           <script>
                                                                               $('#btn_selecionar<?php echo $id_producto;?>').click(function () {

                                                                                //alert('<?php echo $id_producto;?>')


                                                                                   var id_producto = "<?php echo $id_producto;?>";
                                                                                   $('#id_producto').val(id_producto);

                                                                                    var producto = "<?php echo $productos_dato['nombre'];?>";
                                                                                   $('#producto').val(producto);

                                                                                   var descripcion = "<?php echo $productos_dato['descripcion'];?>";
                                                                                   $('#descripcion').val(descripcion);


                                                                                   $('#cantidad').focus();

                                                                                                  

                                                                                   //$('#modal-buscar_producto').modal('toggle');

                                                                               });
                                                                           </script>
                                                                       </td>
                                                                       <td><?php echo $productos_dato['codigo'];?></td>
                                                                       <td><?php echo $productos_dato['categoria'];?></td>
                                                                       <td>
                                                                           <img src="<?php echo $URL."/almacen/img_productos/".$productos_dato['imagen'];?>" width="50px" alt="asdf">
                                                                       </td>
                                                                       <td><?php echo $productos_dato['nombre'];?></td>
                                                                       <td><?php echo $productos_dato['descripcion'];?></td>
                                                                       <td>
                                                                        <?php echo $productos_dato['stock'];?>
                                                                      </td>
                                                                       <td><?php echo $productos_dato['fecha_ingreso'];?></td>
                                                                       <td><?php echo $productos_dato['nombres'];?></td>
                                                                   </tr>
                                                                   <?php
                                                               }
                                                               ?>
                                                               </tbody>
                                                               </tfoot>
                                                           </table>
                                                           <div class="row">
                                                            <div class="col-md-5">
                                                              <div class="form-group">
                                                                <input type="text" id="id_producto" hidden>
                                                                <label for="">Producto</label>
                                                                <input type="text" name="" id="producto" class="form-control" disabled>
                                                              </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                              <div class="form-group">
                                                                <label for="">Descripción</label>
                                                                <input type="text" name="" id="descripcion" class="form-control" disabled>
                                                              </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                              <div class="form-group">
                                                                <label for="">Cantidad</label>
                                                                <input type="text" name="" id="cantidad" class="form-control">
                                                              </div>
                                                            </div>
                                                           </div>
                                                           <button style="float: right;" id="btn_registrar_carrito_devolucion" class="btn btn-primary">Registrar</button>
                                                           <div id="respuesta_carrito_devolucion"></div>
                                                           <script>
                                                            $('#btn_registrar_carrito_devolucion').click(function () {
                                                              //alert("Click");

                                                              var nro_devolucion = '<?php echo $contador_de_devoluciones+1; ?>';
                                                              var id_producto = $('#id_producto').val();
                                                              var cantidad = $('#cantidad').val();

                                                              if (id_producto == "") {
                                                                alert("Debe de llenar los campos...");
                                                              }else if (cantidad == "") {
                                                                alert("Debe de llenar la cantidad del producto...");
                                                              }else{
                                                                //alert("Listo");
                                                                var url = "../app/controllers/devoluciones/registrar_carrito_devolucion.php";
                                                                $.get(url,{nro_devolucion:nro_devolucion, id_producto:id_producto, cantidad:cantidad},function (datos) {
                                                                    $('#respuesta_carrito_devolucion').html(datos);
                                                                });
                                                              }
                                                              
                                                            });
                                                           </script>
                                                           <br><br>
                                                       </div>
                                                   </div>
                                               </div>
                                               <!-- /.modal-content -->
                                           </div>
                                           <!-- /.modal-dialog -->
                                       </div>

                                       <br><br>
                                       <div class="table-responsive">
                                        <table class="table table-bordered table-sm table-hover table-striped">
                                          <thead>
                                            <tr>
                                              <th style="background-color: #e7e7e7; text-align: center;">No.</th>
                                              <th style="background-color: #e7e7e7; text-align: center;">Producto</th>
                                              <th style="background-color: #e7e7e7; text-align: center;">Descripción</th>
                                              <th style="background-color: #e7e7e7; text-align: center;">Cantidad</th>
                                              <th style="background-color: #e7e7e7; text-align: center;">Acción</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php 
                                            $contador_de_carrito_devolucion = 0;
                                            $cantidad_total = 0;

                                            $nro_devolucion = $contador_de_devoluciones + 1;
                                            $sql_carrito_devolucion = "SELECT *, pro.nombre AS nombre_producto, pro.descripcion AS descripcion,
                                            pro.stock AS stock, pro.id_producto AS id_producto  
                                            FROM tb_carrito_devolucion AS carr INNER JOIN tb_almacen AS pro 
                                            ON carr.id_producto = pro.id_producto
                                            WHERE nro_devolucion = '$nro_devolucion' ORDER BY id_carrito_devolucion ASC;";
                                            $query_carrito_devolucion = $pdo->prepare($sql_carrito_devolucion);
                                            $query_carrito_devolucion->execute();
                                            $carrito_devolucion_datos = $query_carrito_devolucion->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($carrito_devolucion_datos as $carrito_devolucion_dato) {
                                              $id_carrito_devolucion = $carrito_devolucion_dato['id_carrito_devolucion'];
                                              $contador_de_carrito_devolucion = $contador_de_carrito_devolucion + 1;
                                              $cantidad_total = $cantidad_total + $carrito_devolucion_dato['cantidad'];
                                             ?>
                                              <tr>
                                                <td>
                                                  <center><?php echo $contador_de_carrito_devolucion;?></center>
                                                  <input type="text" name="" id="id_producto<?php echo $contador_de_carrito_devolucion;?>" value="<?php echo $carrito_devolucion_dato['id_producto']; ?>" hidden>
                                                </td>
                                                <td><?php echo $carrito_devolucion_dato['nombre_producto']; ?></td>
                                                <td><?php echo $carrito_devolucion_dato['descripcion']; ?></td>
                                                <td>
                                                  <center><span id="cantidad_carrito_devolucion<?php echo $contador_de_carrito_devolucion;?>"><?php echo $carrito_devolucion_dato['cantidad'];?></span></center>
                                                  <input type="text" value="<?php echo $carrito_devolucion_dato['stock']; ?>" id="stock_de_inventario<?php echo $contador_de_carrito_devolucion;?>" hidden>
                                                </td>
                                                <td>
                                                  <center>
                                                    <form action="../app/controllers/devoluciones/borrar_carrito_devolucion.php" method="post">
                                                      <input type="text" name="id_carrito_devolucion" value="<?php echo $id_carrito_devolucion;?>" hidden>
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Borrar</button>
                                                  </form>
                                                  </center>
                                                </td>
                                              </tr>
                                              <?php
                                            }
                                            ?>
                                            <tr>
                                              <th colspan="3" style="background-color: #e7e7e7; text-align: right;">Total</th>
                                              <th style="background-color: #fff819;">
                                                <center>
                                                  <?php echo $cantidad_total;?>
                                              </center>
                                            </th>
                                            </tr>
                                          </tbody>
                                       </table>
                                       </div>
                               </div>

                           </div>

                       </div>

                   </div>


                   <div class="row">
                       <div class="col-md-9">
                           <div class="card card-outline card-primary">
                               <div class="card-header">
                                   <h3 class="card-title"><i class="fa fa-user-check"></i> Datos del empleado</h3>
                                   <div class="card-tools">
                                       <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                           <i class="fas fa-minus"></i>
                                       </button>
                                   </div>

                               </div>

                               <div class="card-body">
                                   <b>Empleado</b>

                                   <button type="button" class="btn btn-primary" data-toggle="modal"
                                               data-target="#modal-buscar_cliente">
                                           <i class="fa fa-search"></i>
                                           Buscar empleado
                                       </button>
                                       <!-- modal para visualizar datos de los clientes -->
                                       <div class="modal fade" id="modal-buscar_cliente">
                                           <div class="modal-dialog modal-lg">
                                               <div class="modal-content">
                                                   <div class="modal-header" style="background-color: #1d36b6;color: white">
                                                       <h4 class="modal-title">Busqueda del empleado </h4>
                                                       <div style="width: 10px;"></div>
                                                       <button type="button" class="btn btn-warning" data-toggle="modal"
                                                       data-target="#modal-agregar_cliente">
                                                       <i class="fa fa-users"></i>
                                                        Agregar Nuevo Empleado
                                                        </button>
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                           <span aria-hidden="true">&times;</span>
                                                       </button>
                                                   </div>
                                                   <div class="modal-body">
                                                       <div class="table table-responsive">
                                                           <table id="example2" class="table table-bordered table-striped table-sm">
                                                               <thead>
                                                               <tr>
                                                                   <th><center>No.</center></th>
                                                                   <th><center>Selecionar</center></th>
                                                                   <th><center>Nombre del empleado</center></th>
                                                                   <th><center>Área</center></th>
                                                               </tr>
                                                               </thead>
                                                               <tbody>
                                                               <?php
                                                               $contador_de_clientes = 0;
                                                               foreach ($clientes_datos as $clientes_dato){
                                                                   $id_cliente = $clientes_dato['id_cliente'];
                                                                   $contador_de_clientes = $contador_de_clientes + 1 ?>
                                                                   <tr>
                                                                    <td>
                                                                      <center><?php echo $contador_de_clientes;?></center>
                                                                    </td>
                                                                    <td><center>
                                                                      <button id="btn_pasar_cliente<?php echo $id_cliente;?>" class="btn btn-info">Seleccionar</button>
                                                                      <script>
                                                                        $('#btn_pasar_cliente<?php echo $id_cliente;?>').click(function () {

                                                                          var id_cliente = '<?php echo $clientes_dato['id_cliente'];?>';
                                                                          $('#id_cliente').val(id_cliente);

                                                                          var nombre_cliente = '<?php echo $clientes_dato['nombre_cliente'];?>';
                                                                          $('#nombre_cliente').val(nombre_cliente);

                                                                          var area_cliente = '<?php echo $clientes_dato['area_cliente'];?>';
                                                                          $('#area_cliente').val(area_cliente);

                                                                          $('#modal-buscar_cliente').modal('toggle');

                                                                          //alert(nombre_cliente);
                                                                        })
                                                                      </script>
                                                                    </center>
                                                                  </td>
                                                                  <td><?php echo $clientes_dato['nombre_cliente']; ?></td>
                                                                  <td><center><?php echo $clientes_dato['area_cliente']; ?></center></td>
                                                                 
                                                                   </tr>
                                                                   <?php
                                                               }
                                                               ?>
                                                               </tbody>
                                                               </tfoot>
                                                           </table>
                                                           
                                                          
                                                       </div>
                                                   </div>
                                               </div>
                                               <!-- /.modal-content -->
                                           </div>
                                           <!-- /.modal-dialog -->
                                       </div>
                                       <br><br>
                                       <div class="row">
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <input type="text" id="id_cliente" hidden>
                                            <label for="">Nombre del empleado</label>
                                            <input type="text" name="" id="nombre_cliente" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <label for="">Área</label>
                                            <input type="text" name="" id="area_cliente" class="form-control">
                                          </div>
                                        </div>
                                        
                                       </div>
                               </div>

                           </div>
                       </div>

                       <div class="col-md-3">
                           <div class="card card-outline card-primary">
                               <div class="card-header">
                                   <h3 class="card-title"><i class="fa fa-arrow-left"></i> Cantidad de Productos</h3>
                                   <div class="card-tools">
                                       <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                           <i class="fas fa-minus"></i>
                                       </button>
                                   </div>

                               </div>

                               <div class="card-body">
                                   <div class="form-group">
                                    <label for="">Cantidad Total</label>
                                    <input type="text" name="" id="total_a_cancelar" class="form-control" style="text-align: center; background-color: #fff819;" value="<?php echo $cantidad_total;?>" disabled>
                                   </div>
                                   
                                   <hr>
                                   <div class="form-group">
                                      <button id="btn_guardar_devolucion" class="btn btn-primary btn-block">Guardar</button>
                                      <div id="respuesta_registro_devolucion"></div>
                                      <script>
                                        $('#btn_guardar_devolucion').click(function () {
                                          //alert("click");
                                          var nro_devolucion = '<?php echo $contador_de_devoluciones + 1;?>';
                                          var id_cliente = $('#id_cliente').val();
                                          var total_a_cancelar = $('#total_a_cancelar').val();

                                          if (id_cliente == "") {
                                            alert("Debe de llenar los datos del cliente")
                                          }else{
                                             
                                              actualizar_stock();
                                             guardar_devolucion();
                                          }

                                          
                                          function actualizar_stock() {
                                            var i = 1;
                                          var n = '<?php echo $contador_de_carrito_devolucion;?>';
                                          //alert(n);

                                            for( i = 1; i <= n; i++){
                                              var a = '#stock_de_inventario'+i;
                                              var stock_de_inventario = $(a).val();

                                              var b = '#cantidad_carrito_devolucion'+i;
                                              var cantidad_carrito_devolucion = $(b).html();

                                              var c = '#id_producto'+i;
                                              var id_producto = $(c).val();

                                              var stock_calculado = parseFloat(parseInt(stock_de_inventario) + parseInt(cantidad_carrito_devolucion));
                                              //alert(id_producto + " - " + stock_de_inventario + " - " + cantidad_carrito_devolucion + " - "+ stock_calculado);

                                              var url2 = "../app/controllers/devoluciones/actualizar_stock.php";
                                             $.get(url2,{id_producto:id_producto,stock_calculado:stock_calculado},function (datos) {
                                             
                                             });
                                            }
                                          }

                                          function guardar_devolucion() {
                                            var url = "../app/controllers/devoluciones/registro_de_devoluciones.php";
                                             $.get(url,{nro_devolucion:nro_devolucion,id_cliente:id_cliente,total_a_cancelar:total_a_cancelar},function (datos) {
                                             $('#respuesta_registro_devolucion').html(datos);
                                             });
                                          }

                                          //alert(total_a_cancelar);
                                        })
                                      </script>
                                    </div>
                               </div>

                           </div>
                       </div>


                   </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include ('../layout/mensajes.php'); ?>
<?php include ('../layout/parte2.php'); ?>



<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
                "infoFiltered": "(Filtrado de _MAX_ total Productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Productos",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });


    $(function () {
        $("#example2").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Empleados",
                "infoEmpty": "Mostrando 0 a 0 de 0 Empleados",
                "infoFiltered": "(Filtrado de _MAX_ total Empleados)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Empleados",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

<!-- modal para visualizar el formulario para agregar empleado -->
                                       <div class="modal fade" id="modal-agregar_cliente">
                                           <div class="modal-dialog modal-sm">
                                               <div class="modal-content">
                                                   <div class="modal-header" style="background-color: #b6900c;color: white">
                                                       <h4 class="modal-title">Nuevo empleado </h4>
                                                       <div style="width: 10px;"></div>
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                           <span aria-hidden="true">&times;</span>
                                                       </button>
                                                   </div>
                                                   <div class="modal-body">
                                                       <form action="../app/controllers/clientes/guardar_clientes.php" method="post">
                                                        <div class="form-group">
                                                          <label for="">Nombre del empleado</label>
                                                          <input type="text" name="nombre_cliente" id="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                          <label for="">Área</label>
                                                          <input type="text" name="area_cliente" id="" class="form-control">
                                                        </div>
                                                        
                                                        <hr>
                                                        <div class="form-group">
                                                          <button type="submit" class="btn btn-warning btn-block">Guardar</button>
                                                        </div>
                                                       </form>
                                                   </div>
                                               </div>
                                               <!-- /.modal-content -->
                                           </div>
                                           <!-- /.modal-dialog -->
                                        </div>    