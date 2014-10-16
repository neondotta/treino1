<?php
	require 'conexao.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<ul>	
	<?php
		$sql = "SELECT * FROM news";
		$query = mysql_query($sql, $conn);
		while($result = mysql_fetch_array($query)){		
	?>
		<li><?php echo $result['data'];?> - <?php echo $result['titulo'];?>
			<a href="editar.php?id=<?php echo $result['idNews']?>"> Editar </a>
		</li>
	<?php
		}
	?>
	</ul>



</body>
</html>