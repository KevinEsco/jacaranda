<?php

//fetch_data.php

include('database_connection.php');

if(isset($_POST["action"]))
{
            $query = "
            SELECT * FROM tblproduct WHERE 1
            ";
            if(isset($_POST["categoria"]))
            {
                $categoria_filter = implode("','", $_POST["categoria"]);
                $query .= "
                AND categoria IN('".$categoria_filter."')
                ";
                
            }
            if(isset($_POST["talle"]))
            {
                $talle_filter = implode("> 0 AND ", $_POST["talle"]);
                $query .= "
                AND ".$talle_filter." > 0
                ";
            }


            $statement = $connect->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            $total_row = $statement->rowCount();
            $output = '<div class="row ubicacion">

            <div class="col">

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
                                '.$categoria.'
                        </li>

                    </ol>

                </nav>

            </div>

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
                                                
                                            <div class="card">
                                                
                                                        <form method="post" action="index.php?action=add&code='. $row['code'] .'">
                                                            <img class="card-img-top" src="'. $row['image'] .'" alt="Card image cap">
                                                            <div class="card-body">
                                                            
                                                                <h4 class="card-title"><a href="product.html" title="View Product">'. $row['name'] .'</a></h4>
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
            $output = '<h3>No Data Found</h3>';
            }
            echo $output;
}

?>
