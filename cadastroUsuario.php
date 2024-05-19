<?php
  include 'conectarBancoDados.php';
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="cssNew.css" rel="stylesheet" >
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="jvNew.js"></script>
<link href="assets/img/eventos.png" rel="icon">

<!------ Include the above in your HEAD tag ---------->

<?php

	if(ISSET($_POST['nome'])){

		$query = (
			"
				INSERT INTO tbl_usuario(
					nome, 
					documento, 
					dtNascimento, 
					profissao, 
					email, 
					senha, 
					sobreMim, 
					telefone) VALUES (
						'".@$_POST['nome']."',
						'".@$_POST['documento']."',
						'".@$_POST['dtnascimento']."',
						'".@$_POST['prof']."',
						'".@$_POST['email']."',
						'".@$_POST['password']."',
						'".@$_POST['sobremim']."',
						'".@$_POST['dtnascimento']."')
			"
		);
		$result = $conn->query($query);
		echo(
			'
				<div class="alert alert-success" role="alert">
				Cadastro concluído com sucesso!
				</div>
			'
		);
	}
?>

<div class="login-reg-panel">
							
		<div class="register-info-box">
			<h2 style="color: white;">Boas Vindas</h2>
			<p style="color: white;">Cadastro de Novos Parceiros!</p>
			<input type="radio" name="active-log-panel" id="log-login-show">
		</div>
							
		<div class="white-panelNew">
			<div class="login-show">
				<h2>Cadastro de Parceiro</h2>
                <form action="cadastroUsuario.php" method="POST">
                    <input type="text" placeholder="Nome" id="nome" name="nome" required>
					<input type="text" placeholder="CPF/CNPJ" id="documento" name="documento" required>
					<input type="text" placeholder="Profissão" id="prof" name="prof" required>
					<input type="text" placeholder="Whatsapp - Formato: 11900000000" id="whatsapp" name="whatsapp" required>
					<input type="text" placeholder="Sobre Mim" id="sobremim" name="sobremim" required>
					<input type="text" placeholder="Email" id="email" name="email" required>
                    <input type="password" placeholder="Password" id="password" name="password" required>
					<label value = "Data de Nascimento">Data de Nascimento</label>
					</br>
					<input type="date" placeholder="Data de Nascimento" id="dtnascimento" name="dtnascimento" required>
					</br></br>
                    <input type="submit" class="btn btn-primary" value="Login">
                </form>
			</div>
		</div>
	</div>