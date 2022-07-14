<?php
	// Importação de scripts
	require_once 'conexao_db.php';
	
	// Validação dos dados
	$usuario = isset($_POST['txt_usuario']) ? $_POST['txt_usuario'] : '';
	$senha = isset($_POST['txt_senha']) ? $_POST['txt_senha'] : '';

	if (empty($usuario) || empty($senha)) {
		echo json_encode(array('login' => FALSE, 'tipo' => 1));
		exit;
	}
    
    
	// Conexão com o banco
	$conn = connect();

	// Validação da conexão, testando se a $conn é um objeto com a conexão dentro
	if (!is_object($conn)) {
		echo json_encode(array('login' => FALSE, 'tipo' => 2, 'msg' => $conn));
		exit;
	}

	// SQL e bindings
	$sql = "SELECT * FROM usuarios WHERE usuario_usuario=:usuario AND senha_usuario=:senha";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':usuario', $usuario);
	$stmt->bindParam(':senha', md5($senha));
	$stmt->execute();

	if ($stmt->rowCount() == 1) {
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		session_start();
		$_SESSION['logged'] = TRUE;
		$_SESSION['id'] = $row['id_usuarios'];
		$_SESSION['nome'] = $row['nome_usuario'];
		

		echo json_encode(array('login' => TRUE));
	} else {
		echo json_encode(array('login' => FALSE, 'tipo' => 3, 'msg' => 'Houve um problema na execução do SQL.'));
	}

	// Destruir conexão com o BD
	unset($conn);