<?php
	// Definição do fuso horário
	date_default_timezone_set('America/Sao_Paulo');

	// Importação de scripts
	require_once 'conexao_db.php';

	// Validação dos dados
    $titulo = isset($_POST['txt_titulo']) ? $_POST['txt_titulo'] : '';
    $cliente = isset($_POST['select_cliente']) ? $_POST['select_cliente'] : '';
	$descricao = isset($_POST['txt_desc']) ? $_POST['txt_desc'] : '';
	$id_usuario = isset($_POST['txt_id_usuario']) ? $_POST['txt_id_usuario'] : '';
    $nome_usuario = isset($_POST['txt_nome_usuario']) ? $_POST['txt_nome_usuario'] : '';
    $data = isset($_POST['txt_data']) ? $_POST['txt_data'] : '';
    $hora = isset($_POST['txt_hora']) ? $_POST['txt_hora'] : '';
    $local = isset($_POST['txt_local']) ? $_POST['txt_local'] : '';
    $participantes = isset($_POST['txt_part']) ? $_POST['txt_part'] : '';

	if (empty($titulo) || empty($descricao) || empty($cliente) || empty($data) || empty($participantes) || empty($hora) || empty($local)) {
		echo json_encode(array('erro' => TRUE, 'tipo' => 1));
		exit;
    }
    
	// Conexão com o banco
	$conn = connect();

	// Validação da conexão, testando se a $conn é um objeto com a conexão dentro
	if (!is_object($conn)) {
		echo json_encode(array('erro' => TRUE, 'tipo' => 2, 'msg' => $conn));
		exit;
	}

	// SQL e bindings
	$sql = "INSERT INTO compromissos (titulo_compromisso, descricao_compromisso, participantes_compromisso, id_usuario, nome_usuario, data_compromisso, cliente_compromisso, hora_compromisso, local_compromisso) VALUES (:titulo, :descricao, :participantes, :id, :nome, :dat, :cliente, :hora, :loc)";
	$stmt = $conn->prepare($sql);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':participantes', $participantes);
	$stmt->bindParam(':id', $id_usuario);
    $stmt->bindParam(':nome', $nome_usuario);
    $stmt->bindParam(':dat', $data);
    $stmt->bindParam(':hora', $hora);
    $stmt->bindParam(':loc', $local);
	$stmt->bindParam(':cliente', $cliente);

    

	//executar o sql
	if ($stmt->execute()){
		echo json_encode(array('erro' => FALSE));
	} else {
		echo json_encode(array('erro' => TRUE, 'tipo' => 3, 'msg' => 'Houve um problema na execução do SQL.'));
	}

	// Destruir conexão com o BD
	unset($conn);

