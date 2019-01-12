<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$barrio = $direccion = $email = $localidad = $telefono = $username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = trim($_POST["email"]);
    $telefono = trim($_POST["telefono"]);
    $direccion = trim($_POST["direccion"]);
    $barrio = trim($_POST["barrio"]);
    $localidad = trim($_POST["localidad"]);
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingresa un numero de usuario";
    } else{
        // Prepare a select statement
        $sql = "SELECT id_usuarios FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){ 
                /* store result */
                  mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Este usuario ya esta registrado.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Algo salio mal, intenta nuevamente";
            }
        }
         
        // Close statement
      //  mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingresa una contraseña.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "El password debe tener al menos 6 caracteres.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor confirma tu contraseña.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "La contraseña ingresada no coincide";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, email, telefono, direccion, barrio, localidad) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssisss", $param_username, $param_password, $param_email, $pram_telefono, $param_direccion, $param_barrio, $param_localidad);
            
            // Set parameters
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_email = $email;
            $param_telefono = $telefono;
            $param_direccion = $direccion;
            $param_barrio = $barrio;
            $param_localidad = $localidad;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Algo salio mal, por favor intenta nuevamente.";
            }
        }
         
        // Close statement
        //mysqli_stmt_close($link);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrate</title>
    <link href="https://fonts.googleapis.com/css?family=Charmonman|Leckerli+One" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
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

    <div class="wrapper">
        <h2>Registrate</h2>
        <p>Por favor ingresa tus datos.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Nombre de usuario*</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña*</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirma la contraseña*</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <!-- Resto de los datos a guardar por cada persona(Direccion de envio, Telefono, Mail) -->
            
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group ">
                <label>Direccion de envio</label>
                <input type="text" name="direccion" class="form-control" value="<?php echo $direccion; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group ">
                <label>Telefono</label>
                <input type="text" name="telefono" class="form-control" value="<?php echo $telefono; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Barrio</label>
                <input type="text" name="barrio" class="form-control" value="<?php echo $barrio; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Localidad</label>
                <input type="text" name="localidad" class="form-control" value="<?php echo $localidad; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Enviar">
                <input type="reset" class="btn btn-default" value="Reiniciar">
            </div>
            <p>Ya tienes una cuenta? <a href="login.php">Iniciar sesion</a>.</p>
        </form>
    </div>    
</body>
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
</html>