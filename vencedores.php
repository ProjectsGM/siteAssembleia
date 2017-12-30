<?php
   include("conexao.php");
   include("scripts.php");
   
  if(isset($_POST["cbEquipe"])){
   $titulo = $_POST["cbEquipe"];
    $fonte = $_POST["cbProva"];
    $autor = $_POST["cbPosicao"];
    
     if( ($titulo == "0") || ($fonte == "0") || ($autor == "0") ){
        echo "<script>alert('Preencha Todas as Informações');</script>";
        echo "<script>window.location = 'vencedores.php';</script>";
        exit;
    } else {
     
$SQL = "INSERT INTO vencedores (equipe, prova, colocacao, pontuacao)";
$SQL .= " VALUES('".$titulo."', '".$fonte."', ".$autor.", ".$autor.")";
$query = mysqli_query($conn, $SQL);
        
        if(mysqli_affected_rows($conn) > 0){
            echo "<script>alert('Cadastro Realizado com Sucesso!');</script>";
            echo "<script>window.location = 'vencedores.php';</script>";
        } else {
            echo "<script>alert('Erro ao Cadastrar <br> Tente novamente!');</script>";
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
      <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Theme CSS -->
      <link href="../css/freelancer.min.css" rel="stylesheet">      
      <link href="../css/ranking.css" rel="stylesheet">
      <!-- Custom Fonts -->
      <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
                      <a href="../index.php">Voltar a Tela Principal</a>
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
                  <div class="row">
                     <div class="col-25 intro-text">
                         <span class="skills">Equipe</span>
                     </div>
                     <div class="col-75">
                         <select id="cbEquipe" name="cbEquipe" id="cbEquipe" style="color:black" >
                             <option value="0">Selecione</option>
                           <?php
                              $query = mysqli_query ($conn, $SQL_EQUIPES);
                              while($exibir = mysqli_fetch_array($query)){
                              ?>
                           <option style="color:black" value="<?php echo $exibir["idequipe"] ?>"><?php echo $exibir["nome"] ?> - <?php echo $exibir["congregacao"] ?></option>
                           <?php
                              };
                              ?>
                        </select>
                     </div>
                  </div>
                   <div class="row">
                      <div class="col-25 intro-text">
                         <span class="skills">Prova</span>
                     </div>
                     <div class="col-75">
                        <select id="cbProva" name="cbProva" id="cbProva" style="color:black">
                           <option value="0">Selecione</option>
                           <?php
                              $query = mysqli_query ($conn, $SQL_PROVAS);
                              while($exibir = mysqli_fetch_array($query)){
                              ?>
                           <option style="color:black" value="<?php echo $exibir["idprova"] ?>"><?php echo $exibir["nome"] ?> - <?php echo $exibir["descricao"] ?></option>
                           <?php
                              };
                              ?>
                        </select>
                     </div>
                  </div>
                  <div class="row">
                       <div class="col-25 intro-text">
                         <span class="skills">Posição</span>
                     </div>
                     <div class="col-75">
                         <select id="cbPosicao" name="cbPosicao" id="cbPosicao" style="color:black">
                           <option value="0" >Selecione</option>
                           <?php
                              $query = mysqli_query ($conn, $SQL_POSICAO);
                              while($exibir = mysqli_fetch_array($query)){
                              ?>
                           <option style="color:black" value="<?php echo $exibir["idpontuacao"] ?>"><?php echo $exibir["idpontuacao"] ?> - <?php echo $exibir["pontuacao"] ?> Pts</option>
                           <?php
                              };
                              ?>
                        </select>
                     </div>
                  </div> 
                     <hr class="star-light">
                    <div class="row">
                      <div class="col-lg-8 col-lg-offset-2 text-center">
                           <input type="submit" class="btn btn-lg btn-outline" value="Inserir">
                           <input type="reset" class="btn btn-lg btn-outline" value="Limpar">
                      </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </header>
     <section id="portfolio">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 text-center">
                  <h2>Ranking Atualizado</h2>
                  <hr class="star-primary">
               </div>
            </div>
            <div class="row">
              <div style="overflow-x:auto;">
                 <table>
                    <?php
                       $SQL = $RANKING;
                       $query = mysqli_query ($conn, $SQL);
                       while($exibir = mysqli_fetch_array($query)){
                       ?>
                    <button class="accordion"><?php echo $exibir["nome_equipe"] ?><br><?php echo $exibir["pontuacao"] ?> Pontos</button>
                    <div class="panel">
                       <?php
                            $SQL2 = $SQL_2.$exibir['equipe'].";";
                            $query2 = mysqli_query ($conn, $SQL2);
                            while($exibir2 = mysqli_fetch_array($query2)){
                            ?>
                        
                       <ul class="list-inline item-details">
                          <li>
                              <strong>Prova:</strong> 
                              <?php echo $exibir2["nome_prova"] ?>
                          </li>
                          <li>
                              <strong>Pontuação da Prova:</strong>
                              <?php echo $exibir2["pontuacao"] ?>
                          </li>
                          <li style="float: right">   
                              <button><a onclick="{let isBoss = confirm('Deseja Realmente Apagar este Registro?'); if(isBoss == true) {href='apagar.php?haha=<?php echo $exibir2["equipe"] ?>&hehe=<?php echo $exibir2["prova"] ?>'}}" >Apagar</a></button>
                          </li>
                       </ul>
                       <?php
                          };
                          ?>
                    </div>
                    <?php
                       };
                       ?>
                 </table>
              </div>   
               
            </div>
         </div>
      </section>
      <!-- About Section -->
      <section class="success" id="about">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 text-center">
                  <h2>Calendário de Eventos</h2>
                  <!--<hr class="star-light">-->
               </div>
            </div>
            <div class="row">
               
              
            </div>
            <div class="col-lg-8 col-lg-offset-2 text-center">
               <a href="https://drive.google.com/uc?id=0B0s9LGC-6ROmRWtvRks5TnIxSHdUejc5VC1STjdCbHNfT0U4&export=download" class="btn btn-lg btn-outline">
               <i class="fa fa-download"></i> Download Escalas
               </a>
            </div>
      </section>
      <!-- Contact Section -->
    
      <!-- Footer -->
      <footer class="text-center">
         <div class="footer-above">
           
         </div>
         <div class="footer-below">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     Williams Santos - 81 9 96923165<ul class="list-inline">
                          <li>
                              <a href="https://www.facebook.com/gutoleao.augusto" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                          </li>
                          <li>
                              <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                          </li>
                          <li>
                              <a href="https://www.instagram.com/gutoleao2/" class="btn-social btn-outline"><i class="fa fa-fw fa-instagram"></i></a>
                          </li>
                          
                      </ul>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
      <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
         <a class="btn btn-primary" href="#page-top">
         <i class="fa fa-chevron-up"></i>
         </a>
      </div>
      <!-- Portfolio Modals -->
      <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
               <div class="lr">
                  <div class="rl">
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 col-lg-offset-2">
                     <div class="modal-body">
                        <h2>Teams</h2>
                        <hr class="star-primary">
                        <img src="../img/portfolio/cabin.png" class="img-responsive img-centered" alt="">
                        <?php
                           $SQL2 = $RANKING2;
                           $query2 = mysqli_query ($conn, $SQL2);
                           while($exibir2 = mysqli_fetch_array($query2)){
                           ?>
                        <ul class="list-inline item-details">
                           <li><strong>Nome:</strong>
                              <strong><a><?php echo $exibir2["nome_equipe"] ?></a>
                              </strong> 
                           </li>
                           <li><strong>Congregação:</strong> 
                              <strong><a><?php echo $exibir2["congregacao"] ?></a>
                              </strong>
                           </li>
                           <li><strong>Pontuação Atual:</strong>
                              <strong><a><?php echo $exibir2["pontuacao"] ?></a>
                              </strong>
                           </li>
                        </ul>
                        <?php
                           };
                           ?>                        
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>      
      <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
               <div class="lr">
                  <div class="rl">
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 col-lg-offset-2">
                     <div class="modal-body">
                        <h2>Project Title</h2>
                        <hr class="star-primary">
                        <img src="img/portfolio/submarine.png" class="img-responsive img-centered" alt="">
                        <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                        <ul class="list-inline item-details">
                           <li>Client:
                              <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                              </strong>
                           </li>
                           <li>Date:
                              <strong><a href="http://startbootstrap.com">April 2014</a>
                              </strong>
                           </li>
                           <li>Service:
                              <strong><a href="http://startbootstrap.com">Web Development</a>
                              </strong>
                           </li>
                        </ul>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="../vendor/jquery/jquery.min.js"></script>
      <!-- Bootstrap Core JavaScript -->
      <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
      <!-- Plugin JavaScript -->
      <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
      <!-- Contact Form JavaScript -->
      <script src="../js/jqBootstrapValidation.js"></script>
      <script src="../js/contact_me.js"></script>
      <!-- Theme JavaScript -->
      <script src="../js/freelancer.min.js"></script>
      <script src="../js/ranking.js"></script>
      
<!-- CSS FORMULARIO DE CADASTRO -->
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

   </body>
</html>