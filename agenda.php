<?php
session_start();
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Compromissos da Flama</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style_brief.css">
    <link rel="stylesheet" href="css/fundo.css">


</head>
<body>
 
    
    <!-- LISTA -->

    
    <div class="container">
    
        
      
      <div class="titulos" style="margin-bottom: 50px; margin-top: 50px; color: #fff;">
        <center><h2>Calendário de eventos da Flama</h2></center>
      </div>
      <div class="titulo">
            <a class="link" href="sistema.php"><- Voltar</a>
        </div>
      
      
      <div class="agenda row" id="agenda">

      </div>
    
    
    
    
   <!--<div class="form-group">    
      <button type="button" class="btn btn-primary botao" onclick="exibe_modal()">Cadastrar novo compromisso</button>
    </div>


<div class="modal fade" id="modal_cad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo compromisso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="cad_compromisso">
          <div class="form-group">
            <label for="txt_id_usuario" class="col-form-label">Título:</label>
            <input type="hidden" name="txt_id_usuario" value="<?php echo $_SESSION['id']?>"> 
            <input type="hidden" name="txt_nome_usuario" value="<?php echo $_SESSION['nome']?>">  
            <input type="text" class="form-control" id="txt_titulo" name="txt_titulo">
          </div>
          <div class="form-group">
            <label for="txt_desc" class="col-form-label">Descrição:</label>
            <textarea class="form-control" id="txt_desc" name="txt_desc"></textarea>
          </div>
          <div class="form-group">
            <select class="form-control" name="select_cliente" id="select_cliente">
                <option value="cliente">Cliente</option>
                <option value="flama">Agência Flama</option>
                <option value="cot">COT</option>
                <option value="manfre">Clínica Manfré</option>
                <option value="salute">Cafeteria Vó Salute</option>
                <option value="firme">Firme</option>
                <option value="imperial">Imperial</option>
                <option value="linear">Linear</option>
                <option value="liderfarma">Líder Farma</option>
                <option value="popular">Líder Popular</option>
                <option value="machadinho">Machadinho</option>
                <option value="maxsul">MaxSul</option>
                <option value="realce">Realce</option>
            </select>
        </div>
        <div class="form-group">
            <label for="txt_data" class="col-form-label">Data:</label>
            <input type="text" class="form-control" id="txt_data" name="txt_data" placeholder="dd/mm/aaaa">
        </div> 
        <div class="form-group">
            <label for="txt_hora" class="col-form-label">Hora:</label>
            <input type="text" class="form-control" id="txt_hora" name="txt_hora" placeholder="hh:mm">
        </div> 
        <div class="form-group">
            <label for="txt_part" class="col-form-label">Quem vai participar:</label>
            <input type="text" class="form-control" id="txt_part" name="txt_part">
        </div> 
        <div class="form-group">
            <label for="txt_local" class="col-form-label">Local:</label>
            <input type="text" class="form-control" id="txt_local" name="txt_local">
        </div> 
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="cad_compromisso()">Adicionar</button>
      </div>
    </div>
  </div>
</div> -->



  
<iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=America%2FSao_Paulo&amp;src=ZmxhbWFjb25jb3JkaWFAZ21haWwuY29t&amp;color=%23039BE5" style="border:solid 1px #777" width="100%" height="600" frameborder="0" scrolling="no"></iframe>

  

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

    <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <script>
        $(document).ready(function () { 
            var $campo_data = $("#txt_data");
            $campo_data.mask('00/00/0000', {reverse: false});
        });

        $(document).ready(function(){
          var $campo_hora = $("#txt_hora");
          $campo_hora.mask('00:00', {reverse: false});
        });
    </script>
    <script>
        function exibe_modal() {
            $('#modal_cad').modal('show'); 
        }

        function cad_compromisso() {
        $.ajax({
          type: 'POST',
          url: 'php/cadastrar_compromisso.php',
          dataType: 'JSON',
          data: new FormData($('#cad_compromisso')[0]),
          contentType: false,
          cache: false,
          processData: false,
          success: function(retorno) {
              //console.log(retorno);
            if (retorno.erro == false) {
                $('#modalDescricaoAlerta').html('Compromisso cadastrado com sucesso.');
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

            
            $('#cad_compromisso')[0].reset();
            listar_compromisso();       
          }
        }).fail(function(jqXHR, textStatus, error) {
          alert(textStatus + ' ' + error);
        });
        }


            $(document).ready(function() {
        listar_compromisso();
      });

function listar_compromisso() {
        $.ajax({
          type: 'POST',
          url: 'php/exibir_compromisso.php',
          dataType: 'HTML',
          success: function(retorno) {
            $('#agenda').html(retorno);
          }
        }).fail(function(jqXHR, textStatus, erro) {
          alert(textStatus + ' ' + erro);
        });
      }

      function excluir(id) {
        $.ajax({
          type: 'POST',
          url: 'php/excluir_compromisso.php',
          dataType: 'JSON',
          data: {
            'id_compromisso': id
          },
          success: function(retorno) {
			if (retorno.erro == false) {
              $('#modalDescricaoAlerta').html('Compromisso excluída com sucesso.');
            } else if (retorno.tipo == 1) {
              $('#modalDescricaoAlerta').html('Houve um problema com o id do compromisso a ser excluído.');
            } else if (retorno.tipo == 2) {
              $('#modalDescricaoAlerta').html(retorno.msg);
            } else if (retorno.tipo == 3) {
              $('#modalDescricaoAlerta').html(retorno.msg);
            }

            $('#modalAlerta').modal('show');
            listar_compromisso();
          }
        }).fail(function(jqXHR, textStatus, erro) {
          alert(textStatus + ' ' + erro);
        });
      }

    </script>-->

</body>
</html>