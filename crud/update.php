<?php
if( ($_POST['date_p']==null or $_POST['tname']==null) 
or ($_POST['kod']==null or $_POST['kol_vo']==null) 
or ($_POST['price']==null or $_POST['opisanie']==null))
{
echo '
<style>table{
	background: #FFEECC;
	border-collapse:collapse;
	border-left:1px solid #0000555;
	border-right:1px solid #0000555;
	border-top:1px solid #0000555;
	border-bottom:1px solid #0000555;
	color: #3334; width: 30%;
}
caption {paddind: 0 0 .5em 0;
text-align: center;
font-size: 28px;
font-family: Tahoma;
color: #337733;}
tfoot {background: #99CCFF;}
table td {font-size: 16px; font-family: Cambria;}
</style>';

echo '<br><br><br><br><br><br><br>';
echo '<table align = "center">';
echo '<caption>Сообщение:</caption>';
echo '<tr width="40%">';
echo '<td align="center">Будьте внимательны!</td>';
echo '</tr>';
echo '<tr>';
echo '<td align="center">Все поля должны быть заполнены!</td>';
echo '</tr>';
echo '<tfoot>';
echo '<td><button type = "button" onClick="history.back();"> Ok </button></td>';
echo '</tfoot>';
echo '</table>';
}
else {
	
$db_host       = 'localhost';
$db_name       = 'tovary';
$db_username   = 'skynet';
$db_password   = '';
$db_table      = 'sgeva';
$connect_to_db = mysqli_connect( $db_host, $db_username, $db_password)
				 or die ("Ошибка содинения:".mysqli_error());
mysqli_query('SET NAMES UTF8');
mysqli_select_db($db_name, $connect_to_db);
$frm_kod = mysqli_real_escape_string($_POST['kod']);
$frm_date_p = mysqli_real_escape_string($_POST['date_p']);
$frm_tname = mysqli_real_escape_string($_POST['tname']);
$frm_kol_vo= mysqli_real_escape_string($_POST['kol_vo']);
$frm_price = mysqli_real_escape_string($_POST['price']);
$frm_opisanie = mysqli_real_escape_string($_POST['opisanie']);

$ff = $_FILES['filename']["tmp_name"];

  if($_FILES['filename']['tmp_name']!="")
  {   
    $a = fopen($ff,"rb+");
    if ($a) 
       {
        $b=fread($a,filesize($ff)); //чтение картинки в файл как текст
        fclose($a);
        $b=addslashes($b);
        $sql_dop=",`photo` = '$b'";
       }
    else { echo "Ошибка чтения файла...<br/>"; $sql_dop=" "; }
  } 
  else { $sql_dop=" ";}
if ($b == ""){
	$q0 = "UPDATE flow SET TName='$frm_tname', Kod='$frm_kod', Data_p='$frm_date_p', Opisanie='$frm_opisanie', Price='$frm_price', Kol_vo='$frm_kol_vo' where id_t=".$_GET['id_t'];
	}
	else { 
	$q0 = "UPDATE flow SET TName='$frm_tname', Kod='$frm_kod', Data_p='$frm_date_p', Opisanie='$frm_opisanie', Price='$frm_price', Kol_vo='$frm_kol_vo', Photo = '$b' where id_t=".$_GET['id_t'];
	}
$res = mysqli_query($q0) or die ('Ошибка запроса...'.mysqli_error());
echo '<script type="text/javascript">
window.location.href = "prosmotr.php";
</script>';
die();
}

?>