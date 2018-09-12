<?php 

require_once ("class/user.class.php");

class Crud extends User {

	public $sql; 
	public $prepara; 
	public $rs;

	//-------------------------------------------------------------------------------
	public function __construct(){

		// Iniciar sessão
		session_start();

		// brincar de logout
		// session_destroy();
		// session_start();


		// Chama coneção com o banco de dados
		$this->conecta('localhost','root','','sector');

		// Validar sessão
		$this->autenticar();

		// Iniciar cabeçalho
		$this->header();

		// Iniciar script
		$this->script();

		// Verificndo se esta autenticado

		if (isset($_SESSION['autenticado'])) {

			if ($_SESSION['autenticado'] == "sim") {
				// Iniciar menu
				$this->menu();
			}
		} else {
			$_SESSION['autenticado'] = "nao";

		}
		

		
	}

	//-------------------------------------------------------------------------------
	public function __destruct(){

		// Iniciar redape
		$this->footer();

	}

	// Conexão com o banco de dados ------------------------------------------------------------------------
	public function conecta($local,$user,$pass,$banco){

		$this->conexao = mysqli_connect($local,$user,$pass,$banco);

	}

	// Header ------------------------------------------------------------------------
	public function header() {
		?>
		<!doctype html>
		<html lang="en">
		<head>
			<!-- Required meta tags -->
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

			<!-- Bootstrap CSS -->
			<link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
			<link rel="stylesheet" type="text/css" href="css/animate.css">
			<link rel="stylesheet" type="text/css" href="css/style.css">
			<link rel="stylesheet" type="text/css" href="css/media.css">
			<script src="js/jquery-3.3.1.min.js"></script>

			<title>Sector Gerenciamento de Processos</title>

		</head>
		<body>
			<div class="container-fluid">
				<div class="row">

					<?php
				// Verifica se está autenticado para iniciar DIV do tipo ROW
				 // if ($_SESSION['autenticado'] == "sim") {echo '<div class="row">';}
				}

	// Footer --------------------------------------------------------------------------
				public function footer() {
		// Verifica se está autenticado para iniciar DIV do tipo ROW
		 // if ($_SESSION['autenticado'] == "sim") {echo '</div>';}
					?>

				</div>
			</div>
			<!-- <script src="js/jquery-3.3.1.slim.min.js"></script> -->
			<script src="js/popper.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
		</body>
		</html>
		<?php
	}

	// Menu lateral ----------------------------------------------------------------------
	public function menu() {

		?>
	<div class="button_menu">
		<div class="row menuFixo">
			<div class="col-12 menuFixo">
				<button id="btnMenuFixo">
					<i class="fas fa-bars"></i> Menu
				</button>
			</div>
		</div>

		<div class="menuHover">

			<div class="row">
				<div class="col text-right">
					<button id="btnMenuClose">
						<i class="fas fa-times"></i>
					</button>
				</div>
			</div>

			<div class="row">
				<div class="col">
					<form method="POST" action="index.php">
								<!-- Direciona para HOME -->
								<?php 
								if ($_SESSION['tipo'] == 'adm') {
									?>
									<button id="btn1-menu" class="col-12" type="submit" name="home">				
										<div class="col-10 int_btn"><i class="fas fa-home"></i> Início</div>
									</button>
									<?php
								}
								?>

								<!-- Direciona para USUARIOS -->
								<?php 
								if ($_SESSION['tipo'] == 'adm') {
									?>
									<button id="btn2-menu" class="col-12" type="submit" name="usuarios">
										<div class="col-10 int_btn"><i class="fas fa-users"></i> Usuarios</div>
									</button>
									<?php
								}
								?>

								<!-- Direciona para CLIENTES -->
								<?php 
								if ($_SESSION['tipo'] == 'adm' || $_SESSION['tipo'] == 'usuario') {
									?>
									<button id="btn3-menu" class="col-12" type="submit" name="clientes">
										<div class="col-10 int_btn"><i class="fas fa-handshake"></i> Clientes</div>
									</button>
									<?php
								}
								?>

								<!-- Direciona para PEDIDOS -->
								<?php 
								if ($_SESSION['tipo'] == 'adm' || $_SESSION['tipo'] == 'usuario' || $_SESSION['tipo'] == 'cliente') {
									?>
									<button id="btn4-menu" class="col-12" type="submit" name="pedidos">
										<div class="col-10 int_btn"><i class="fas fa-tasks"></i> Pedidos</div>
									</button>
									<?php
								}
								?>

								<!-- Direciona para ESTATISTICAS -->
								<?php 
								if ($_SESSION['tipo'] == 'adm') {
									?>
									<button id="btn6-menu" class="col-12" type="submit" name="graficos">
										<div class="col-10 int_btn"><i class="fas fa-chart-bar"></i> Estatísticas</div>
									</button>
									<?php
								}
								?>

								<!-- Direciona para CADASTRAR -->
								<?php 
								if ($_SESSION['tipo'] == 'adm' || $_SESSION['tipo'] == 'usuario' || $_SESSION['tipo'] == 'cliente') {
									?>
									<button id="btn7-menu" class="col-12" type="submit" name="cadastro">
										<div class="col-10 int_btn"><i class="fas fa-file-signature"></i> Cadastrar</div>
									</button>
									<!-- Botão logoff -->
								<button id="btn8-menu" class="col-12" type="submit" name="sair">
									<div class="col-10 int_btn"><i class="fas fa-sign-out-alt"></i> Sair</div>
								</button>
									<?php
								}
								?>
					</form>
				</div>
			</div>
		</div>



		<div class="row">
		<div class="menu col-2">
			<div class="col search">
				<form method="POST" action="index.php">
					<div class="form-row">
						<div class="form-group col-md-9">
							<input name="termo" type="text" class="form-control" placeholder="Buscar...">
						</div>
						<div class="form-group col-md-2 text-right">
							<button type="submit" name="buscar" class="btn btn-primary busca"><i class="fas fa-search"></i></button>
						</div>
					</div>
				</form>
			</div>

>					
							<form method="POST" action="index.php">
								<!-- Direciona para HOME -->
								<?php 
								if ($_SESSION['tipo'] == 'adm') {
									?>
									<button id="btn1-menu" class="col-12" type="submit" name="home">				
										<div class="col-10 int_btn"><i class="fas fa-home"></i> Início</div>
									</button>
									<?php
								}
								?>

								<!-- Direciona para USUARIOS -->
								<?php 
								if ($_SESSION['tipo'] == 'adm') {
									?>
									<button id="btn2-menu" class="col-12" type="submit" name="usuarios">
										<div class="col-10 int_btn"><i class="fas fa-users"></i> Usuarios</div>
									</button>
									<?php
								}
								?>

								<!-- Direciona para CLIENTES -->
								<?php 
								if ($_SESSION['tipo'] == 'adm' || $_SESSION['tipo'] == 'usuario') {
									?>
									<button id="btn3-menu" class="col-12" type="submit" name="clientes">
										<div class="col-10 int_btn"><i class="fas fa-handshake"></i> Clientes</div>
									</button>
									<?php
								}
								?>

								<!-- Direciona para PEDIDOS -->
								<?php 
								if ($_SESSION['tipo'] == 'adm' || $_SESSION['tipo'] == 'usuario' || $_SESSION['tipo'] == 'cliente') {
									?>
									<button id="btn4-menu" class="col-12" type="submit" name="pedidos">
										<div class="col-10 int_btn"><i class="fas fa-tasks"></i> Pedidos</div>
									</button>
									<?php
								}
								?>

								<!-- Direciona para ESTATISTICAS -->
								<?php 
								if ($_SESSION['tipo'] == 'adm') {
									?>
									<button id="btn6-menu" class="col-12" type="submit" name="graficos">
										<div class="col-10 int_btn"><i class="fas fa-chart-bar"></i> Estatísticas</div>
									</button>
									<?php
								}
								?>

								<!-- Direciona para CADASTRAR -->
								<?php 
								if ($_SESSION['tipo'] == 'adm' || $_SESSION['tipo'] == 'usuario' || $_SESSION['tipo'] == 'cliente') {
									?>
									<button id="btn7-menu" class="col-12" type="submit" name="cadastro">
										<div class="col-10 int_btn"><i class="fas fa-file-signature"></i> Cadastrar</div>
									</button>
									<?php
								}
								?>

								<!-- Botão logoff -->
								<button id="btn8-menu" class="col-12" type="submit" name="sair">
									<div class="col-10 int_btn"><i class="fas fa-sign-out-alt"></i> Sair</div>
								</button>
							</ul>
						</div>
					</nav>

				</form>
			<img src="images/logow.png">
		</div>
		<?php
	}

	// Funções JQuery
	public function script() {
		?>
		<script type="text/javascript">

			// Slide do menu de cadastro...
			$(document).ready(function(){

				// Ocultando os formulários
				$('.body_card').hide();

				// Capturando o click
				$('#btn1,#btn2,#btn3').click(function(){

					// Atribuindo o id do botao clicado 
					botao = $(this).attr('id');

					// Executando a função
					switch (botao) {
						case 'btn1':
						$('.body_card').hide(500);
						$("#card1").toggle(500);
						break;
						case 'btn2':
						$('.body_card').hide(500);
						$("#card2").toggle(500);
						break;
						case 'btn3':
						$('.body_card').hide(500);
						$("#card3").toggle(500);
						break;
					}

				});
				
			});

			$(document).ready(function(){


				// botão para ocultar menu fixo responsivo
				$('#btnMenuClose').click(function(){
					$('.menuHover').hide();
				});

				// botão pra abrir o menu fixo responsivo
				$('#btnMenuFixo').click(function(){
					$('.menuHover').show();
				});

				});

		</script>
		<?php
	}

	// Inserindo na tabela
	public function add($table,$set,$values) {

		$cnpj="#cnpj";
		$cpf="#cpf";

		// if $this->validaCNPJ('cnpj')=true

		$campos = '';
		$valores = '';

		foreach ($set as $col) {
			$campos .= $col;
		}

		foreach ($values as $val) {
			$valores .= $val;
		}

		$this->sql = "INSERT INTO $table ($campos) VALUES ($valores)";

		if (mysqli_query($this->conexao,$this->sql)) {
			//Redirecionando
			$this->Home();
			echo'<p class="alert alert-success col-10">Cadastro efetuado com sucesso!</p>';
		} else {
			echo '<p class="alert alert-danger col-10">Erro ao cadastrar!</p>'. $this->sql;
		}

	}
	

	// Atualizando na tabela
	public function update($table,$values,$id) {

		$campos = '';
		$valores = '';
		
		foreach ($values as $val) {
			$valores .= $val;
		}

		$this->sql = "UPDATE $table SET $valores WHERE id = $id";

		if (mysqli_query($this->conexao,$this->sql)) {
			//Redirecionando
			$this->Home();
		} else {
			echo '<p class="alert alert-danger col-10">Erro ao cadastrar!</p>'. $this->sql;
		}

	}

	// Excluir da tabela
	public function delete($id) {

		$this->sql = "DELETE FROM cadastro WHERE id = $id";

		mysqli_query($this->conexao,$this->sql);

		//Redirecionando
		$this->Home();

	}

	// Busca geral
	public function Buscar($termo) {

		// Verificando se é numero ou letra
		if (is_int($termo)) {
			
			$this->sql = "SELECT * ";

		}


	}

}

?>