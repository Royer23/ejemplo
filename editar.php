<?php
include "conexion.inc.php";
$ci="";$nombre="";$paterno="";
session_start();

$_SESSION["edicion"]="NO";
if (isset($_GET["ci"]))
{
$ci=$_GET["ci"];
$resultado = mysqli_query($con, "select * from alumno where ci='".$ci."'");
$fila = mysqli_fetch_array($resultado);
$ci=$fila['ci'];
$nombre=$fila['nombre'];
$paterno=$fila['paterno'];
$_SESSION["edicion"]="SI";
}
?>
<form action="guardar.php" method="GET">
	CI	<input type="text" name="ci" value="<?php echo $ci;?>" <?php if($ci!=""){?>readonly="readonly"<?php } ?>/><br>
	Nombre <input type="text" name="nombre" value="<?php echo $nombre;?>"/><br>
	Paterno <input type="text" name="paterno" value="<?php echo $paterno;?>"/><br>
	<input type="hidden" name="Edicion" value="<?php echo $_SESSION["edicion"]; ?>"/>
	<input type="submit" name="Aceptar" value="Aceptar"/>
	<input type="submit" name="Cancelar" value="Cancelar"/>
</form>