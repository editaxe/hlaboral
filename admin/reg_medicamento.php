﻿<?php $serguridad_pagina = 1; ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<?php include_once('../admin/01_modulo_diseno_superior.php'); ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
<?php include_once('../admin/02_modulo_estilo_css.php'); ?>
<link href="../estilo_css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
</head>
<body id="pageBody">
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php include_once('../seguridad/seguridad_diseno_plantillas.php'); ?>
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php //$pagina = addslashes($_GET['pagina']); ?>
<div id="contentOuterSeparator"></div>
<div class="container">
<div class="divPanel page-content">

<div class="breadcrumbs">
<a href="#"><h4>Registrar Medicamento&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
<a href="../admin/lista_medicamento.php">Lista de Medicamentos</h4></a>
</div>
<hr>
<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<script type="text/javascript" src="../js/jquery-1.3.2.js"></script>
<script type="text/javascript">
$(document).ready(function() {	
$('#nombre_medicamento').blur(function(){
$('#Info').html('<img src="../imagenes/loader.gif" alt="" />').fadeOut(1000);
var nombre_medicamento = $(this).val();		
var dataString = 'nombre_medicamento='+nombre_medicamento;
$.ajax({ type: "GET", url: "validar_medicamento.php", data: dataString, success: function(data) { $('#Info').fadeIn(1000).html(data); } }); }); });    
</script>
<?php
$pagina = $_SERVER['PHP_SELF'];
?>
<form name="formulario_insersion" accept-charset="utf-8" method="post" action="../admin/reg_medicamento_reg.php">
<fieldset>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<div id="Info"></div>
<table border="1" class="table table-responsive">
	<thead>
		<tr>
			<th>NOMBRE MEDICAMENTO</th>
			<th>TIPO DE HISTORIA CLINICA</th>
			<th>POS</th>
			<th>ESTADO</th>
		</tr></thead>
    <tbody>
    	<tr>
<td><input class="input-block-level" id="nombre_medicamento" name="nombre_medicamento" type="text" value="" required autofocus/></td>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<td><select name="cod_tipo_historia_clinica" class="selectpicker" data-show-subtext="true" data-live-search="true">
<?php if (isset($cod_tipo_historia_clinica)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_tipo_historia_clinica, nombre_tipo_historia_clinica FROM tipo_historia_clinica ORDER BY cod_tipo_historia_clinica ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_tipo_historia_clinica) and $cod_tipo_historia_clinica == $datos2['cod_tipo_historia_clinica']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_tipo_historia_clinica'];
$nombre = $datos2['nombre_tipo_historia_clinica'];
echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?></select></td>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<td><select name="cod_tipo_pos" class="selectpicker" data-show-subtext="true" data-live-search="true">
<?php if (isset($cod_tipo_pos)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_tipo_pos, nombre_tipo_pos FROM tipo_pos ORDER BY cod_tipo_pos ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_tipo_pos) and $cod_tipo_pos == $datos2['cod_tipo_pos']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_tipo_pos'];
$nombre = $datos2['nombre_tipo_pos'];
echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?></select></td>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<td><select name="cod_estado" class="selectpicker" data-show-subtext="true" data-live-search="true">
<?php if (isset($cod_estado)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_estado, nombre_estado FROM estado ORDER BY cod_estado ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_estado) and $cod_estado == $datos2['cod_estado']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_estado'];
$nombre = $datos2['nombre_estado'];
echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?></select></td>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    	</tr>
    	</tbody>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table border="1" class="table table-responsive">
	<thead>
		<tr>
			<th>PRINCIPIO ACTIVO</th>
			<th>CONCENTRACIÓN</th>
			<th>FORMA</th>
			<th>ACLARACIÓN</th>
			<th>CODIGO ATC</th>
		</tr></thead>
    <tbody>
    	<tr>
<td><input class="input-block-level" name="principio_activo" type="text" value=""/></td>
<td><input class="input-block-level" name="concentracion" type="text" value=""/></td>
<td><input class="input-block-level" name="forma" type="text" value=""/></td>
<td><input class="input-block-level" name="aclaracion" type="text" value=""/></td>
<td><input class="input-block-level" name="cod_atc" type="text" value=""/></td>
    	</tr>
    	</tbody>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<input type="hidden" name="pagina" value="<?php echo $pagina ?>">
<input type="hidden" name="insersion" value="formulario_de_insersion">
<hr>
<div class="actions">
<input type="submit" value="Registrar Información" name="submit" id="submitButton" class="btn btn-info pull-center" title="Click aqui para enviar" />
</div>
</fieldset>
</form>
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* FIN MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
</div>
<!--End Main Content Area-->
</div>
<div id="footerInnerSeparator"></div>
</div>
</div>
<!-- 1******************************************************* MODULO FOOTER *********************************************** -->
<?php include_once('../admin/04_modulo_footer.php'); ?>
<!-- 1******************************************************* MODULO FOOTER *********************************************** -->
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->
<?php include_once('../admin/05_modulo_js.php'); ?>
<script src="../js/bootstrap-select.min.js" type="text/javascript"></script>
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->

</body>
</html>