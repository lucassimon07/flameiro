<?php
  @session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Ideia | Flameiro</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/add_section.css">
</head>
<body>
 
<div class="cont">
<div class="container">
        <div class="titulo">
    <a class="link" href="sistema.php">Voltar</a>
    </div>
    
    <div class="titulo">
        <p class="tit">Adicionar Ideia</p>
    </div>

    <form id="cad_section">
        <div class="form-group">    
        <input type="hidden" name="txt_id_usuario" value="<?php echo $_SESSION['id']?>">    
        <input class="form-control form-control-lg" type="text" name="txt_titulo" id="txt_titulo" placeholder="Título">
        </div>
        <div class="form-group">
            <select class="form-control" name="select_cat" id="select_cat">
                <option value="categoria">Categoria</option>
                <option value="ideia">Ideia</option>
                <option value="solucao">Solução</option>
                <option value="comentario">Comentário</option>
            </select>
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
            <textarea class="form-control" name="txt_desc" id="txt_desc" rows="3" placeholder="Descrição"></textarea>
        </div>
        <div class="form-group">
            <input class="file-chooser" type="file" name="file_img" accept="image/*">
            <img class="preview-img">
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-primary botao" onclick="cadastrar()">Adicionar</button>
        </div>

    </form>
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
        

    $(document).ready(function() {
        $('#formCadNoticia').submit(function() {
          return false;
        });

      });

function cadastrar() {
        $.ajax({
          type: 'POST',
          url: 'php/cadastrar_section.php',
          dataType: 'JSON',
          data: new FormData($('#cad_section')[0]),
          contentType: false,
          cache: false,
          processData: false,
          success: function(retorno) {
              //console.log(retorno);
            if (retorno.erro == false) {
                $('#modalDescricaoAlerta').html('Section cadastrada com sucesso.');
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
            } else if (retorno.tipo == 4) {
              $('#modalDescricaoAlerta').html("Você precisa estar logado para adicionar uma ideia.<br><a href='index.php'>Fazer Login</a>");
              $('#modalAlerta').modal('show');
            }

            
            $('#cad_section')[0].reset();       
          }
        }).fail(function(jqXHR, textStatus, error) {
          alert(textStatus + ' ' + error);
        });
      }
</script>

<!--<script>
    const $ = document.querySelector.bind(document);
        const previewImg = $('.preview-img');
        const fileChooser = $('.file-chooser');

        fileChooser.onchange = e => {
        const fileToUpload = e.target.files.item(0);
        const reader = new FileReader();

        // evento disparado quando o reader terminar de ler 
        reader.onload = e => previewImg.src = e.target.result;

        // solicita ao reader que leia o arquivo 
        // transformando-o para DataURL. 
        // Isso disparará o evento reader.onload.
        reader.readAsDataURL(fileToUpload);
};
</script>-->

</body>
</html>