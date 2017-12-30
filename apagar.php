<?php
include 'conexao.php';
if(is_numeric($_GET["haha"])){
    
    $SQL = "DELETE FROM vencedores WHERE vencedores.equipe = ".$_GET["haha"]." and vencedores.prova =".$_GET["hehe"].";";
    $query = mysqli_query($conn, $SQL);
    if(mysqli_affected_rows($conn) > 0){
            echo "<script>alert('Registro Deletado com Sucesso!');</script>";
            echo "<script>window.location = 'vencedores.php';</script>";
        } else {
            echo "<script>alert('Erro ao Apagar Registro - Tente novamente!');</script>";
            echo "<script>window.location = 'vencedores.php';</script>";
        }
}
?>
