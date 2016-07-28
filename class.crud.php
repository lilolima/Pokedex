<?php

class crud
{
	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
	
	/* add pokemon */
	public function create($nome_p,$descricao_p,$tipo_p,$altura_p,$peso_p,$habili_p,$fraqueza_p,$img_p)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO pokemon(nome,descricao,tipo,altura,peso,habilidades,fraquezas,imagem) VALUES(:nome_p, :descricao_p, :tipo_p, :altura_p, :peso_p, :habili_p, :fraqueza_p, :img_p)");
			$stmt->bindparam(":nome_p",$nome_p);
			$stmt->bindparam(":descricao_p",$descricao_p);
			$stmt->bindparam(":tipo_p",$tipo_p);
			$stmt->bindparam(":altura_p",$altura_p);
			$stmt->bindparam(":peso_p",$peso_p);
			$stmt->bindparam(":habili_p",$habili_p);
			$stmt->bindparam(":fraqueza_p",$fraqueza_p);
			$stmt->bindparam(":img_p",$img_p);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}
	
	public function getID($id)
	{
		$stmt = $this->db->prepare("SELECT * FROM pokemon WHERE id=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}
	

	public function dataview($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                <td><?php print($row['id']); ?></td>
                <td><?php print($row['nome']); ?></td>
                <td><?php print($row['descricao']); ?></td>
				<td><?php print($row['tipo']); ?></td>
				<td><?php print($row['peso']); ?></td>
				<td><?php print($row['altura']); ?></td>
				<td><?php print($row['habilidades']); ?></td>
				<td><?php print($row['fraquezas']); ?></td>
				<td><?php echo "<img src='fotos/".$row['imagem']."' alt='Foto de exibição' />" ?> </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nada aqui...</td>
            </tr>
            <?php
		}
		
	}
	
	/* paginação */
	public function paging($query,$records_per_page)
	{
		$starting_position=0;
		if(isset($_GET["page_no"]))
		{
			$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$query2=$query." limit $starting_position,$records_per_page";
		return $query2;
	}
	
	public function paginglink($query,$records_per_page)
	{
		
		$self = $_SERVER['PHP_SELF'];
		
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		$total_no_of_records = $stmt->rowCount();
		
		if($total_no_of_records > 0)
		{
			?><ul class="pagination"><?php
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;
			if(isset($_GET["page_no"]))
			{
				$current_page=$_GET["page_no"];
			}
			if($current_page!=1)
			{
				$previous =$current_page-1;
				echo "<li><a href='".$self."?page_no=1'>Primeiro</a></li>";
				echo "<li><a href='".$self."?page_no=".$previous."'>Próximo</a></li>";
			}
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
				if($i==$current_page)
				{
					echo "<li><a href='".$self."?page_no=".$i."' style='color:red;'>".$i."</a></li>";
				}
				else
				{
					echo "<li><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
				}
			}
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				echo "<li><a href='".$self."?page_no=".$next."'>Próximo</a></li>";
				echo "<li><a href='".$self."?page_no=".$total_no_of_pages."'>Último</a></li>";
			}
			?></ul><?php
		}
	}
	
	
	
}
