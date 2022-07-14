<?php 
	function enviarImagem($arquivo, $tamanhoMax, $destino) {
		// Definindo os tipos aceitaveis de arquivo
		$tipos = array('image/png', 'image/bmp', 'image/gif', 'image/jpg', 'image/jpeg');
		// Convertendo o tamanho máximo de MB para Bytes
		$tamanhoMax = $tamanhoMax * 1024 * 1024;

		// Verificando se houve erro
		if ($arquivo['error'] != 0) {
			switch ($arquivo['error']) {
				case 1:
					return array('status' => 0, 'erro' => 'O arquivo enviado excede o limite definido na diretiva upload_max_filesize do php.ini.');
					break;
				case 2:
					return array('status' => 0, 'erro' => 'O arquivo excede o limite definido em MAX_FILE_SIZE no formulário HTML.');
					break;
				case 3:
					return array('status' => 0, 'erro' => 'O upload do arquivo foi feito parcialmente.');
					break;
				case 4: 
					return array('status' => 0, 'erro' => 'Nenhum arquivo foi enviado.');
					break;
				case 6:
					return array('status' => 0, 'erro' => 'Pasta temporária ausente.');
					break;
				case 7:
					return array('status' => 0, 'erro' => 'Falha em escrever o arquivo em disco.');
					break;
				case 8:
					return array('status' => 0, 'erro' => 'Uma extensão do PHP interrompeu o upload do arquivo. O PHP não fornece uma maneira de determinar qual extensão causou a interrupção. Examinar a lista das extensões carregadas com o phpinfo() pode ajudar.');
					break;
			}

			exit;
		}

		// Verificando o tamanho máximo da imagem
		if ($arquivo['size'] > $tamanhoMax) {
			return array('status' => 0, 'erro' => 'O tamanho da imagem excedeu o limite');
			exit;
		}

		// Verificando o tipo de arquivo
		if (!in_array($arquivo['type'], $tipos)) {
			return array('status' => 0, 'erro' => 'O tipo de arquivo precisa ser: JPG, JPEG, BMP, PNG ou GIF');
			exit;
		}		

		// Definindo um nome único e dinâmico para o arquivo
		// Através da função time() encriptada com MD5
		// E concatenada com '.' ponto, mais a extenssão do arquivo
		$nomeFinal = md5(time()) . '.' . @end(explode('.', $arquivo['name']));

		// Verificar se a pasta de destino existe
		if (!is_dir($destino)) {
			mkdir($destino);
		}

		// Movendo o arquivo do cliente para o servidor
		if (move_uploaded_file($arquivo['tmp_name'], "{$destino}/{$nomeFinal}")) {
			return array('status' => 1, 'imagem' => $nomeFinal);
		} else {
			return array('status' => 0, 'erro' => 'Houve algum erro no envio da imagem.');
		}
	} 