<?php
  if($_SESSION["isLogged"]==true){
?>
<script type="text/javascript">setTtle("p1"); </script>
<h1>Pagina 1</h1>
<?php
}else{
  ?>
<script type="text/javascript">
  document.location="./";
</script>
<?php
}

?>
