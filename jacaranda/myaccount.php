<?php
// Initialize the session
session_start();
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
    <title>Mi cuenta</title>
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
    <div class="container">
   <h4> Informacion de mi cuenta</h4><br>
   Mail: <?php echo htmlspecialchars($_SESSION["username"]); ?>
   <p>
        <a href="reset-password.php" class="btn btn-warning">Reestablecer contraseña</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
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