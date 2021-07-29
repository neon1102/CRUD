<!DOCTYPE HTML>

<meta charset="utf-8">
<script class="jsbin"
       src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin"
   src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

<?php
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
 include_once "database.php";

//var_dump($_POST);
 $product_name = $_POST['product_name'];
 $date = $_POST['date'];
 $code = $_POST['code'];
 $description = $_POST['description'];
 $price = $_POST['price'];
 $quantity = $_POST['quantity'];

 if(isset($product_name, $code, $date, $description, $price, $quantity) && 
    ($product_name&&$code&&$date&&$description&&$price&&$quantity) != ""){
      /*
        $product_name = mysqli_real_escape_string($mysqli, $product_name);
        $date = mysqli_real_escape_string($mysqli, $date);
        $code = mysqli_real_escape_string($mysqli, $code);
        $description = mysqli_real_escape_string($mysqli, $description);
        $price = mysqli_real_escape_string($mysqli, $price);
        $quantity = mysqli_real_escape_string($mysqli, $quantity);
      */
        $ff = $_FILES['filename']["tmp_name"];

        if($_FILES['filename']['tmp_name']!=""){   
          $a = fopen($ff,"rb+");
          if ($a){
              $b=fread($a,filesize($ff)); //чтение картинки в файл как текст
              fclose($a);
              $b=addslashes($b);
              $query = "INSERT INTO product(Tname, Kod, Date_p, Opisanie, Price, Kol_vo, photo)
              VALUES('$product_name',
                     '$code',
                     '$date',
                     '$description',
                     '$price',
                     '$quantity',
                     '$b')";
              
          }else{
            echo "Ошибка чтения файла...<br/>"; $sql_dop=" ";
        } 
      }else{
        echo $query = "INSERT INTO product(Tname, Kod, Date_p, Opisanie, Price, Kol_vo)
        VALUES('$product_name',
               '$code',
               '$date',
               '$description',
               '$price',
               '$quantity')";

      }

        $result = $mysqli->query($query);
        
        if(!$result){
            echo "Запрос не удался<br>";
          //  echo $query."<br>";
            echo $mysqli->errno."<br>";
            echo $mysqli->error."<br>";
        }
        
 }

?>

<div class="form-group col-md-offset-3 col-md-6">
<form method="post" class="border border-light p-5" enctype="multipart/form-data">
  <div>
    <label for="product_name">Имя товара</label>
    <input type="text" id="product_name" name="product_name" class="form-control mb-4">
  </div>
  <div>
    <label for="code">Код товара</label>
    <input type="number" id="code" name="code" class="form-control mb-4"> 
  </div>
  <div>
    <label for="date">Дата (ГГГГ-ММ-ДД)</label>
    <input type="text" id="date" name="date" class="form-control mb-4">
  </div>
  <div>
    <label for="description">Описание</label>
    <textarea type="text" id="description" name="description" class="form-control mb-4">
    </textarea>
  </div>
  <div>
    <label for="price">Цена</label>
    <input type="number" id="price" name="price" class="form-control mb-4">
  </div>
  <div>  
    <label for="quantity">Количество</label>
    <input type="number" id="quantity" name="quantity" class="form-control mb-4">
  </div>  
  <div>
    <input type='file' name='filename' 
        id='inp' class="form-control-file" onchange="readURL(this);" />
	  <img id="halo" src="#" width=1 />    
  </div>

  <div>
    <input type='submit' class="btn btn-primary mb-4">    
  </div>

  <a href="index.php" class="btn btn-info">Назад</a>
</form>
</div>

<script>

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#halo')
        .attr('src', e.target.result)
        .width(200);
    };
    reader.readAsDataURL(input.files[0]);
  };
};   

var but=document.querySelector("#but");
var inp=document.querySelector("#inp");

but.onclick=function(){
	inp.value="";
	$('#halo').attr('src', '');
	$('#halo').removeAttr('src');
} 
</script>