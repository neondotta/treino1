<?php
	require 'conexao.php';

if(isset($_POST['titulo'])){
	$titulo = $_POST['titulo'];
	$fonte 	= $_POST['fonte'];
	$data 	= $_POST['data'];
	$autor 	= $_POST['cbAutor'];
	$conteudo 	= $_POST['conteudo'];

if( ($titulo == "") || ($fonte == "") || ($data == "") || ($autor == "") || ($conteudo == "")){
	echo "Preencha os campos corretamente";
	exit;
}else{
	$sql = "UPDATE news 
			SET		titulo	= '".$titulo."',
					fonte	= '".$fonte."',
					data 	= '".$data."',
					autor	= '".$autor."',
					conteudo= '".$conteudo."'
			WHERE 	idNews	= ".$_GET["id"];
	$query = mysql_query($sql);
	if(mysql_affected_rows($conn) > 0){
		echo "<script>alert('Atualizado com sucesso!');</script>";
		echo "<script>window.location = 'index.php';</script>";
	}else{
		echo "<script>alert('Erro ao atualizar!');</script>";
		echo "<script>window.location = 'listar.php';</script>";
	}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
		<?php
			if(isset($_GET["id"])){
				if(is_numeric($_GET["id"])){
					$sql = "SELECT * FROM news WHERE idNews = ".$_GET['id'];
					$query = mysql_query($sql, $conn);
					$result = mysql_fetch_array($query);

		?>

	<form action="editar.php?id=<?php echo $_GET['id']?>" method="POST" name="form_cadastro">
		<label for="titulo">TITULO:</label>
		<input type="text" name="titulo" id="titulo" value="<?php echo $result['titulo'];?>" />	<br /><br />
		<label for="fonte">FONTE</label>
		<input type="text" name="fonte" id="fonte" value="<?php echo $result['fonte'];?>" />	<br /><br />
		<label for="data">DATA</label>
		<input type="text" name="data" id="data" value="<?php echo $result['data'];?>" />		<br /><br />
		<label for="cbAutor">AUTOR</label>
		<select name="cbAutor" id="cbAutor">
		<?php
			$sql = "SELECT * FROM autor";
			$query = mysql_query($sql, $conn);
			while($exibir = mysql_fetch_array($query)){
		?>
			<option value="<?php echo $exibir["idAutor"];?>"<?php $result["autor"] == $exibir["idAutor"]? "selected='selected": "" ?>><?php echo $exibir["nome"];?></option>
		<?php
			}
		?>
		</select>	
		<br /><br />
		<label for="conteudo">CONTEUDO</label>
		<textarea name="conteudo" id="conteudo">
			 <?php echo $result['conteudo'];?>
		</textarea>
		<br /><br />
		<input type="submit" name="Cadastrar" value="Cadastrar" />
		<br /><br />
		<a href="listar.php">Listagem</a>

	</form>
	<?php
		}
	}
	?>

</body>
</html>