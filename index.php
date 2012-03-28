<?php 
include('lib/eventish.php');
$config = include('config.php');
$e = Eventish::instance($config);
echo Eventish::load('views/template/head', array('title' => $e->event->title));

?>
<body>
<?php echo Eventish::load('views/template/topbar', array(
		'title' => $e->event->title
	)
);
?>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span8">
			<h2>Hacking > Sleep.</h2>
			<?php 
				echo Eventish::load('views/template/content', 
					array(
						'url' => $config['url'],
						'description' => $e->event->description,
					) 
				);
			?>
			<?php echo Eventish::load('views/content/organizers');?>
			<hr />
			<?php echo Eventish::load('views/content/supporters');?>
		</div>
		<div class="span4">
			<h2>Come Join Us!</h2>
			<?php
				echo Eventish::load('views/template/venue',
					array(
						'venue' => $e->event->venue,
						'starts' => $e->event->start_date
					)
				);
			?>
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
