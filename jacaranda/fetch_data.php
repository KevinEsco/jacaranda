<?php

//fetch_data.php

include('database_connection.php');

if(isset($_POST["action"]))
{
           
        
             session_start();
             $PrendasPorPagina = $_SESSION['PrendasxPag'];
            $query = "
            SELECT * FROM tblproduct WHERE 1 
            ";
            $page_1 = $_SESSION["page_1"];
            
            // if($_SESSION["page_1"] > 1){

            //     if(isset($_POST["categoria"]))
            //     {  

            //     }    

            // }        

            if(isset($_POST["categoria"]))
            {   
                //si es distinto que el categoria anterior entonces borrar page1 sino dejarlo como esta
            
                $categoria_mostrar = implode(" , ", $_POST["categoria"]);
                $categoria_filter = implode("','", $_POST["categoria"]);
                $query .= "
                AND categoria IN('".$categoria_filter."')
                ";
                
            }
            else {
                $categoria_mostrar = "";

            }
            if(isset($_POST["talle"]))
            {
                $talle_filter = implode("> 0 AND ", $_POST["talle"]);
                $query .= "
                AND ".$talle_filter." > 0
                ";
            }
            if (isset($_SESSION["queryAnterior"])){
                
                //si eligio ver la segunda pagina o estaba en la segunda pagina y cambio los filtros
                if ($page_1 > 1) {
                    //si no eligio cambiar el filtro osea si filtro anterior es igual a filtro actual
                    if (($_SESSION["filtroAnterior"]) == ($categoria_mostrar)){
                        // mostrar los filtros que estaba usando
                        
                        $query = $_SESSION["queryAnterior"];
                        
                    }
                    //si eligio filtros nuevos resetear la pagina e ir a la primera
                    else{
                        $page_1 = 0;
                        $consultaNueva = true;
                    }
                    
                }
                // si eligio la primera pagina y NO cambio filtros usar query anterior
                if (($page_1 == 0)  && (($_SESSION["filtroAnterior"]) == ($categoria_mostrar))) {
                    $query = $_SESSION["queryAnterior"];

                }


                
                
            }
            $_SESSION["queryAnterior"] = $query;
            $_SESSION["filtroAnterior"] = $categoria_mostrar;
            $statement = $connect->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            $numPrendas = $statement->rowCount();
            $numPaginas = ceil($numPrendas / $PrendasPorPagina); 
            
            if ($numPaginas > 0) {
                
                $_SESSION["numPaginas"] = $numPaginas;
            }
            if(isset($query)){
                $query .="
                LIMIT $page_1, $PrendasPorPagina 
                ";
            }



            $statement = $connect->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            $total_row = $statement->rowCount();
            
            
            
            
            $output = '<div class="row ubicacion">

            

                <nav aria-label="breadcrumb">

                    <ol class="breadcrumb ubicacion">

                        <li class="breadcrumb-item">
                            <a href="index.html">
                                Home
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="category.html">
                                Categoria
                            </a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                                '.$categoria_mostrar.'
                        </li>

                    </ol>

                </nav>

            

</div>';
            if($total_row > 0)
            {
                    foreach($result as $row)
                                {           $selector = "";
                                            if ($row['XL'] > 0) {
                                                $XL = $row['XL'];
                                                $selector = $selector . "<option value='XL'>XL($XL)</option>";
                                               
                                            }
                                            if ($row['L'] > 0) {
                                                $L = $row['L'];
                                                $selector = $selector . "<option value='L'>L($L)</option>";
                                                
                                            }
                                            if ($row['M'] > 0) {
                                                $M = $row['M'];
                                                $selector = $selector . "<option value='M'>M($M)</option>";
                                                
                                            }
                                            if ($row['S'] > 0) {
                                                $S = $row['S'];
                                                $selector = $selector . "<option value='S'>S($S)</option>";
                                               
                                            }
                                            
                                            
                                        $output .= '
                                        

                                        <div class="col-12 col-md-6 col-lg-4">
                                                
                                            <div class="card producto">
                                                
                                                        <form method="post" action="index.php?action=add&code='. $row['code'] .'">
                                                            <img class="card-img-top" src="'. $row['image'] .'" alt="Card image cap">
                                                            <div class="card-body">
                                                            
                                                                <h4 class="card-title"><a href="product.php?product='. $row['code'] .'" title="View Product">'. $row['name'] .'</a></h4>
                                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                                                                        <div class="row">
                                                                                <div class="col">
                                                                                <p class="btn btn-danger btn-block">'. $row['price'] .'</p>
                                                                                </div>
                                                                            
                                                                                <div class="col">
                                                                                <input type="text" class="product-quantity" name="quantity" value="1" size="2" />
                                                                                <select name="talle" required>
                                                                                
                                                                                '.$selector.'

                                                                                </select>
                                                                                    
                                                                                </div>
                                                                                <div class="col">
                                                                                
                                                                                <input type="submit" value="Añadir al carro" class="btn btn-success btn-block btnAddAction"onClick="agregado()">
                                                                                <script>
                                                                                function agregado(){
                                                                                alert("Agregado al carro");
                                                                                }
                                                                                </script>
                                                                                
                                                                        
                                                                                </div>
                                                                            
                                                                    
                                                                        </div>
                                                            </div>
                                                    
                                                        </form>
                                            </div>
                                                                        
                                        </div>
                                        ';

                                }
                                }
            else
            {
            $output = '<h3>No tenemos prendas de este tipo :(</h3>';
            }
            
            echo $output;
            ?>
            
            <nav class="navbar  navbar-expand-lg, nav justify-content-center" aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                <?php
                
                if (isset($_SESSION["numPaginas"])) {
                    echo("<li class='page-item'><a class='page-link' href='#'>Ant.</a></li>");
                        for ($i = 1; $i <= $_SESSION["numPaginas"]; $i++){
                            echo("<li class='page-item'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>");
                        }
                    echo("<li class='page-item'><a class='page-link' href='#'>Sig.</a></li>");  
                }
                ?>
                    
                </ul>
            </nav>
            <?php
}

?>
