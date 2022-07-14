<?php
	// Importação de scripts
	require_once 'conexao_db.php';

	// Validação dos dados
	$usuario = isset($_POST['txt_usuario']) ? $_POST['txt_usuario'] : '';
	$nome = isset($_POST['txt_nome']) ? $_POST['txt_nome'] : '';
    $senha = isset($_POST['txt_senha']) ? $_POST['txt_senha'] : '';
    $senha1 = isset($_POST['txt_senha2']) ? $_POST['txt_senha2'] : '';

	if (empty($usuario) || empty($nome) || empty($senha) || empty($senha1)) {
		echo json_encode(array('erro' => TRUE, 'tipo' => 1));
		exit;
	}
	
	$senhafinal = md5($senha);


	// Conexão com o banco
	$conn = connect();

	// Validação da conexão, testando se a $conn é um objeto com a conexão dentro
	if (!is_object($conn)) {
		echo json_encode(array('erro' => TRUE, 'tipo' => 2, 'msg' => $conn));
		exit;
	}

	// SQL e bindings
	$sql = "INSERT INTO usuarios (nome_usuario, senha_usuario, usuario_usuario) VALUES (:nome, :senha, :usuario)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':nome', $nome);
	$stmt->bindParam(':usuario', $usuario);
	$stmt->bindParam(':senha', $senhafinal);

	if ($stmt->execute()){
		echo json_encode(array('erro' => FALSE));
	} else {
		echo json_encode(array('erro' => TRUE, 'tipo' => 3, 'msg' => 'Houve um problema na execução do SQL.'));
	}

	// Destruir conexão com o BD
	unset($conn);