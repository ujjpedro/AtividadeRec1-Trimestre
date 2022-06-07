<!DOCTYPE html>

<?php
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$lado = isset($_GET['lado']) ? $_GET['lado'] : 0;
$cor = isset($_GET['cor']) ? $_GET['cor'] : "";
$tabuleiro_idTabuleiro = isset($_GET['tabuleiro_idTabuleiro']) ? $_GET['tabuleiro_idTabuleiro'] : 0;
?>

<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça o seu Quadrado</title>
    
    <style>
        .quadradinho{
            /* position: absolute;
            margin-left: 50%; */
            background-color: <?php echo $cor?>;
            width: <?php echo $lado?>vh;
            height: <?php echo $lado?>vh;
        }
    </style>

</head>
<body>

<?php
require_once "menu.php";
?>

<div class="container-fluid">
<br>
<h3>O seu Quadrado</h3><hr><br>




<?php  
            if ($acao = "salvar") {
                require_once "Quadrado.class.php";

                $quadrado = new Quadrado($id,$lado,$cor,$tabuleiro_idTabuleiro);
                echo $quadrado;
            }
?>

<div class="quadradinho"></div>

<br>

</body>
</html>