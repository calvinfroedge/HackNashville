<?php 
include('lib/eventish.php');
$config = include('config.php');
$e = Eventish::instance($config);
echo Eventish::load('views/template/head');

?>
<body>
<?php echo Eventish::load('views/template/topbar', array(
		'title' => $e->event->title,
		'starts' => $e->event->start_date
	)
);
?>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span8">
		<?php 
			echo Eventish::load('views/template/content', 
				array(
					'url' => $config['url'],
					'description' => $e->event->description,
					'bullets' => Eventish::load('views/content/bullets')
				) 
			);
		?>
		</div>
		<div class="span4">
			<h2>Who's Going?</h2>
		</span>
    </div><!--/row-->
</div><!--/.fluid-container-->
<?php echo Eventish::load('views/template/footer');?>
<?php echo Eventish::load('views/template/js');?>
</body>
</html>
