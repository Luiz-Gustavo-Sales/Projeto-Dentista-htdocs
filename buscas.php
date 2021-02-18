<?php
  if ($_POST['lnk']=="cid"){
  $cidades = resultados($_POST['lnk'],$_POST['tp']);
  foreach ($cidades['cidades'] as $cidade) { echo '<option value="'.$cidade['codigoCidade'].'">'.$cidade['nomeCidade'].'</option>'; }
} else if ($_POST['lnk']=="bar"){
  $bairros = resultados($_POST['lnk'],$_POST['tp']);
  foreach ($bairros['bairros'] as $bairro) { echo '<option value="'.$bairro['codigoBairro'].'">'.$bairro['nomeBairro'].'</option>'; }
} else if ($_POST['lnk']=="den"){
  $dentistas = dentistas($_POST['n'],$_POST['e'],$_POST['c'],$_POST['b'],$_POST['m'],$_POST['p']);
  foreach ($dentistas['dentistas'] as $dentista) { 
    echo '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding-top:10px;"><div style="border: 3px solid #ccc;padding:0px 10px; "><strong>'.$dentista['nome'].'<br />CRO '.$dentista['cro'].'</strong><br />'.$dentista['razaoSocialClinica'].'<br />'.$dentista['razaoSocialClinica'].'<br /><strong>FONE: </strong>';
      foreach($dentista['telefonesDentista'] as $telefone){
        echo $telefone;
      }
      echo'<br /><strong>ENDEREÇO: </strong>'.$dentista['nomeLogradouroClinica'].', '.$dentista['numeroLogradouroClinica'].'<br />'.$dentista['bairroClinica'].', '.$dentista['cidadeClinica'].', '.$dentista['ufClinica'].'<br />CEP: '.$dentista['cepClinica'].'<br /><strong>ESPECIALISTA EM: </strong><br />'.$dentista['especialidadeDentista'].'<br /><strong>ÁREAS DE ATUAÇÃO: </strong><br />'.$dentista['areaAtuacao'].'<hr style="height:2px;background:#ccc"><button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#mapas">Ver Mapa</button><button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#planos">Planos</button><hr style="height:2px;background:#ccc"><em>Dados atualizados em '.$dentista['dataInclusaoSistema'].'</em></div></div>';
  }
}
function resultados($link,$tp) {
  //$bas = "https://sio-teste.fswise.com.br/Crown/api/dentistas/estados"; $est = $bas."Crown/app/dentistas/estados"; $cid = $bas."Crown/app/dentistas/cidades"; $bar = $bas."Crown/app/dentistas/bairros"; $esp = $bas."Crown/app/dentistas/especialidades";
  switch($link) { case 'est': $url = $est; break; case 'cid': $url = $cid."/".$tp; break; case "bar": $url = $bar."/".$tp; break; case "esp": $url = $esp; break; case "den": $url = $den; break; }
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,$url); curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE); $output = curl_exec($ch); curl_close($ch); $result = json_decode($output,true); return $result;
}
function dentistas($n,$e,$c,$b,$p) {
  $t = 0;
  if($t==0 && ($n!="" || $e!="" || $c!="" || $b!="" || $p!="")){$i="?";$t=1;}
  if($t==1){$a="&";}
  if($n!=""){$nm = $i.$a."nome=".$n;}
  if($e!=""){$et = $i.$a."codigoEstado=".$e;}
  if($c!=""){$cd = $i.$a."codigoCidade=".$c;}
  if($b!=""){$br = $i.$a."codigoBairro=".$b;}
  if($p!=""){$ep = $i.$a."especialidade=".$p;}
  $bas = "http://wise.no-ip.info:1418/"; $den = $bas."Crown/app/dentistas";$url = $den.$nm.$et.$cd.$br.$ep;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,$url); curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE); $output = curl_exec($ch); curl_close($ch); $result = json_decode($output,true); return $result;
}
?>