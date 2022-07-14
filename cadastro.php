


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cadastro | Flameiro</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	
	<form id="cadastrar_usuario">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						Faça seu cadastro de Flameiro!
					</span>
					<span class="login100-form-title p-b-48">
						<img style="height: 150px; width: 150px;" src="images/logo.png">
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="txt_usuario" required>
						<span class="focus-input100" data-placeholder="Usuário"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="txt_nome" required>
						<span class="focus-input100" data-placeholder="Nome"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="txt_senha">
						<span class="focus-input100" data-placeholder="Senha"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="txt_senha2">
						<span class="focus-input100" data-placeholder="Repetir senha"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="btn_login" onclick="cadastrar()">
								CADASTRAR
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Já é um Flameiro?
						</span>

						<a class="txt2" href="index.php">
							Faça o login
						</a>
					</div>
				</form>
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
	

	<div id="dropDownSelect1"></div>


	


 <!-- JS -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   

<!--===============================================================================================-->
	
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->

<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>


<script>

$(document).ready(function() {
        $('#formCadNoticia').submit(function() {
          return false;
        });

      });

	function cadastrar() {
        $.ajax({
          type: 'POST',
          url: 'php/cadastrar_usuario.php',
          dataType: 'JSON',
          data: new FormData($('#cadastrar_usuario')[0]),
          contentType: false,
          cache: false,
          processData: false,
          success: function(retorno) {
            if (retorno.erro == false) {
				$('#modalDescricaoAlerta').html('Usuário cadastrado com sucesso.');
				$('#modalAlerta').modal('show');
            } else if (retorno.tipo == 1) {
				$('#modalDescricaoAlerta').html('Por favor preencha todos os campos.');
            } else if (retorno.tipo == 2) {
				$('#modalDescricaoAlerta').html(retorno.msg);
				$('#modalAlerta').modal('show');
            } else if (retorno.tipo == 3) {
				$('#modalDescricaoAlerta').html(retorno.msg); 
				$('#modalAlerta').modal('show'); 
          }
		  $('#cadastrar_usuario')[0].reset();
		  }
        }).fail(function(jqXHR, textStatus, error) {
          alert(textStatus + ' ' + error);
        });
      }
</script>

</body>
</html>