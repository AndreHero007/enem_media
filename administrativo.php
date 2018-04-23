





<style>a{color:red;} </style>
<?php
session_start();
if(!empty($_SESSION['id'])){
	echo "<menu>.Olá ".$_SESSION['nome'].", Bem vindo <br>"."</menu>";
	echo "<menu>.<a href='sair.php' >Sair</a>"."</menu>";
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");	
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Media ENEM</title>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header id="TOPO">
            <center><h1>MÉDIA ENEM</h1>
            <h4>Médias ENEM na UFT</h4></center>
        </header>
          
        <main id="IMCMain">
            
            <div class="eixo">
            <form method="get">
                
                <center><br>NOTA REDAÇÂO <input type="number" name="re" id="re" required="true"  ></center>
                <center><br>NOTA CIÊNCIAS DA NATUREZA <input type="number" name="cn" id="cn" required="true"></center>
          <center><br>NOTA CIÊNCIAS HUMANAS<input type="number" name="ch" id="ch" required="true" ></center>
          <center><br>NOTA LINGUAGENS<input type="number" name="li" id="li" required="true"></center>
          <center><br>NOTA MATEMÁTICA<input type="number" name="ma" id="ma" required="true" ></center>
          <center><br><input type="submit" name="Calcular" id="Calcular"></center>
          <center><input type="reset" name="reset" id="reset"><br></center>
          
          <center><a href="historico.php" style="color: black">Ver histórico</a></center>
          
            </form>
                
                <?php
                if(isset($_GET['Calcular'])){
                    
                $id_usuario=$_SESSION['id'];
                $RED=$_GET['re'];
                $CN=$_GET['cn'];
                $CH=$_GET['ch'];
                $LI=$_GET['li'];
                $MAT=$_GET['ma'];
                
                $nome=$_SESSION['nome'];
                
                
                
                $mediaARQ=(($RED*1 + $CN*1 + $CH*2 + $LI*4 + $MAT*4)/12);
echo "<p>"."$nome a sua media em arquitetura é: ".number_format( $mediaARQ , 3, ',', '')."</p>";

$mediaDIR=(($RED*1 + $CN*1 + $CH*4 + $LI*4 + $MAT*2)/12);
echo "<p>"."$nome a sua media em direito é: ".number_format( $mediaDIR , 3, ',', '')."</p>";

$mediaENF=(($RED*1 + $CN*4 + $CH*1 + $LI*4 + $MAT*3)/13);
echo "<p>"."$nome a sua media em enfermagem é: ".number_format( $mediaENF , 3, ',', '')."</p>";

$mediaENG_CIV=(($RED*1 + $CN*4 + $CH*1 + $LI*3 + $MAT*4)/13);
echo "<p>"."$nome a sua media em engenharia civil é: ".number_format( $mediaENG_CIV , 3, ',', '')."</p>";

$mediaMED=(($RED*3 + $CN*4 + $CH*2 + $LI*3 + $MAT*2)/14);
echo "<p>"."$nome a sua media em medicina é: ".number_format( $mediaMED , 3, ',', '')."</p>";



# Conexão com o banco de dados
$conexao = mysqli_connect('localhost','root','') or die("Erro de conexão");
$banco = mysqli_select_db($conexao,'historico_notas') or die("Erro ao selecionar o banco de dados");



$in = mysqli_query($conexao,"insert into notas (id_usuario,red,cn,ch,li,mat,arquitetura,direito,enfermagem,eng_civ,medicina)"
        . "values ($id_usuario,$RED,$CN,$CH,$LI,$MAT,$mediaARQ,$mediaDIR,$mediaENF,$mediaENG_CIV,$mediaMED)") or die("Erro");



                }
                ?>
                
            </div>
      
            
        </main>
        
        <footer id="Rodape">
            
        </footer>
    </body>
</html>