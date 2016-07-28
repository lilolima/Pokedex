<?php
include_once 'dbconfig.php';
if(isset($_POST['btn-save']))
{
	$nome_p = $_POST['nome'];
	$descricao_p = $_POST['descricao'];
	$tipo_p = $_POST['tipo'];
	$altura_p = $_POST['altura'];
	$peso_p = $_POST['peso'];
	$habili_p = $_POST['habilidades'];
	$fraqueza_p = $_POST['fraquezas'];
	$img_p = $_FILES['imagem'];
	
	if ($img_p != NULL) {
		
		// Largura máxima em pixels
		$largura = 96;
		// Altura máxima em pixels
		$altura = 96;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 1000;
	  
		$dimensoes = getimagesize($img_p["tmp_name"]);
		
		// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $img_p["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "fotos/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($img_p["tmp_name"], $caminho_imagem);
	  
	if($crud->create($nome_p,$descricao_p,$tipo_p,$altura_p,$peso_p,$habili_p,$fraqueza_p,$nome_imagem))
	{
		header("Location: add-data.php?inserted");
	}
	else
	{
		header("Location: add-data.php?failure");
	}
	}
}
?>
<?php include_once 'header.php'; ?>
<div class="clearfix"></div>

<?php
if(isset($_GET['inserted']))
{
	?>
    <div class="container">
	<div class="alert alert-info">
    <strong>WOW!</strong> Pokemon inserido com sucesso <a href="index.php">HOME</a>
	</div>
	</div>
    <?php
}
else if(isset($_GET['failure']))
{
	?>
    <div class="container">
	<div class="alert alert-warning">
    <strong>Desculpe</strong> Aconteceu um erro ao cadastrar ):
	</div>
	</div>
    <?php
}
?>

<div class="clearfix"></div><br />

<div class="container">

 	
	 <form method='post'enctype="multipart/form-data">
 
    <table class='table table-bordered'>
 
        <tr>
            <td>Nome</td>
            <td><input type='text' name='nome' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>Descrição</td>
            <td><textarea class="form-control" name='descricao' rows="3" required></textarea></td>
        </tr>
 
		<tr>
			<td>Tipo</td>
			<td>   
				<select class="form-control" name='tipo'>
				<option>Água</option>
				<option>Terra</option>
				<option>Fogo</option>
				<option>Pedra</option>
				<option>Normal</option>
				<option>Grama</option>
				<option>Elétrico</option>
				</select>
			</td>
		</tr>
		
        <tr>
			<td>Peso</td>
			<td><input type='text' name='peso' class='form-control' required></td>
		</tr>
		
		<tr>
			<td>Altura</td>
            <td><input type='text' name='altura' class='form-control' required></td>
			</td>
        </tr>

		<tr>
            <td>Habilidades</td>
            <td><input type='text' name='habilidades' class='form-control' required></td>
        </tr>
		<tr>
            <td>Fraquezas</td>
            <td><input type='text' name='fraquezas' class='form-control' required></td>
        </tr>
		<tr>
            <td>Imagem</td>
            <td><input type="file" name="imagem" class='form-control' required></td>
        </tr>
 
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-save">
    		<span class="glyphicon glyphicon-plus"></span> Salvar Pokemon
			</button>  
            <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Voltar para Home</a>
            </td>
        </tr>
 
    </table>
</form>
     
     
</div>

