<?php
        session_start();
        // Include config file
        include "config.php";
        
        // Define variables and initialize with empty values
        $barrio = $direccion = $email = $localidad = $provincia = $telefono="" ;

        
        // Processing form data when form is submitted
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $email = trim($_POST["email"]);
            $telefono = trim($_POST["telefono"]);
            $direccion = trim($_POST["direccion"]);
            $barrio = trim($_POST["barrio"]);
            $localidad = trim($_POST["localidad"]);
            $provincia = trim($_POST["provincia"]);
            // Check input errors before inserting in database
                //if(!isset($email_err)){
                    
                    // Prepare an insert statement
                    $sql = "INSERT INTO cliente (email, telefono, direccion, barrio, localidad, provincia) VALUES ('$email', '$telefono', '$direccion', '$barrio', '$localidad', '$provincia')";
                    
                       
                      $resultado =mysqli_query($link, $sql);
                      // Busca el id_cliente que identifica a esta compra
                      $sql= " ";
                      $result = 0;
                      $resultado = mysqli_query($link, $sql);
                      $fila = $resultado->fetch_array(MYSQLI_ASSOC);
                        $_SESSION['sessCustomerID'] = $fila['max'];
                        
                        // Crea el pedido para esta compra
                        $sql = "INSERT INTO pedido (id_usuario, total, creado, modificado) VALUES ('".$_SESSION["sessCustomerID"]."', '".$_SESSION["totalprice"]."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";
                        $insertOrder = mysqli_query($link, $sql);
                        //descuenta los items del stock
                        foreach ($_SESSION["cart_item"] as $item){
                        // if .$item["talle"] es distinto de L XL M S entonces separar el string en 2 por la coma y hacer un update con la variable del primero y otro update
                        $talle = $item["talle"];
                        if ($talle <> ("L" && "XL" && "M" && "S")) {
                           $talles = explode (",",$talle);

                           foreach ($talles as $value){
                                $sql = "UPDATE tblproduct SET ".$value." = ".$value."-".$item["quantity"]." WHERE code = '".$item["code"]."'";
                                mysqli_query($link, $sql);
                           }

                        }
                        else {
                        $sql = "UPDATE tblproduct SET ".$item["talle"]." = ".$item["talle"]."-".$item["quantity"]." WHERE code = '".$item["code"]."'";
                        mysqli_query($link, $sql);
                        }
                        }
                        session_destroy();
                        header ("Location: index.php");
                    // header("Location: OrdenExito.php?id=$orderID");} else{
                       
                      //mysqli_close($link);
                // Close connection
                //mysqli_close($link);
               // echo "salio todo mal bro";
                }
    //}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Charmonman|Leckerli+One" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    
</head>
<body>
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
                              
                                 <a  ><i onclick="myFunction()" class="fas fa-shopping-bag b icono"></i> </a>
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
  <div class="row">
    <div class="col">
      
    
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
                        <th style="text-align:right;" width="7%">Total</th>
                        <th style="text-align:right;" width="8%">Talle</th>
                        </tr>	
                        <?php		
                            foreach ($_SESSION["cart_item"] as $item){
                                $item_price = $item["quantity"]*$item["price"];
                                ?>
                                        <tr>
                                        <td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
                                        <td><?php echo $item["code"]; ?></td>
                                        <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                                        <td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
                                        <td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
                                        <td style="text-align:right;"><?php echo $item["talle"]; ?></td>
                                        </tr>
                                        <?php
                                        
                                        $total_quantity += $item["quantity"];
                                        $total_price += ($item["price"]*$item["quantity"]);
                                        
                                }
                                $_SESSION["totalprice"] = $total_price;
                                ?>
                        
                        <tr>
                                
                        <td colspan="2" align="right">Total:</td>
                        <td align="right"><?php echo $total_quantity; ?> </td>
                        <td align="right" colspan="4"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
                        <td></td>
                        </tr>
                        </tbody>
                        </table>		
                        <?php
                        } else {
                        ?>
                        <div class="no-records">Tu carro esta vacio</div>
                        
                        <?php 
                        }
        ?>   
</div>
    <div class="col">
      
    <div class="wrapper">
        <h1></h1>
        <h2>Datos del Envio</h2>
        <p>Por favor ingresa tus datos.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!-- Resto de los datos a guardar por cada persona(Direccion de envio, Telefono, Mail) -->
            
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"></span>
            </div>
            <div class="form-group ">
                <label>Direccion de envio</label>
                <input type="text" name="direccion" class="form-control" value="<?php echo $direccion; ?>">
                <span class="help-block"></span>
            </div>
            <div class="form-group ">
                <label>Telefono</label>
                <input type="text" name="telefono" class="form-control" value="<?php echo $telefono; ?>">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Barrio</label>
                <input type="text" name="barrio" class="form-control" value="<?php echo $barrio; ?>">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Localidad</label>
                <input type="text" name="localidad" class="form-control" value="<?php echo $localidad; ?>">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Provincia</label>
                <input type="text" name="provincia" class="form-control" value="<?php echo $provincia; ?>">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Confirmar datos"> <!-- Generar una nueva compra con los datos que tengo en el carrito y asociarla con el  -->
                <input type="reset" class="btn btn-default" value="Cancelar">
            </div>
            <p>Ya tienes una cuenta? <a href="login.php">Iniciar sesion</a>.</p>
        </form>
    </div>  
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


<style> footer{  bottom:0}</style>
</body>
</html>