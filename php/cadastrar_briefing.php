<?php
	// Definição do fuso horário
	date_default_timezone_set('America/Sao_Paulo');

	// Importação de scripts
	require_once 'conexao_db.php';
	require_once 'upload_img.php';

	// Validação dos dados
    $titulo = isset($_POST['txt_titulo']) ? $_POST['txt_titulo'] : '';
    $cliente = isset($_POST['select_cliente']) ? $_POST['select_cliente'] : '';
	$descricao = isset($_POST['txt_desc']) ? $_POST['txt_desc'] : '';
	$id_usuario = isset($_POST['txt_id_usuario']) ? $_POST['txt_id_usuario'] : '';
	$nome_usuario = isset($_POST['txt_nome_usuario']) ? $_POST['txt_nome_usuario'] : '';

	//if (empty($titulo) || empty($descricao) || empty($categoria) || empty($cliente)) {
	//	echo json_encode(array('erro' => TRUE, 'tipo' => 1));
	//	exit;
	//}

	// Validação do envio da imagem
	if ($_FILES['file_img']['size'] > 0) {
		$enviarImagem = enviarImagem($_FILES['file_img'], 5, '../images/uploads');

		// Se o status retornado for 1, então a imagem foi enviada com sucesso
		if ($enviarImagem['status'] == 1) {
			$imagem = $enviarImagem['imagem']; // Pegando o nome da imagem transferida para o servidor
		} else {
			echo json_encode(array('erro' => TRUE, 'tipo' => 8, 'msg' => $enviarImagem['erro']));
			exit;
		}
	} else {
		$imagem = '';
	}

	// Conexão com o banco
	$conn = connect();

	// Validação da conexão, testando se a $conn é um objeto com a conexão dentro
	if (!is_object($conn)) {
		echo json_encode(array('erro' => TRUE, 'tipo' => 2, 'msg' => $conn));
		exit;
	}

	// SQL e bindings
	$sql = "INSERT INTO briefings (titulo_briefing, descricao_briefing, imagem_briefing, id_usuario, nome_usuario, cliente_briefing) VALUES (:titulo, :descricao, :imagem, :id, :nome, :cliente)";
	$stmt = $conn->prepare($sql);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':imagem', $imagem);
	$stmt->bindParam(':id', $id_usuario);
	$stmt->bindParam(':nome', $nome_usuario);
	$stmt->bindParam(':cliente', $cliente);

    

	//executar o sql
	if ($stmt->execute()){
		echo json_encode(array('erro' => FALSE));
	} else {
		echo json_encode(array('erro' => TRUE, 'tipo' => 3, 'msg' => 'Houve um problema na execução do SQL.'));
	}

	// Destruir conexão com o BD
	unset($conn);

