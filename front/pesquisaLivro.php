<?php
	include '../back/classes/CrudLivro.php';
?>
<!DOCTYPE html>
<html lang="pt/br" dir="ltr">
  <head>
    <link rel="stylesheet" href="style/estilo.css">
    <meta charset="utf-8">
    <title>pesquisaLivro</title>
	
  </head>
  <body>
    <section>
		<form method="post">
			<input type="text" name="pesquisa" id="">
			<button>Pesquisar</button>
		</form>
      	<?php
			if (isset($_POST['pesquisa'])){
				$l = new CrudLivro;
				$livros = $l->buscarNomeLivro($_POST['pesquisa']);
				echo '<table>
						<tr>
							<th>Livro</th>
							<th>Autor</th>
							<th>Editora</th>
							<th>Exemplares</th>
							<th colspan="2">AÇÃO</th>
						</tr>';
				
				foreach($livros as $key => $value){
					echo "<tr>";
					foreach($value as $key => $value2){
						if ($key != "id_livro")
						echo "<td>$value2</td>";
					}
					echo "<td><a href='#'>[Excluir]</a></td>
						  <td><a href='#'>[Editar]</a></td>
						  </tr>";
				}
				echo "</table>";
			}
		?>
    </section>
  </body>
</html>
