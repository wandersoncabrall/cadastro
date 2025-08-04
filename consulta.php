<?php

include_once("conexao.php");

$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";

$sql = "select * from usuarios where profissao like '%$filtro%'order by nome ";
$consulta = mysqli_query ($conexao,$sql);
$registros = mysqli_num_rows($consulta);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convenio sistema</title>
    <link rel="stylesheet" href="_css/estilo.css">
</head>
<body>
    <div class=container>
        <nav>
        <ul class=menu>
        <a href="index.php"><li>Cadastro</li><a/>
        <a href="consulta.php"><li>Consultas</li><a/>
        </ul>

        </nav>
        <section>
        <h1>Consultas</h1>
        <hr><br><br>

        <form method="get" action="">
            filtra por profisssao : <input type = text name="filtro" classs="campo" require autofocus>
            <input type="submit" value ="Pesquisar" class="btn">
        </Form>

        <?php
        print "Resultado da pesquisa com a palavra <strong>$filtro</strong>. <br> <br>";
        print "$registros registros encontrados.";
        print "<br><br><br>";
        
        while ($exibirRegistros= mysqli_fetch_array($consulta)){

        $codigo = $exibirRegistros[0];
        $nome = $exibirRegistros[1];
        $email = $exibirRegistros[2];
        $profissao = $exibirRegistros[3];
        print "<article>";
        print "$codigo<br>";
        print "$nome<br>";
        print "$email<br>";
        print "$profissao";

        print"</article>";

    }
        mysqli_close($conexao);

        ?>
        
    </section>
    </div>
    
</body>
</html>