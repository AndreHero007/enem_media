<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Login</title>
                <link href="css/css_login.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
        <center><h2>Área restrita</h2></center>
		<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>
                <div class="eixo">
		<form method="POST" action="valida.php">
			<center><label>Usuário</label></center>
			<center><input type="text" name="usuario" placeholder="Digite o seu usuário" required="true"></center><br><br>
			
			<center><label>Senha</label></center>
			<center><input type="password" name="senha" placeholder="Digite a sua senha" required="true"></center><br><br>
			
                            <center><input type="submit" name="btnLogin" value="Acessar"></center>
		Não é cadastrado? <a href="cadastrar.php" style="color: orange;">Clique aqui</a> para cadastrar
		</form>
                </div>

	</body>
</html>