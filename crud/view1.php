<?php
include_once "database.php";

$query = "SELECT * FROM product";

$result = $mysqli->query($query);
?>

<div class="table-responsive">
	<table class="table table-striped table-bordered" cellspacing="0" width=100%>
		<thead>
		<tr>
		  <th scope="col">№</th>
		  <th scope="col">Товар</th>
		  <th scope="col">Код</th>
		  <th scope="col">Дата</th>
		  <th scope="col">Описание</th>
		  <th scope="col" class="th-sm">Цена</th>
		  <th scope="col">Кол-во</th>
		  <th scope="col">Картинка</th>
		  <th scope="col">Изменить</th>
		  <th scope="col">Удалить</th>
		</tr>
		</thead>
		<tbody>
			<?php while($row = $result->fetch_assoc()): ?>
			<tr>
				<th scope="row"><?= $id = $row['id']; ?></th>
				<td><?=$row['Tname']; ?></td>
				<td><?=$row['Kod']; ?></td>
				<td><?=$row['Date_p']; ?></td>
				<td><?=$row['Opisanie']; ?></td>
				<td><?=$row['Price']; ?></td>
				<td><?=$row['Kol_vo']; ?></td>
				<td><?php 
				echo '<img alt="embedded image" id="blah" src="data:image/png;base64,'.
				chunk_split(base64_encode($row["photo"])) .
				 ' "  width = "200">';
				?></td>
				<td><a href=<?="edit.php?id=$id" ?> >Изменить</a></td>
				<td><a href=<?="delete.php?id=$id" ?> >Удалить</a></td>
			</tr>
			<?php endwhile ?>
		</tbody>
	</table>

	<a href="index.php" class=" btn btn-primary">Назад</a>
</div>