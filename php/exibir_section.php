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
	$sql = "SELECT * FROM section";
	$stmt = $conn->prepare($sql);

	if ($stmt->execute()) {

		// Verifica se o total de registros é maior que 0, se for, imprime as notícias através de um foreach, senão imprime uma msg
		if ($stmt->rowCount() > 0) {
            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            session_start();
            
			foreach ($rs as $row) {
                $id = $row['id_section'];
				echo "<div class='col-sm-3 brief'>
						<header>
							<div class='title'>
								<h2>{$row['nome_section']}</h2>
							</div>

						</header>
						<img style='width: 200px;' src='images/uploads/{$row['imagem_section']}' alt='' />
						<p>{$row['descricao_section']}</p>
						<p>Cliente: {$row['cliente_section']}</p>
						<p>Categoria: {$row['categoria_section']}</p>
                        <p class='user'>Usuário: {$row['nome_usuario']}</p>
						<footer>";
							if ($_SESSION['id'] == $row['id_usuario']){
                                echo "<button onclick='excluir({$id})'>Excluir</button>";
                            }
						echo "</footer>
					</div>";
			}
		} else {
			echo "Não existem ideias cadastradas no banco de dados.";
		}
	} else {
		echo "Houve um problema na execução do SQL.";
	}

	// Destruir conexão com o BD
	unset($conn);