<?php
    include '../back/classes/Locacao.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="pt/br" dir="ltr">
<head>
    <link rel="icon" href="https://image.flaticon.com/icons/png/512/73/73705.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style/estilo.css">
    <meta charset="utf-8">
    <title>Valida RG</title>
</head>

<body>
    <section>
        <a href="index.html"><i class="  material-icons">arrow_back</i></a>
        <form method="POST">
            <br>
            <input type="text" name="rg" placeholder="Digite seu RG" required>
            <?php 
                if (isset($_POST['rg'])){
                    $l = new Locacao;
                    if ($l->validaRg($_POST['rg']) == false){
                        $_SESSION['validaRG'] = "rg n cadastrado";
                    } else if($l->verificaLocacoesAluno() == false){
                        $_SESSION['validaRG'] = "Aluno já possui 3 livros alugados";
                    } else{
                        header('location: locacao.php');
                    }
                }
                if(isset($_SESSION['validaRG'])){
                    echo "<br>".$_SESSION['validaRG']."<br>";
                    unset($_SESSION['validaRG']);
                }
            ?>
            <button>Enviar</button>
        </form>
    </section>
</body>

</html>