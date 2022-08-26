<h1>Cadastrar Reserva</h1>

<form action="?page=reserva-salvar" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	<div class="mb-3">
                        <!-- Escolha do usuario  -->
		<label>Usuário</label>
		<select name="aluno_id_aluno" class="form-control">
			<option>-Escolha um Usuário-</option>
		<?php
			$sql_1 = "SELECT * FROM usuario";

			$res = $conn->query($sql_1) or die($conn->error);

			if($res->num_rows > 0){
				while($row = $res->fetch_object()){
					print "<option value='".$row->id_usuario."'>";
					print $row->nome_usuario."</option>";
				}
			}else{
				print "Não há usuários cadastrados";
			}
		?>
		</select>

                        <!-- Escolha do livro  -->
        <label>Livro</label>
		<select name="livro_id_livro" class="form-control">
			<option>-Escolha um Livro-</option>
		<?php
			$sql = "SELECT * FROM livro";

			$res = $conn->query($sql) or die($conn->error);

			if($res->num_rows > 0){
				while($row = $res->fetch_object()){
					print "<option value='".$row->id_livro."'>";
					print $row->titulo_livro."</option>";
				}
			}else{
				print "Não há livros cadastrados";
			}
		?>
		</select>

                        <!-- Escolha do atendente  -->
        <label>Atendente</label>
		<select name="atendente_id_atendente" class="form-control">
			<option>-Escolha um Atendente-</option>
		<?php
			$sql = "SELECT * FROM atendente";

			$res = $conn->query($sql) or die($conn->error);

			if($res->num_rows > 0){
				while($row = $res->fetch_object()){
					print "<option value='".$row->id_atendente."'>";
					print $row->nome_atendente."</option>";
				}
			}else{
				print "Não há atendentes cadastrados";
			}
		?>
		</select>
	</div>
                            <!-- Data do Emprestimo  -->
	<div class="mb-3">
		<label>Data de Emprestimo</label>
		<input type="date" name="data_emprestimo" class="form-control">
	</div>
                            <!-- Data da Devolução  -->
    <div class="mb-3">
		<label>Data de Devolução</label>
		<input type="date" name="data_devolucao" class="form-control">
	</div>
	<div class="mb-3">
		<button type="submit" class="btn btn-success">Enviar</button>
	</div>
</form>