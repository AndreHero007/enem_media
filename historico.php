






<?php
session_start();
if(!empty($_SESSION['id'])){
	echo "Olá ".$_SESSION['nome'].", Bem vindo <br>";
	echo "<a href='sair.php'>Sair</a>";
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");	
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Histórico de cálculos</title>
        <link href="css/css2.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header id="TOPO">
            <center><h1>MÉDIA ENEM</h1>
            <h4>Veja o histórico de seus outros cálculos</h4></center>
            <h5><a href="administrativo.php">Clique aqui</a> para voltar</h5>
        </header>
          
        <main id="IMCMain">
            
            <div class="eixo">

                
            
                <?php
                $id_usuario=$_SESSION['id'];
$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "historico_notas";
// conexão e seleção do banco de dados
$con = mysqlI_connect($servidor, $usuario, $senha, $dbname);
// executa a consulta
$sql = "SELECT * FROM notas where id_usuario=$id_usuario";
$res = mysqli_query($con, $sql);
// conta o número de registros
$total = mysqli_num_rows($res);


// loop pelos registros
while ($f = mysqli_fetch_array($res))
{
echo
    
"<nav>".
"ID da consulta: ".$f['ID']."<br>".      
"Arquitetura: ".$f['arquitetura']."<br>".
"direito: ".$f['direito']."<br>".
"enfermagem: ".$f['enfermagem']."<br>".
"eng_civ: ".$f['eng_civ']."<br>".
"medicina: ".$f['medicina']."<br>".
"</nav>";

}
mysqli_close($con);
           













                
                ?>
                </div>
            
        </main>
        
        <footer id="Rodape">
            
        </footer>
    </body>
</html>