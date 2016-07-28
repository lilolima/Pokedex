<?php
include_once 'dbconfig.php';
?>
<?php include_once 'header.php'; ?>

<div class="clearfix"></div>

<div class="container">
<a href="add-data.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Novo Pokemon</a>
</div>

<div class="clearfix"></div><br />

<div class="container">

	  <table class='table table-bordered table-responsive'>
     <tr>
     <th>#</th>
     <th>Nome</th>
     <th>Descrição</th>
	 <th>Tipo</th>
	 <th>Peso</th>
	 <th>Altura</th>
	 <th>Habilidades</th>
     <th>Fraquezas</th>
	 <th>Imagem</th>
     </tr>
     <?php
		$query = "SELECT * FROM pokemon";       
		$records_per_page=3;
		$newquery = $crud->paging($query,$records_per_page);
		$crud->dataview($newquery);
	 ?>
    <tr>
        <td colspan="9" align="center">
 			<div class="pagination-wrap">
            <?php $crud->paginglink($query,$records_per_page); ?>
        	</div>
        </td>
    </tr>
 
</table>
   
       
</div>

