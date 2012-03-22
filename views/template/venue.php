<script type="text/javascript">
window.onload = function(){
	show_map(36.152941, -86.779987);
}
</script>
<div id="map_canvas"></div>
<br />
<p>
	Starts at 
	<?php 
		$date = new DateTime($starts);
		echo date_format($date, 'g:ia \o\n l jS F Y');
	?>.

	Hosted by:
</p>
<p>
	<strong><?php echo $venue['name']; ?></strong><br />
	<?php echo $venue['address'] . ' ' . $venue['address_2'];?><br />
	<?php echo $venue['city'] . ', ' . $venue['region'];?>
</p>
