<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="cssNew.css" rel="stylesheet" >
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="jvNew.js"></script>
<link href="assets/img/eventos.png" rel="icon">
<!------ Include the above in your HEAD tag ---------->

<?php
    include 'conectarBancoDados.php';
    $sql = "SELECT * FROM tbl_usuario WHERE email = '".@$_POST['email']."' AND senha = '".@$_POST['password']."'";
    $result = $conn->query($sql);
    if(ISSET($_POST['email'])){
        if ($result->num_rows > 0){
            $row = $result->fetch_assoc();
            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['prof'] = $row['profissao'];
            header("Location: areaLogada.php");
            exit; // Certifique-se de sair do script após o redirecionamento
        }else{
            echo('
                <div class="alert alert-danger" role="alert">
                    Usuário ou senha inválidos!
                </div>        
            ');
        }
    }

?>

<div class="login-reg-panel">
							
		<div class="register-info-box">
			<h2 style="color: white;">Ainda não é um dos nossos parceiros?</h2>
			<p style="color: white;">Agiliza e vem com a gente!</p>
			<a href="cadastroUsuario.php"><label style="color: white;" id="label-login">Criar minha conta!</label></a>
			<input type="radio" name="active-log-panel" id="log-login-show">
		</div>
							
		<div class="white-panel">
			<div class="login-show">
				<h2>LOGIN</h2>
                <form action="login.php" method="POST">
                    <input type="text" placeholder="Email" id="email" name="email">
                    <input type="password" placeholder="Password" id="password" name="password">
                    <input type="submit" class="btn btn-primary" value="Login">
                </form>
			</div>
		</div>
	</div>