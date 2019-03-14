<?php
// Initialize the session
session_start();
require_once("dbcontroller.php");
include("database_connection.php");
include("config.php");
$db_handle = new DBController();
if ($_SESSION["loggedin"]) {
// selecciona el email del usuario 
$sql = "SELECT email FROM users WHERE username = '" .$_SESSION['username']."'";
$resultado = '';
$resultado= mysqli_query($db_handle->connectDB(), $sql);
$_SESSION['email'] =  mysqli_fetch_array($resultado);
// selecciona los pedidos   
$sql = "SELECT id_usuario FROM users WHERE username = '" .$_SESSION['username']."'";
$resultado = '';
$resultado= mysqli_query($db_handle->connectDB(), $sql);
$_SESSION['id_usuario'] =  mysqli_fetch_array($resultado);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link href="https://fonts.googleapis.com/css?family=Charmonman|Leckerli+One" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"/>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script> 
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
      <link rel="stylesheet" href="main.css">
      <title> Mi cuenta </title>
  </head>
<body>

<!--NavBar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light, nav justify-content-center">
    <ul class="nav justify-content-center">
          <li class="nav-item">
            <a  href="index.php"><img class="logo"src="logo.jpg" alt=""></a>
          </li>
          
              
          <li class="nav-item nologo">
            <a class="nav-link" href="#">Conocenos</a>
          </li>

          <li class="nav-item nologo">
            <a class="nav-link " href="#">Contacto</a>
          </li>

          <li class="nav-item nologo">
            <a class="nav-link " href="#">Novedades</a>
          </li>
            <a><i class="fas fa-shopping-bag b icono"  data-toggle="modal" data-target="#exampleModal"></i> </a>
          </li>
          </li>
          
              <a href="login.php"><i class="fas fa-user b icono"></i></a> 
          </li>
          <!-- <div class="busqueda nologo">
                      
              <div class="input-group stylish-input-group">
                  <input type="text" class="form-control"  placeholder="Search" >
                  <span class="input-group-addon">
                      <button class="btn-outline-primary btn" type="submit">
                          <span class="fas fa-search"></span>
                      </button>  
                  </span>
              </div>
          
    
          </div> -->
          <div id="container icono">
            <form role="search" method="get" id="searchform" action="">
              <label for="s">
                <i class="fas fa-search"></i>
              </label>
              <input type="text" value="" placeholder="search" class="" id="s" />
            </form>
            </div>
    </ul>
  </nav>
  <!-- Modal Cart-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg">

                <div class="modal-content">
                
    <?php
    if(isset($_SESSION["cart_item"])){
        $total_quantity = 0;
        $total_price = 0;
    ?>	

                <table class="tbl-cart" cellpadding="10" cellspacing="1">
                    <tbody>
                            <tr>
                                    <th style="text-align:left;">Nombre</th>
                                    <th style="text-align:left;">Cod.</th>
                                    <th style="text-align:right;" width="5%">Cantidad</th>
                                    <th style="text-align:right;" width="10%">Precio Unitario</th>
                                    <th style="text-align:right;" width="10%">Total</th>
                                    <th style="text-align:right;" width="5%">Talle</th>
                                    <th style="text-align:center;" width="5%">Eliminar</th>
                            </tr>	
    <?php		
    foreach ($_SESSION["cart_item"] as $item) {

        $item_price = $item["quantity"]*$item["price"];
    ?>
                            <tr>
                                    <td>
                                    <img src="<?php echo $item["image"]; ?>" class="cart-item-image" />
    <?php echo $item["name"]; ?>
                                    </td>
                                    <td>
    <?php echo $item["code"]; ?>
                                    </td>

                                    <td style="text-align:right;">
    <?php echo $item["quantity"]; ?>
                                    </td>

                                    <td  style="text-align:right;">
    <?php echo "$ ".$item["price"]; ?>
                                    </td>

                                    <td  style="text-align:right;">
    <?php echo "$ ". number_format($item_price,2); ?>
                                    </td>
                                    
                                    <td style="text-align:right;">
    <?php echo $item["talle"];   ?>
                                    </td>
                                    <td style="text-align:center;">
                                        <a href="index.php?action=remove&code=<?php echo $item["code"]; ?>"
                                           class="btnRemoveAction"
                                        >
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                
                            </tr>
    <?php
        $total_quantity += $item["quantity"];
        $total_price += ($item["price"]*$item["quantity"]);
        }
    ?>

                            <tr>
                            
                                    <td colspan="2" align="left">

                                        <button class="btn btn-danger btn-carro">

                                        <a id="btnEmpty" href="index.php?action=empty">
                                            Vaciar Carro
                                        </a> 

                                        <button class="btn btn-danger btn-carro">

                                        <a id="btnEmpty" href="checkout.php">
                                            Continuar compra
                                        </a>

                                    </td>
                                            
                                    <td colspan="2" align="right">Total:</td>
                                    <td align="right">
    <?php echo $total_quantity; ?> 
                                    </td>
                                    
                                    <td align="right" colspan="4">
                                        <strong>
    <?php echo "$ ".number_format($total_price, 2); ?>
                                        </strong>
                                    </td>
                                    
                            </tr>
                    </tbody>
                </table>		
    <?php
    } else {
    ?>

                <div class="no-records">
                    Tu carro esta vacio
                </div>
                <style> #btnEmpty{visible:false}</style>
    
    <?php 
    }
    ?>
                </div> 
        </div>
</div>
    <div class="container">
   <h2> Informacion de mi cuenta</h2><br>
     Email: <?php echo ($_SESSION["email"][0]); ?>
   <p>
        <a href="reset-password.php" class="btn btn-warning">Reestablecer contraseña</a>
        <a href="logout.php" class="btn btn-danger"> Cerrar sesion </a>
    </p>
    <div>
      <h2>Informacion de Pedidos</h2>
      <?php 
        $sql= "SELECT p.total, pp.id_producto, tp.name, pp.cantidad
        FROM `cliente` as c
        INNER JOIN pedido as p ON p.id_cliente = c.id_cliente 
        INNER JOIN productoxpedido as pp ON pp.id_pedido = p.id_pedido
        INNER JOIN tblproduct AS tp ON tp.code = pp.id_producto
        WHERE c.email like '".$_SESSION["email"][0]."'";
        $resultsd1 = mysqli_query($link, $sql); 
        while ($row = mysqli_fetch_assoc($resultsd1)){
          echo $row['total'];
          echo $row['id_producto'];
          echo $row['name'];
          echo $row['cantidad'];
        }
      ?>
      
    </div>
    </div>
    

   <!-- Footer -->
<footer class="page-footer font-small special-color-dark pt-4">

  <!-- Footer Elements -->
                    <div class="container">

                      <!-- Social buttons -->
                      <ul class="list-unstyled list-inline text-center">
                          <li class="list-inline-item">
                            <a class="btn-floating btn-fb mx-1">
                              <i class="fab fa-facebook-square"> </i>
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a class="btn-floating btn-tw mx-1">
                              <i class="fab fa-twitter"> </i>
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a class="btn-floating btn-gplus mx-1">
                              <i class="fab fa-google-plus"> </i>
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a class="btn-floating btn-li mx-1">
                              <i class="fab fa-instagram"> </i>
                            </a>
                          </li>
                      </ul>
                      

                    </div>
                    

                    <!-- Copyright -->
                    <div class="footer-copyright text-center py-3">© 2018 Copyright:
                      <a href="https://mdbootstrap.com/bootstrap-tutorial/"> MDBootstrap.com</a>
                    </div>
                    <!-- Copyright -->

</footer>
<style> footer{ position:absolute; bottom:0}</style>
</body>
</html>