<?php
session_start();
require_once("dbcontroller.php");
include("database_connection.php");
$db_handle = new DBController();
$categoria = "";
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
                if(!empty($_POST["quantity"])) {
                    $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
                    $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"], 'talle'=>($_POST["quantity"]."-".$_POST["talle"])));
                    //si el carro no esta vacio
                            if(!empty($_SESSION["cart_item"])) {
                                // si hay un articulo con el mismo codigo en el carro
                                if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
                                        // por cada producto distnto en el carro
                                        foreach($_SESSION["cart_item"] as $k => $v) {
                                                // si el producto a insertar es igual al producto evaluado
                                                if($productByCode[0]["code"] == $k) {
                                                    // si la cantidad es nula
                                                    if(empty($_SESSION["cart_item"][$k]["quantity"])) {

                                                        $_SESSION["cart_item"][$k]["quantity"] = 0;
                                                    }
                                                    // si hay mas de 0 items con el mismo codigo 
                                                        //agrega a la suma total del carro 
                                                    $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                                                        //agrega al talle de ese codprod el post 
                                                    $_SESSION["cart_item"][$k]["talle"] .= ','.$_POST["quantity"]."-".$_POST["talle"];
                                                }
                                        }
                                }   else {
                                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"] , $itemArray);
                                    }
                            } 
                            else {
                                $_SESSION["cart_item"] = $itemArray;
                            }
                }
    break;
	case "remove":
                if(!empty($_SESSION["cart_item"])) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($_GET["code"] == $k)
                                unset($_SESSION["cart_item"][$k]);				
                            if(empty($_SESSION["cart_item"]))
                                unset($_SESSION["cart_item"]);
                    }
                }
            break;
	case "empty":
		        unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<!DOCTYPE html>
<html lang="en">                                                                                                                          
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Titulo</title>
  <link href="https://fonts.googleapis.com/css?family=Charmonman|Leckerli+One" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

 
  <link rel="stylesheet" href="main.css">
</head>
<body>
            <!--NavBar -->
            
            <nav class="navbar  navbar-expand-lg navbar-light bg-light, nav justify-content-center">
              <ul class="nav justify-content-center">
                    <li class="nav-item">
                      <a  href="#"><img class="logo"src="logo.jpg" alt=""></a>
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
                    
                      <a ><i class="fas fa-shopping-bag b icono"data-toggle="modal" data-target="#exampleModal"></i></a> 
                    </li>
                    </li>
                    
                       <a href="login.php"><i class="fas fa-user b icono"></i></a> 
                    </li>
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


          <!--Container principal-->
  <div class="container">

                              <!--Slider-->
                              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                  <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                  </ol>
                                  <div class="carousel-inner">
                                    <div class="carousel-item active">
                                      <img class="d-block primerafoto" src="images/slide/1.jpg" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                      <img class="d-block w-100" src="images/slide/2.jpg" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                      <img class="d-block w-100" src="images/slide/3.jpg" alt="Third slide">
                                    </div>
                                  </div>
                                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                  </a>
                              </div>

  </div>
  <!--Cuadrados promociones-->
  <div class="row justify-content-around">
                          <div class="col-4 secciones remeras">
                             <H3 class="titulosSecciones">Remeras</H3> 
                          </div>
                          <div class="col-4 secciones abrigos">
                               <H3 class="titulosSecciones"> Abrigos</H3>
                          </div>

                      </div>
                        <div class="row justify-content-around ">
                          <div class="col-4 secciones vestidos">
                            <H3 class="titulosSecciones">Vestidos</H3>
                          </div>
                          <div class="col-4 secciones pantalones">
                           <H3 class="titulosSecciones">Pantalones</H3>
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
    <!-- Footer -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</body>
</html>
