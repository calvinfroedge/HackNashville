<?php
include('lib/eventish.php');
$config = include('config.php');
$e = Eventish::instance($config);
echo Eventish::load('views/template/head', array('title' => $e->event->title));
?>
<script type="text/javascript">
window.onload = function(){
	show_map(36.152718, -86.779286);
}
</script>
<h1>Parking Lot</h1>
<div id="map_canvas"></div>
<?php echo Eventish::load('views/template/footer');?>
<?php echo Eventish::load('views/template/js');?>
</body>
</html>