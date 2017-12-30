<?php
   include("conexao.php");
   include("scripts.php");  

   
  if(isset($_POST["cbEquipe"])){
   $titulo = $_POST["cbEquipe"];
    $fonte = $_POST["cbProva"];
    $autor = $_POST["cbPosicao"];
    
     if( ($titulo == "0") || ($fonte == "0") || ($autor == "0") ){
        echo "<script>alert('Preencha as informações corretamente..');</script>";
        echo "<script>window.location = 'vencedores.php';</script>";
        exit;
    } else {
     
$SQL = "INSERT INTO vencedores (equipe, prova, colocacao, pontuacao)";
$SQL .= " VALUES('".$titulo."', '".$fonte."', ".$autor.", ".$autor.")";
$query = mysqli_query($conn, $SQL);
        
        if(mysqli_affected_rows($conn) > 0){
            echo "<script>alert('News cadastrada com sucesso.');</script>";
            echo "<script>window.location = 'vencedores.php';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar a news.');</script>";
            echo "<script>window.location = 'vencedores.php';</script>";
        }
    }
}
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
      
      <meta name="description" content="">
      <meta name="author" content="">
      <title>PROJFÉRIAS 2018 - IEAD PE</title>
      <!-- Bootstrap Core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Theme CSS -->
      <link href="css/freelancer.min.css" rel="stylesheet">
      <!-- Calendário CSS -->
      <link href="css/calendario.css" rel="stylesheet">
      <link href="css/ranking.css" rel="stylesheet">
      <!-- Custom Fonts -->
      <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body id="page-top" class="index">
      <!-- Navigation -->
      <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
         <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
               <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
               </button>
               <a class="navbar-brand" href="#page-top">#PROJFÉRIAS 2018</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav navbar-right">
                  
                  <li class="page-scroll">
                      <a href="vencedores.php">Voltar</a>
                  </li>                  
               </ul>
            </div>
            <!-- /.navbar-collapse -->
         </div>
         <!-- /.container-fluid -->
      </nav>
      <!-- Header -->
    <header>
      <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="intro-text">
               <span class="name">CADASTROS</span>
               <hr class="star-light">
               <span class="skills">Indique as Equipes Vencedoras de cada Prova</span>   
                <hr class="star-light">
            </div>
            <div class="col-lg-8 col-lg-offset-2 text-center" >
                <form action="vencedores.php" class="col" name="frm_cadastro" method="POST">
                    <?php // busca dados e atribui ao formulário
   if(isset($_GET["equipe"])){
       if(is_numeric($_GET["equipe"])){
           $SQLTESTE = "select equipe.nome as nome_equipe, equipe.congregacao, prova.nome as nome_prova, pontuacao.pontuacao, vencedores.equipe from vencedores, pontuacao, equipe, prova
where vencedores.pontuacao = pontuacao.idpontuacao
and vencedores.equipe = equipe.idequipe
and vencedores.prova = prova.idprova 
and vencedores.equipe =".$_GET["equipe"];
           $executa = mysqli_query($conn, $SQLTESTE);
           $resultado = mysqli_fetch_array($executa);
       ?>
                  <div class="row">
                     <div class="col-25 intro-text">
                         <span class="skills">Equipe</span>
                     </div>
                     <?php echo $exibir["nome_equipe"] ?>
                     <hr class="star-light">
                    <div class="row">
                      <div class="col-lg-8 col-lg-offset-2 text-center">
                           <input type="submit" class="btn btn-lg btn-outline" value="Inserir">
                           <input type="reset" class="btn btn-lg btn-outline" value="Limpar">
                      </div>
                  </div>
                     <?php }
   } ?>
               </form>
            </div>
         </div>
      </div>
   </header>
     
   </body>
   <style>
* {
    box-sizing: border-box;
}

input[type=text], select, textarea{
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    resize: vertical;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] {
   /** background-color: #4CAF50;
    color: white;
    padding: 6px 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}
**/}
.containerGT {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

.col-25 {
    float: left;
    width: 15%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}
</style>
</html>