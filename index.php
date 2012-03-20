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
				) 
			);
		?>
		</div>
		<div class="span4">
			<?php //echo Eventish::load('views/content/bullets'); ?>
			<h2>Come Join Us!</h2>
			<p>
				<?php echo Eventish::load('views/content/register_button');?>
			</p>
			<h2>Who's Going?</h2>
			<ul class="attendees">
			<?php foreach($e->event->attendees as $v)
			{
				?>
				<li class="attendee">
						<?php
							echo '<img src="'.Gravatar_helper::from_email($v['attendee']['email']).'" /><br />';
							echo $v['attendee']['first_name'] . ' ' . $v['attendee']['last_name'];
						?>
				</li>
				<?php
			}
			?>
			</ul>
		</div>
    </div><!--/row-->
</div><!--/.fluid-container-->
<?php echo Eventish::load('views/template/footer');?>
<?php echo Eventish::load('views/template/js');?>
</body>
</html>
