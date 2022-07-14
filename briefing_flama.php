<?php
session_start();
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pré-Briefing</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style_brief.css">
    <link rel="stylesheet" href="css/fundo.css">

</head>
<body>
 
    
    <!-- LISTA -->

    
    <div class="container">
    
    
      <div class="briefing row" id="briefing">

      </div>
    
    
    
    
    <div class="form-group">    
      <button type="button" class="btn btn-primary botao" onclick="exibe_modal()">Cadastrar novo</button>
    </div>


<div class="modal fade" id="modal_cad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo briefing</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="cad_briefing">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Título:</label>
            <input type="hidden" name="txt_id_usuario" value="<?php echo $_SESSION['id']?>"> 
            <input type="hidden" name="txt_nome_usuario" value="<?php echo $_SESSION['nome']?>">  
            <input type="text" class="form-control" id="txt_titulo" name="txt_titulo">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Descrição:</label>
            <textarea class="form-control" id="txt_desc" name="txt_desc"></textarea>
          </div>
          <div class="form-group">
            <select class="form-control" name="select_cliente" id="select_cliente">
                <option value="Flama">Flama</option>
            </select>
        </div>
        <div class="form-group">
            <input class="file-chooser" type="file" name="file_img" accept="image/*">
            <img class="preview-img">
        </div> 
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="cad_briefing()">Adicionar</button>
      </div>
    </div>
  </div>
</div>




<div id="modalAlerta" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Atenção</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p id="modalDescricaoAlerta"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <script>
        function exibe_modal() {
            $('#modal_cad').modal('show'); 
        }

        function cad_briefing() {
        $.ajax({
          type: 'POST',
          url: 'php/cadastrar_briefing.php',
          dataType: 'JSON',
          data: new FormData($('#cad_briefing')[0]),
          contentType: false,
          cache: false,
          processData: false,
          success: function(retorno) {
              //console.log(retorno);
            if (retorno.erro == false) {
                $('#modalDescricaoAlerta').html('Briefing cadastrado com sucesso.');
                $('#modalAlerta').modal('show');
            } else if (retorno.tipo == 1) {
                $('#modalDescricaoAlerta').html('Por favor preencha todos os campos.');
                $('#modalAlerta').modal('show');
            } else if (retorno.tipo == 2) {
                $('#modalDescricaoAlerta').html(retorno.msg);
                $('#modalAlerta').modal('show');
            } else if (retorno.tipo == 3) {
                $('#modalDescricaoAlerta').html(retorno.msg);
                $('#modalAlerta').modal('show');
            }

            
            $('#cad_briefing')[0].reset();
            listar_briefing();       
          }
        }).fail(function(jqXHR, textStatus, error) {
          alert(textStatus + ' ' + error);
        });
        }


      $(document).ready(function() {
        listar_briefing();
      });

      function listar_briefing() {
        $.ajax({
          type: 'POST',
          url: 'php/exibir_briefing_flama.php',
          dataType: 'HTML',
          success: function(retorno) {
            $('#briefing').html(retorno);
          }
        }).fail(function(jqXHR, textStatus, erro) {
          alert(textStatus + ' ' + erro);
        });
      }

      function excluir(id) {
        $.ajax({
          type: 'POST',
          url: 'php/excluir_briefing.php',
          dataType: 'JSON',
          data: {
            'id_briefing': id
          },
          success: function(retorno) {
			if (retorno.erro == false) {
              $('#modalDescricaoAlerta').html('Briefing excluída com sucesso.');
            } else if (retorno.tipo == 1) {
              $('#modalDescricaoAlerta').html('Houve um problema com o id do briefing a ser excluída.');
            } else if (retorno.tipo == 2) {
              $('#modalDescricaoAlerta').html(retorno.msg);
            } else if (retorno.tipo == 3) {
              $('#modalDescricaoAlerta').html(retorno.msg);
            }

            $('#modalAlerta').modal('show');
            listar_briefing();
          }
        }).fail(function(jqXHR, textStatus, erro) {
          alert(textStatus + ' ' + erro);
        });
      }

    </script>

</body>
</html>