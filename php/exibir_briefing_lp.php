<?php
	// Importação de scripts
	require_once 'conexao_db.php';

	// Conexão com o banco
	$conn = connect();

	// Validação da conexão, testando se a $conn é um objeto com a conexão dentro
	if (!is_object($conn)) {
		echo "Houve um problema de conexão com o banco: {$conn}";
		exit;
	}

	// SQL e bindings
	$sql = "SELECT briefings.id_briefing,
			briefings.titulo_briefing,
			briefings.descricao_briefing,
			briefings.imagem_briefing,
			briefings.cliente_briefing,
            briefings.id_usuario,
            briefings.nome_usuario
			FROM briefings WHERE cliente_briefing = 'LP'";
	$stmt = $conn->prepare($sql);

	if ($stmt->execute()) {

		// Verifica se o total de registros é maior que 0, se for, imprime as notícias através de um foreach, senão imprime uma msg
		if ($stmt->rowCount() > 0) {
            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            session_start();

			foreach ($rs as $row) {
				echo "<div class='col-sm-5 brief'>
						<header>
							<div class='title'>
								<h2>{$row['titulo_briefing']}</h2>
							</div>

						</header>
						<img style='width: 200px;' src='images/uploads/{$row['imagem_briefing']}' alt='' />
                        <p>{$row['descricao_briefing']}</p>
                        <p class='user'>Usuário: {$row['nome_usuario']}</p>
						<footer>";
						if ($_SESSION['id'] == $row['id_usuario']) {
							echo "<button onclick='excluir({$row['id_briefing']})'>Excluir</button>";
						}
						echo "</footer>
					</div>";
			}
		} else {
			echo "Não existem briefings cadastrados no banco de dados.";
		}
	} else {
		echo "Houve um problema na execução do SQL.";
	}

	// Destruir conexão com o BD
	unset($conn);