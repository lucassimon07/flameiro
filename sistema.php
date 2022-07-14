<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flameiro</title>

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" type="text/css" href="css/sistema.css">
<!--===============================================================================================-->

</head>
<body>
<div class="cont" >

    <!-- mostrar nome do usuário logado -->
    <div class="nome" style="width: 100%; text-align: center; color: white;">
      <p class="nome">
        <?php
          echo "Olá {$_SESSION['nome']}";
        ?>
        </p>
    </div>
  
  <!-- botões para ações -->
  <div class="row">
    <div class="col-sm">
      <center><button type="button" class="btn btn-primary botao botao2" onclick="red_add()">Adicionar Ideia</button></center>
    </div>
    <div class="col-sm">
      <center><button type="button" class="btn btn-primary botao botao1" onclick="red_colecao()">Coleção de Ideias</button></center>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
      <center><button type="button" class="btn btn-primary botao botao3" onclick="red_briefing()">Pré-Briefing</button></center>
    </div>
      <div class="col-sm">
    <center><button type="button" class="btn btn-primary botao botao3" onclick="red_agenda()">Agenda</button></center>
    </div>
  </div>

    <div class="row sair">
      <div class="col-sm">
        <center><button type="button" class="btn botao5" onclick="logout()">Sair</button></center>
      </div>
    </div>



<footer>
    <div class="copy">
        <center><p>Copyright &copy Agência Flama</p></center>
    </div>
</footer>

</div>


<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->

<script>
  function red_add() {
    window.location.href = 'add_section.php'; //redireciona para página de adicionar ideias
  }

  function red_colecao(){
    window.location.href = 'section.php'; //redireciona para o painel de ideias
  }

  function logout() {
    window.location.href = 'php/logout.php'; //função para sair
    
  }

  function red_briefing() {
    window.location.href = 'briefing.php'; //redirecionar para o pré-briefing
  }

  function red_agenda() {
    window.location.href = 'agenda.php'; //redireciona para a agenda
  }
</script>

</body>
</html>