<?php

include_once "database.php";

$id = $_GET['id'];

if(isset($id) && $id != ""){
    $query = "SELECT * FROM product WHERE id=".$id;

    $result = $mysqli->query($query);

    if(!$result){
        header("Location: view1.php");
    }
    if(!mysqli_num_rows($result)){
        header("Location: view1.php");
    }

    $query = "DELETE FROM product WHERE id=".$id;
    $mysqli->query($query);
    header("Location: view1.php");

}else{
    header("Location: view1.php");
}

?>