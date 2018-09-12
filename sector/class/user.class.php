<?php

class User {

	// Autenticação de usuario ------------------------------------------------------------------------
	public function autenticar() {


		// Fazer login
		if (isset($_POST['email']) && isset($_POST['senha'])) {

			// Verificar preenchimento
			if (!empty($_POST['email']) && !empty($_POST['senha'])) {

			// Receber dados
				$email = trim($_POST['email']);
				$senha = trim($_POST['senha']);

				// Criptografar senha
				$senha_crypt = hash('sha512', $senha);

				// Verificar se o email existe no banco de dados
				$this->sql = "SELECT count(*) FROM cadastro WHERE email = '$email'";
				$this->prepara = mysqli_query($this->conexao,$this->sql);
				$this->rs = mysqli_fetch_array($this->prepara);

				if ($this->rs['count(*)'] > 0) {

					$this->sql = "SELECT id, nome, tipo FROM cadastro WHERE email = '$email' AND senha = '$senha_crypt'";
					$this->prepara = mysqli_query($this->conexao,$this->sql);
					$this->rs = mysqli_fetch_array($this->prepara);
					$total = mysqli_num_rows($this->prepara);

					if ($total > 0) {

						// Criar sessão de autenticação
						$_SESSION['autenticado'] = "sim";
						$_SESSION['id'] = $this->rs['id'];
						$_SESSION['nome'] = $this->rs['nome'];
						$_SESSION['tipo'] = $this->rs['tipo'];

						// Direcionar
						header("location: index.php");

					} else {
						// MSG erro de senha invalida
						echo '<p class="alert alert-danger">Senha inválida!</p>';
					}

				} else {
					// MSG erro de email invalido
					echo '<p class="alert alert-danger">Email não cadastrado!</p>';
				}

			} else {
				// MSG erro de campos vazios
				echo '<p class="alert alert-danger">Digite email e senha para acessar!</p>';
			}
		}

	}

	public function logoff(){

		// Destruindo sessão
		session_destroy();
		// Iniciando nova sessão
		session_start();

		// Direcionar
		header("location: index.php");

	}

}

?>