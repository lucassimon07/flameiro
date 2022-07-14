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
	$sql = "SELECT * FROM compromissos";
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
								<h2>{$row['data_compromisso']} - {$row['hora_compromisso']}</h2>
							</div>

						</header>
                        <p class='titulo'>{$row['titulo_compromisso']}</p>
                        <p class='descricao'>{$row['descricao_compromisso']}</p>
                        <p class='participantes'>{$row['participantes_compromisso']}</p>
                        <p class='local'>{$row['local_compromisso']}</p>
                        <p class='user'>Dono do compromisso: {$row['nome_usuario']}</p>
						<footer>";
						if ($_SESSION['id'] == $row['id_usuario']) {
							echo "<button onclick='excluir({$row['id_compromisso']})'>Concluído</button>";
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