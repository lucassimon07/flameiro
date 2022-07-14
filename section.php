<?php
session_start();
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ideias</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style_brief.css">
    <link rel="stylesheet" href="css/fundo.css">

</head>
<body>
 
    
    <!-- LISTA -->

    
	<!-- Recebe as informações que vem do ajax -->
	<div class="con" style="width: 100%; margin-left: 10%; margin-right: 10%;">
    
    
       <div class="titulo">
            <a class="link" href="sistema.php"><- Voltar</a>
        </div>
      
      <div class="ideia row" id="ideia">

      </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <script>
      $(document).ready(function() {
        listar_section();
      });

      function listar_section() {
        $.ajax({
          type: 'POST',
          url: 'php/exibir_section.php',
          dataType: 'HTML',
          success: function(retorno) {
            $('#ideia').html(retorno);
          }
        }).fail(function(jqXHR, textStatus, erro) {
          alert(textStatus + ' ' + erro);
        });
      }

	  function excluir(id) {
        $.ajax({
          type: 'POST',
          url: 'php/excluir_section.php',
          dataType: 'JSON',
          data: {
            'id_section': id
          },
          success: function(retorno) {
			if (retorno.erro == false) {
              $('#modalDescricaoAlerta').html('Ideia excluída com sucesso.');
            } else if (retorno.tipo == 1) {
              $('#modalDescricaoAlerta').html('Houve um problema com o id da ideia a ser excluída.');
            } else if (retorno.tipo == 2) {
              $('#modalDescricaoAlerta').html(retorno.msg);
            } else if (retorno.tipo == 3) {
              $('#modalDescricaoAlerta').html(retorno.msg);
            }

            $('#modalAlerta').modal('show');
            listar_section();
          }
        }).fail(function(jqXHR, textStatus, erro) {
          alert(textStatus + ' ' + erro);
        });
      }

    </script>

</body>
</html>