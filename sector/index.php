<?php 

require_once ("class/core.class.php");

$sector = new Core;

if ($_SESSION['autenticado'] == "sim") {

	if (isset($_POST['home'])) {

	// Direciona para parina HOME
		$sector->Home();

	} elseif (isset($_POST['usuarios'])) {

	// Direciona para pagina Usuarios
		$sector->Usuarios();

	} elseif (isset($_POST['clientes'])) {

	// Direciona para pagina CLIENTES
		$sector->Clientes();

	} elseif (isset($_POST['usuarios'])) {

	// Direciona para pagina CLIENTES
		$sector->Usuarios();

	}
	elseif (isset($_POST['pedidos'])) {

	// Direciona para pagina PEDIDOS
		$sector->Pedidos();

	} elseif (isset($_POST['setores'])) {

	// Direciona para pagina SETORES
		$sector->Setores();

	} elseif (isset($_POST['graficos'])) {

	// Direciona para pagina GRAFICOS
		$sector->Graficos();

	} elseif (isset($_POST['sair'])) {

		$sector->logoff();

	} elseif (isset($_POST['cadastro'])) {

	// Direciona para pagina CADASTRO
		$sector->menuCadastro();

	// Capturando formulario Cliente ADD
	} elseif (isset($_POST['addCliente'])) {

	// Recebendo dados
		$cliente = $_POST['cliente'];
		$cnpj = $_POST['cnpj'];
		$email = $_POST['email'];
		$rua = $_POST['rua'];
		$numero = $_POST['numero'];
		$bairro = $_POST['bairro'];
		$cidade = $_POST['cidade'];
		$uf = $_POST['uf'];
		$cep = $_POST['cep'];
		$telefone = $_POST['telefone'];
		$ativo = $_POST['ativo'];
		$senha = 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413';

	// Criando vetores
		$table = 'cadastro';
		$set = array("tipo,", "cliente,", "cnpj,", "email,", "rua,", "numero,", "bairro,", "cidade,", "uf,", "cep,", "telefone,","ativo,","senha");
		$values = array("'cliente',", "'$cliente',", "'$cnpj',", "'$email',", "'$rua',", "'$numero',", "'$bairro',", "'$cidade',", "'$uf',", "'$cep',", "'$telefone',","'$ativo',","'$senha'");

	// Enviando ao metodo
		$sector->add($table,$set,$values);

	// Capturando formulario Usuario ADD
	} elseif (isset($_POST['addUsuario'])) {

	// Recebendo dados
		$nome = $_POST['nome'];
		$sobrenome = $_POST['sobrenome'];
		$cpf = $_POST['cpf'];
		$email = $_POST['email'];
		$senha1 = $_POST['senha1'];
		$senha2 = $_POST['senha2'];
		$tipoUsuario = $_POST['tipoUsuario'];

		if ($senha1 == $senha2) {
			$senha_crypt = hash('sha512', $senha2);
		} else {
			echo "Senhas não conferem.";
		}

	// Criando vetores
		$table = 'cadastro';
		$set = array("tipo,","nome,","sobrenome,","cpf,","email,","senha");
		$values = array("'$tipoUsuario',","'$nome',","'$sobrenome',","$cpf,","'$email',","'$senha_crypt'");

	// Enviando ao metodo
		$sector->add($table,$set,$values);

	// Capturando formulario Pedido ADD
	} elseif (isset($_POST['addPedido'])) {

	// Recebendo dados
		$fk_cliente = $_POST['fk_cliente'];
		$numero = $_POST['numero'];
		$situacao = $_POST['situacao'];
		$descricao = $_POST['descricao'];
		$qtd = $_POST['qtd'];

	// Criando vetores
		$table = 'pedido';
		$set = array("fk_cliente,","numero,","situacao,","descricao,","entrada,","qtd");
		$values = array("'$fk_cliente',","'$numero',","'$situacao',","'$descricao',","NOW(),","'$qtd'");

	// Enviando ao metodo
		$sector->add($table,$set,$values);

	// Capturando formulario Setor ADD
	} elseif (isset($_POST['addSetor'])) {

	// Recebendo dados
		$setor = $_POST['setor'];
		$telefone = $_POST['telefone'];
		$email = $_POST['email'];

	// Criando vetores
		$table = 'cadastro';
		$set = array("tipo,","setor,","telefone,","email");
		$values = array("'setor',","'$setor',","'$telefone',","'$email'");

	// Enviando ao metodo
		$sector->add($table,$set,$values);

	// Capturando formulario Cliente UPDATE
	} elseif (isset($_POST['updateCliente'])) {

	// Recebendo dados
		$id = $_POST['id'];
		$cliente = $_POST['cliente'];
		$cnpj = $_POST['cnpj'];
		$email = $_POST['email'];
		$rua = $_POST['rua'];
		$numero = $_POST['numero'];
		$bairro = $_POST['bairro'];
		$cidade = $_POST['cidade'];
		$uf = $_POST['uf'];
		$cep = $_POST['cep'];
		$telefone = $_POST['telefone'];
		$ativo = $_POST['ativo'];

	// Criando vetores
		$table = 'cadastro';
		$values = array(
			"cliente = '$cliente',",
			"cnpj = '$cnpj',",
			"email = '$email',",
			"rua = '$rua',",
			"numero = '$numero',",
			"bairro = '$bairro',",
			"cidade = '$cidade',",
			"uf = '$uf',",
			"cep = '$cep',",
			"telefone = '$telefone',",
			"ativo = $ativo"
		);

	// Enviando ao metodo
		$sector->update($table,$values,$id);

	// Capturando formulario Usuario UPDATE
	} elseif (isset($_POST['updateUsuario'])) {

	// Recebendo dados
		$id = $_POST['id'];
		$senha = $_POST['senha'];
		$nome = $_POST['nome'];
		$sobrenome = $_POST['sobrenome'];
		$cpf = $_POST['cpf'];
		$email = $_POST['email'];
		$senha1 = $_POST['senha1'];
		$senha2 = $_POST['senha2'];
		$tipo = $_POST['tipoUsuario'];

		if (isset($senha1) && isset($senha2)) {

			if ($senha1 == $senha2) {
				$senha_crypt = hash('sha512', $senha2);
			} else {
				echo "Senhas não conferem.";
			}
		} else {
			$senha_crypt = $senha;
		}

	// Criando vetores
		$table = 'cadastro';
		$values = array(
			"nome = '$nome',",
			"sobrenome = '$sobrenome',",
			"cpf = '$cpf',",
			"email = '$email',",
			"senha = '$senha_crypt',",
			"tipo = '$tipo'",
		);

	// Enviando ao metodo
		$sector->update($table,$values,$id);

	// Enviando para formulario de edição	
	} elseif (isset($_POST['editCliente'])) {

	// Recebendo dados
		$id = $_POST['id'];

	// Enviando ao metodo
		$sector->formCliente($id);

	// Enviando para formulario de edição	
	} elseif (isset($_POST['editUsuario'])) {

	// Recebendo dados
		$id = $_POST['id'];

	// Enviando ao metodo
		$sector->formUsuario($id);

	// Capturando botão de busca
	} elseif (isset($_POST['buscarCliente'])){

		// Recebendo dados
		$campo = trim($_POST['campo']);
		$termo = trim($_POST['termo']);

		// Se não selecionado...
		if ($campo == 'all') {
			$campo = "";
		}
	
		// Enviando ao metodo
		$sector->Clientes($campo,$termo);

	} elseif (isset($_POST['buscarUsuario'])) {

		// Recebendo dados
		$campo = trim($_POST['campo']);
		$termo = trim($_POST['termo']);

		// Se não selecionado...
		if ($campo == 'all') {
			$campo = "";
		}

		// Enviando ao metodo
		$sector->Usuarios($campo,$termo);

	} 

	elseif (isset($_POST['buscar'])) {

	// Recebendo dados
		$termo = trim($_POST['termo']);

	// Enviando ao metodo
		$sector->Buscar($termo);

	} else {

		$sector->Home();

	}

} else {
		$sector->loginForm();
}

?>