<?php
require_once("dbcontroller.php");

include("database_connection.php");

function searchData($searchVal){
    try {   
    $stmt = $dbConnection->prepare("SELECT * FROM `tblproduct` WHERE 'name' like :searchVal");
    $val = "%$searchVal%"; 
    $stmt->bindParam(':searchVal', $val , PDO::PARAM_STR);   
    $stmt->execute();
    $Count = $stmt->rowCount(); 
    //echo " Total Records Count : $Count .<br>" ;
    $result ="" ;
    if ($Count  > 0){
    while($data=$stmt->fetch(PDO::FETCH_ASSOC)) {          
    $result = $result .'<div class="search-result">'.$data['POSTTITLE'].'</div>';    
    }
    return $result ;
    }
    }
    catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    }
    } 

if(isset($_POST["busqueda"])){
 
 $searchVal = trim($_POST["busqueda"]);
 echo searchData($searchVal);
  
    }
    ?>
}

?>