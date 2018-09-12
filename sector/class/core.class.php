<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
<link rel="icon" type="image/x-icon" href="images/favicon.png">

<?php

require_once ("class/crud.class.php");

class Core extends Crud {


	// Formulario de login ------------------------------------------------------------ 
	public function loginForm() {

		//if ($_SESSION['autenticado'] <> true) {

			?>

				<!doctype html>
		<html lang="en">
		<head>
			<!-- Required meta tags -->
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

			<!-- Bootstrap CSS -->
			<link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="css/media.css">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
			<link rel="stylesheet" type="text/css" href="css/animate.css">
			<link rel="stylesheet" type="text/css" href="css/style.css">
			<script src="js/jquery-3.3.1.min.js"></script>

			<title>Sector Gerenciamento de Processos</title>

		</head>
		<body>
			<div class="container-fluid">

			<div class="row justify-content-center">

				<div class="box_login col-4">

					<a href="intro.php"><img src="images/logo.png"></a>
					<h4>Login</h4>
					<p>Bem vindo! Acesse sua conta.</p>

					<form method="POST" action="#">
						<div class="form-group">
							<input type="email" name="email" class="form-control" placeholder="Digite seu email">
						</div>
						<div class="form-group">
							<input type="password" name="senha" class="form-control" placeholder="Digite sua senha">
						</div>
						<div class="form-group form-check">
							<input type="checkbox" name="antibot" class="form-check-input">
							<label class="form-check-label" for="antibot">Não sou um robô</label>
						</div>
						<button type="submit" name="acessar" class="btn btn-primary">Entrar</button>
					</form>

				</div>
			</div>

				</div>
			<!-- <script src="js/jquery-3.3.1.slim.min.js"></script> -->
			<script src="js/popper.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
		</body>
		</html>
			<?php
		//}
	}

	// Formulario de cadastro CLIENTE ----------------------------------------------------
	public function formCliente($id = '0'){

		$ativo = '';
		$inativo = '';
		
		if ($id > 0) {
			$this->sql = "SELECT * FROM cadastro WHERE id = $id";
			$this->prepara = mysqli_query($this->conexao,$this->sql);
			$this->rs = mysqli_fetch_array($this->prepara);

			if ($this->rs['ativo'] == 1) {
				$ativo = 'checked';
			} else {
				$inativo = 'checked';
			}

			echo '<div class="col-10">'; 
		}
		?>
		<form method="POST" action="index.php">
			<input type="hidden" name="id" value="<?=$this->rs['id']?>">
			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="cliente">Cliente</label>
					<input name="cliente" type="text" class="form-control" placeholder="Digite nome do cliente" value="<?=$this->rs['cliente']?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="cnpj">CNPJ</label>
					<input name="cnpj" type="number" id="cnpj" class="form-control" placeholder="Digite CNPJ" value="<?=$this->rs['cnpj']?>">
				</div>
				<div class="form-group col-md-6">
					<label for="email">Email</label>
					<input name="email" type="email" class="form-control" placeholder="Digite email" value="<?=$this->rs['email']?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-10">
					<label for="rua">Endereço</label>
					<input name="rua" type="text" class="form-control" placeholder="Ex: Av. Paulista" value="<?=$this->rs['rua']?>">
				</div>
				<div class="form-group col-md-2">
					<label for="numero">Número</label>
					<input name="numero" type="number" class="form-control" placeholder="Ex: 222" value="<?=$this->rs['numero']?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="bairro">Bairro</label>
					<input name="bairro" type="text" class="form-control" placeholder="Ex: Bela Vista" value="<?=$this->rs['bairro']?>">
				</div>
				<div class="form-group col-md-6">
					<label for="cidade">Cidade</label>
					<input name="cidade" type="text" class="form-control" placeholder="Ex: São Paulo" value="<?=$this->rs['cidade']?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="uf">Estado</label>
					<input name="uf" type="text" class="form-control" placeholder="Ex: São Paulo" value="<?=$this->rs['uf']?>">
				</div>
				<div class="form-group col-md-6">
					<label for="cep">CEP</label>
					<input name="cep" type="number" class="form-control" placeholder="Ex: 01500-000" value="<?=$this->rs['cep']?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="telefone">Telefone</label>
					<input name="telefone" type="number" class="form-control" placeholder="Ex: 11 5555 4444" value="<?=$this->rs['telefone']?>">
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="ativo" id="inlineRadio1" value="1" <?=$ativo?>>
					<label class="form-check-label" for="inlineRadio1">Ativo</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="ativo" id="inlineRadio2" value="0" <?=$inativo?>>
					<label class="form-check-label" for="inlineRadio2">Inativo</label>
				</div>
			</div>

			<?php
			if ($id > 0) {
				echo '<button type="submit" name="updateCliente" class="btn btn-success">Salvar alterações</button>';
			} else {
				echo '<button type="submit" name="addCliente" class="btn btn-primary">Cadastrar cliente</button>';
			}

			?>
		</form>

		<?php
		if ($id > 0) {
			echo '</div>';
		}
	}

	// Formulario de cadastro CLIENTE ----------------------------------------------------
	public function formUsuario($id = '0') {

			$select_usuario = '';
			$select_adm = '';

			if ($id > 0) {
			$this->sql = "SELECT * FROM cadastro WHERE id = $id";
			$this->prepara = mysqli_query($this->conexao,$this->sql);
			$this->rs = mysqli_fetch_array($this->prepara);

			if ($this->rs['tipo'] == 'adm') {
				$select_adm = 'selected';
			} else {
				$select_usuario = 'selected';
			}

			echo '<div class="col-10">'; 
		}
		?>
		<form method="POST" action="index.php">
			<input type="hidden" name="id" value="<?=$this->rs['id']?>">
			<input type="hidden" name="senha" value="<?=$this->rs['senha']?>">
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="nome">Primeiro Nome</label>
					<input name="nome" type="text" class="form-control" placeholder="Nome" value="<?=$this->rs['nome']?>">
				</div>
				<div class="form-group col-md-8">
					<label for="sobrenome">Sobrenome</label>
					<input name="sobrenome" type="text" class="form-control" placeholder="Sobrenome" value="<?=$this->rs['sobrenome']?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="cpf">CPF</label>
					<input name="cpf" type="number" id="cpf" class="form-control" placeholder="Digite CPF" value="<?=$this->rs['cpf']?>">
				</div>
				<div class="form-group col-md-6">
					<label for="email">Email</label>
					<input name="email" type="email" class="form-control" placeholder="Digite email" value="<?=$this->rs['email']?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="senha1">Senha</label>
					<input name="senha1" type="password" class="form-control" placeholder="Digite senha">
				</div>
				<div class="form-group col-md-6">
					<label for="senha2">Confirmar Senha</label>
					<input name="senha2" type="password" class="form-control" placeholder="Digite novamente">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputState">Permissões</label>
					<select name="tipoUsuario" class="form-control">
						<option>Selecione</option>
						<option value="usuario" <?=$select_usuario?>>Usuário</option>
						<option value="adm" <?=$select_adm?>>Administrador</option>
					</select>
				</div>
			</div>
			<?php
			if ($id > 0) {
				echo '<button type="submit" name="updateUsuario" class="btn btn-success">Salvar alterações</button>';
			} else {
				echo '<button type="submit" name="addUsuario" class="btn btn-primary">Cadastrar cliente</button>';
			}
			?>
		</form>
		<?php
		if ($id > 0) {
			echo '</div>';
		}
	}

	// Formulario de cadastro PEDIDOS ----------------------------------------------------
	public function formPedidos() {	
		?>
		<form method="POST" action="index.php">
			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="fk_cliente">Cliente</label>
					<select name="fk_cliente" class="form-control">
						<option selected>Selecione</option>
						<?php

						$this->sql = "SELECT id,cliente FROM cadastro WHERE tipo = 'cliente'";
						$this->prepara = mysqli_query($this->conexao,$this->sql);

						while ($this->rs = mysqli_fetch_array($this->prepara)) {

							echo '<option value="'.$this->rs[cliente].'">'.$this->rs[cliente].'</option>';
						}

						?>


					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="numero">Numero do pedido</label>
					<input name="numero" type="number" class="form-control" placeholder="Digite o numero do pedido">
				</div>
				<div class="form-group col-md-4">
					<label for="qtd">Quantidade</label>
					<input name="qtd" type="number" class="form-control" placeholder="Digite a quantidade">
				</div>
				<div class="form-group col-md-4">
					<label for="situacao">Situação</label>
					<select name="situacao" class="form-control">
						<option selected>Selecione</option>
						<option value="recebido">Recebido</option>
						<option value="finalizado">Finalizado</option>
						<option value="retornado">Retornado</option>
					</select>
				</div>
				<div class="form-group col-md-12">
					<label for="descricao">Comentários</label>
					<textarea name="descricao" class="form-control" id="descricao" rows="3"></textarea>
				</div>
			</div>
			<button type="submit" name="addPedido" class="btn btn-primary">Cadastrar pedido</button>
		</form>
		<?php
	}

	// Formulario de cadastro SETOR ----------------------------------------------------
	public function formSetor() {	
		?>

		<form method="POST" action="index.php">
			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="setor">Nome do setor</label>
					<input name="setor" type="text" class="form-control" placeholder="Digite nome do setor">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="telefone">Telefone do setor</label>
					<input name="telefone" type="number" class="form-control" placeholder="Digite telefone do setor">
				</div>
				<div class="form-group col-md-6">
					<label for="email">Email do setor</label>
					<input name="email" type="email" class="form-control" placeholder="Digite email do setor">
				</div>
			</div>
			<button type="submit" name="addSetor" class="btn btn-primary">Cadastrar setor</button>
		</form>

		<?php
	}	

	// Menu de cadastros ----------------------------------------------------
	public function menuCadastro() {
		?>
		<div class="menu-cadastro col-10">
			<!--Cadastro de cliente ------------------------------------------------>
			<div class="box_card">
				<div class="btn_top" id="btn1">
					<i class="fas fa-handshake"></i> Cadastrar cliente
				</div>

				<div class="body_card" id="card1">
					<!-- Chama formulario do CLIENTE dentro do metodo -->
					<?php $this->formCliente();?>
				</div>
			</div>

			<!--Cadastro de usuario ------------------------------------------------>
			<div class="box_card">
				<div class="btn_top" id="btn2">
					<i class="fas fa-users"></i> Cadastrar usuário
				</div>

				<div class="body_card" id="card2">
					<!-- Chama formulario do USUARIO dentro do metodo -->
					<?php $this->formUsuario();?>
				</div>
			</div>

			<!--Cadastro de pedidos ------------------------------------------------>
			<div class="box_card">
				<div class="btn_top" id="btn3">
					<i class="fas fa-tasks"></i> Cadastrar pedidos
				</div>

				<div class="body_card" id="card3">
					<!-- Chama formulario do PEDIDO dentro do metodo -->
					<?php $this->formPedidos();?>
				</div>
			</div>

		</div>
		<?php

	}

	public function Home() {
		?>

		<div class="col-10">
			
			<h1>Fazer o cadastro ocultar e abrir funcionar novamente</h1>
			<ul>
				<li>baixar o que a gente usa do font awesome</li>  
				<li>http://dontpad.com/menulindoedefumado</li>
				<li></li>
			</ul>

		</div>
		
		<?php
	}

	// Pagina par alistagem de usuarios
	public function Usuarios($campo='',$termo='') {
		?>
		<div class="col-10">
			<div class="box_content row">

				<div class="col-12">
					<form method="POST" action="index.php">
						<div class="form-row">
							<div class="form-group col-md-2">
								<select name="campo" class="form-control">
									<option value="all">Buscar por...</option>
									<option value="nome">Nome</option>
									<option value="sobrenome">Sobrenome</option>
									<option value="email">Email</option>
									<option value="cpf">CPF</option>
								</select>
							</div>
							<div class="form-group col-md-4">
								<input name="termo" type="text" class="form-control" placeholder="Buscar em Usuarios...">
							</div>
							<div class="form-group col-md-6">
								<button type="submit" name="buscarUsuario" class="btn btn-primary">Buscar</button>
							</div>
						</div>
					</form>
				</div>

				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Nome</th>
							<th scope="col">Email</th>
							<th scope="col">CPF</th>
							<th scope="col">Permissões</th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody>
						<?php

						// Verificando se as variaveis existem
						if (!empty($campo) && !empty($termo)) {
							//Buscando no banco de dados							
							$this->sql = "SELECT * FROM cadastro WHERE tipo = 'adm' AND $campo LIKE '%$termo%' OR tipo = 'usuario' AND $campo LIKE '%$termo%' ";
							$this->prepara = mysqli_query($this->conexao,$this->sql);

						// Se não existe variaveis
						} else {
							// Lista todos os cadastros					
							$this->sql = "SELECT * FROM cadastro WHERE tipo = 'adm' OR tipo = 'usuario'";
							$this->prepara = mysqli_query($this->conexao,$this->sql);
						}

						while ($this->rs = mysqli_fetch_array($this->prepara)) {

							if ($this->rs['tipo'] == 'adm') {
								$permicao = 'Administrador';
							} else {
								$permicao = 'Usuario';
							}

						?>
						<tr>
							<td><?=$this->rs['nome']." ".$this->rs['sobrenome']?></td>
							<td><?=$this->rs['email']?></td>
							<td><?=$this->rs['cpf']?></td>
							<td><?=$permicao?></td>
							<td>
								<form method="POST" action="index.php">
									<input type="hidden" name="id" value="<?=$this->rs['id']?>">
									<button type="submit" name="editUsuario" class="btn btn-info">Editar</button>
								</form>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>


			</div>
		</div>
		<?php
	}

	// Pagina par alistagem de clientes
	public function Clientes($campo='',$termo='') {
		?>
		<div class="col-10">
			<div class="box_content row">

				<div class="col-12">
					<form method="POST" action="index.php">
						<div class="form-row">
							<div class="form-group col-md-2">
								<select name="campo" class="form-control">
									<option value="all">Buscar por...</option>
									<option value="cliente">Nome</option>
									<option value="email">Email</option>
									<option value="rua">Rua</option>
									<option value="bairro">Bairro</option>
									<option value="cidade">Cidade</option>
									<option value="uf">Estado</option>
									<option value="cep">Cep</option>
									<option value="telefone">Telefone</option>
									<option value="cnpj">CNPJ</option>
								</select>
							</div>
							<div class="form-group col-md-4">
								<input name="termo" type="text" class="form-control" placeholder="Buscar em clientes...">
							</div>
							<div class="form-group col-md-6">
								<button type="submit" name="buscarCliente" class="btn btn-primary">Buscar</button>
							</div>
						</div>
					</form>
				</div>

				<?php

						// Verificando se as variaveis existem
				if (!empty($campo) && !empty($termo)) {
							//Buscando no banco de dados							
					$this->sql = "SELECT * FROM cadastro WHERE $campo LIKE '%$termo%' AND tipo = 'cliente'" ;
					$this->prepara = mysqli_query($this->conexao,$this->sql);

						// Se não existe variaveis
				} else {
							// Lista todos os cadastros					
					$this->sql = "SELECT * FROM cadastro WHERE tipo = 'cliente'";
					$this->prepara = mysqli_query($this->conexao,$this->sql);
				}

				while ($this->rs = mysqli_fetch_array($this->prepara)) {
					?>
					<div class="card cliente col-12">
						<h5 class="card-header"><?=$this->rs['cliente']?></h5>
						<div class="card-body">
							<div class="form-row">
								<div class="col-md-6">
									<div class="box_dados"><b>CNPJ: </b><?=$this->rs['cnpj']?></div>
								</div>
								<div class="col-md-6">
									<div class="box_dados"><b>Email: </b><?=$this->rs['email']?></div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6">
									<div class="box_dados"><b>Endereço: </b><?=$this->rs['rua']?></div>
								</div>
								<div class="col-md-6">
									<div class="box_dados"><b>Número: </b><?=$this->rs['numero']?></div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6">
									<div class="box_dados"><b>Bairro: </b><?=$this->rs['bairro']?></div>
								</div>
								<div class="col-md-6">
									<div class="box_dados"><b>Cidade: </b><?=$this->rs['cidade']?></div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6">
									<div class="box_dados"><b>Estado: </b><?=$this->rs['uf']?></div>
								</div>
								<div class="col-md-6">
									<div class="box_dados"><b>Cep: </b><?=$this->rs['cep']?></div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6">
									<div class="box_dados"><b>Telefone: </b><?=$this->rs['telefone']?></div>
								</div>
								<div class="col-md-6 text-right">
									<form method="POST" action="index.php">
										<input type="hidden" name="id" value="<?=$this->rs['id']?>">
										<button type="submit" name="editCliente" class="btn btn-info">Editar</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>

				</div>
			</div>
			<?php
		}

	public function Graficos() {
		
	}

	public function Pedidos($campo='',$termo='') {
		?>
		<div class="col-10">
			<div class="box_content row">

				<div class="col-12">
					<form method="POST" action="index.php">
						<div class="form-row">
							<div class="form-group col-md-2">
								<select name="campo" class="form-control">
									<option value="all">Buscar por...</option>
									<option value="">Nome</option>
									<option value="sobrenome">Sobrenome</option>
									<option value="email">Email</option>
									<option value="cpf">CPF</option>
								</select>
							</div>
							<div class="form-group col-md-4">
								<input name="termo" type="text" class="form-control" placeholder="Buscar em clientes...">
							</div>
							<div class="form-group col-md-6">
								<button type="submit" name="buscarUsuario" class="btn btn-primary">Buscar</button>
							</div>
						</div>
					</form>
				</div>

				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Cliente</th>
							<th scope="col">Numero do pedido</th>
							<th scope="col">Situação</th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody>
						<?php

						// Verificando se as variaveis existem
						if (!empty($campo) && !empty($termo)) {
							//Buscando no banco de dados							
							$this->sql = "SELECT * FROM pedido WHERE tipo = 'adm' AND $campo LIKE '%$termo%' OR tipo = 'usuario' AND $campo LIKE '%$termo%' ";
							$this->prepara = mysqli_query($this->conexao,$this->sql);

						// Se não existe variaveis
						} else {
							// Lista todos os cadastros					
							$this->sql = "SELECT * FROM pedido";
							$this->prepara = mysqli_query($this->conexao,$this->sql);
						}

						while ($this->rs = mysqli_fetch_array($this->prepara)) {
						?>
						<tr>
							<td><?=$this->rs['fk_cliente']?></td>
							<td><?=$this->rs['numero']?></td>
							<td><?=$this->rs['situacao']?></td>
							<td>
								<form method="POST" action="index.php">
									<input type="hidden" name="id" value="<?=$this->rs['id']?>">
									<button type="submit" name="" class="btn btn-info">Editar</button>
								</form>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>


			</div>
		</div>
		<?php
	}

	public function Setores() {

			echo 'Setores aqui';

	}

	public function Busca() {

			

	}


}


?>