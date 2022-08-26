<h1>Listar Reserva</h1>

<?php

	//$sql = "SELECT * FROM reserva";


    //tentativa de usar as 3 tabelas
    $sql_1 = 
    "SELECT * FROM livro as a
    INNER JOIN reserva as b
    ON a.id_livro = b.livro_id_livro
    INNER JOIN usuario as c
    ON b.aluno_id_aluno = c.id_usuario
    INNER JOIN atendente as d
    ON b.atendente_id_atendente = d.id_atendente";

	$res = $conn->query($sql_1) or die($conn->error);

	$qtd = $res->num_rows;

	print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";

	if($qtd > 0){
		print "<table class='table table-striped table-hover table-bordered'>";
		print "<tr>";
		print "<th>#</th>";
		print "<th>Nome do Aluno</th>";
        print "<th>Nome do Livro</th>";
        print "<th>Nome do Atendente</th>";
		print "<th>Data de Emprestimo</th>";	
		print "<th>Data de Devolução</th>";	
        print "<th>Ações</th>";	
		print "</tr>";
		while($row = $res->fetch_object()){
			print "<tr>";
			print "<td>".$row->id_reserva."</td>";
			print "<td>".$row->nome_usuario."</td>";
			print "<td>".$row->titulo_livro."</td>";
            print "<td>".$row->nome_atendente."</td>";
			print "<td>".$row->data_emprestimo."</td>";
			print "<td>".$row->data_devolucao."</td>";

			print "<td>
						<button class='btn btn-primary' onclick=\"location.href='?page=reserva-editar&id_reserva=".$row->id_reserva."';\">Editar</button>

						<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=reserva-salvar&acao=excluir&id_reserva=".$row->id_reserva."';}else{false;}\">Excluir</button>
				   </td>";	
			print "</tr>";
		}
		print "</table>";	
	}else{
		print "<div class='alert alert-danger'>Não encontrou resultados.</div>";
	}

	
?>