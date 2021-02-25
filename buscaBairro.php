<?php
//    $teste1= $_POST["tp"];
//    echo $teste1;
 //========listar BAIRROS==========
 //valor setado manual
$CODcidade=88412;
 $url="https://sio-teste.fswise.com.br/Crown/api/dentistas/bairros/$CODcidade";
 $ch= curl_init($url);
 curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
   $resultado= json_decode(curl_exec($ch));


?>



<select name="bairroDentista_a" class="form-control" id="bairroDentista_a" required="required" disabled>
<?php 
foreach($resultado->bairros as $bairro){
?>                   
<option value="<?php echo $bairro->codigoBairro?>" selected="selected"><?php echo $bairro->nomeBairro ?></option>
<?php
 }
?>
</select>
<script type="text/javascript" src="dentistas.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
       

 
 