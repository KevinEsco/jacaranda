<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: myaccount.php");

    exit;
}
 
// Include config file
include "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingresa tu nombre de usuario.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingresa tu contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id_usuario, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                           
                            // Redirect user to welcome page
                             
                            
                             
                             header("location: index.php");
                             echo "<script type='text/javascript'>alert('$username');</script>";
                        } else{ 
                            // Display an error message if password is not valid
                            $password_err = "El password ingresado no es valido.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No se encontro ninguna cuenta con este nombre de usuario";
                }
            } else{
                echo "Oops! Algo salio mal. Intenta de nuevo mas tarde";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    
    <link href="https://fonts.googleapis.com/css?family=Charmonman|Leckerli+One" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <!--NavBar -->
    <nav class="navbar  navbar-expand-lg navbar-light bg-light, nav justify-content-center">
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
                              
                                 <a  ><i class="fas fa-shopping-bag b icono" data-toggle="modal" data-target="#exampleModal"></i> </a>
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
  <th style="text-align:center;" width="5%">Eliminar</th>
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
                  <td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><i class="fas fa-trash"></i></a></td>
                  </tr>
                  <?php
                  $total_quantity += $item["quantity"];
                  $total_price += ($item["price"]*$item["quantity"]);
          }
          ?>

  <tr>
  
  <td colspan="2" align="left"><button class="btn btn-danger btn-carro"><a id="btnEmpty" href="index.php?action=empty">Vaciar Carro</a> <button class="btn btn-danger btn-carro"><a id="btnEmpty" href="checkout.php">Continuar compra</a></td>
          
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
  <style> #btnEmpty{visible:false}</style>
  <?php 
  }
  ?>
</div>
</div>
</div>
    <div class="wrapper">
        <h2>Ingresar</h2>
        <p>Por favor ingresa tu nombre de usuario y contraseña </p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <h3>Usuario</h3>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <h3>Contraseña</h3>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ingresar">
            </div>
            <p>Aun no tienes una cuenta? <a href="register.php"> Registrarse</a>.</p>
        </form>
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
</body>
<style> footer{bottom:0}</style>
</html>