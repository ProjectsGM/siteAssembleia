<?php

$RANKING = "select equipe.nome as nome_equipe, prova.nome , sum(pontuacao.pontuacao) as pontuacao, vencedores.equipe from vencedores, pontuacao, equipe, prova
                where vencedores.pontuacao = pontuacao.idpontuacao
                and vencedores.equipe = equipe.idequipe
                and vencedores.prova = prova.idprova  group by equipe.nome order by pontuacao.pontuacao DESC";

$RANKING2 = "select equipe.nome as nome_equipe, equipe.congregacao, prova.nome as nome_prova, pontuacao.pontuacao from vencedores, pontuacao, equipe, prova
where vencedores.pontuacao = pontuacao.idpontuacao
and vencedores.equipe = equipe.idequipe
and vencedores.prova = prova.idprova order by nome_equipe";

$SQL_2 = "select equipe.nome as nome_equipe, equipe.congregacao, prova.nome as nome_prova,vencedores.prova, pontuacao.pontuacao, vencedores.equipe from vencedores, pontuacao, equipe, prova
where vencedores.pontuacao = pontuacao.idpontuacao
and vencedores.equipe = equipe.idequipe
and vencedores.prova = prova.idprova 
and vencedores.equipe =";

$SQL_EQUIPES = "select * from equipe";

$SQL_PROVAS = "SELECT * FROM prova";

$SQL_POSICAO = "SELECT * FROM pontuacao";

$SQL_DELETE = "DELETE FROM vencedores";
?>