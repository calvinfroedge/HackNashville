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
			<P><STRONG>By Hackers. For Hackers.</STRONG></P>
<P><a href="https://twitter.com/#!/calvinfroedge" target="_blank">Calvin Froedge</a>, <a href="https://twitter.com/#!/averyfisher" target="_blank">Avery Fisher</a>, <a href="https://twitter.com/#!/jaminguy" target="_blank">Jamin Guy</a> &amp; <a href="https://twitter.com/#!/benstucki" target="_blank">Ben Stucki</a> just wanted to collaborate on a hackothon project, but it turned out that they had to create the event first. With the help of FLO Thinkery they found the space (and internet) for Nashville's first coders only event. The idea is simple - come with a neglected side project, hang out with other hackers, grab some free food (from sponsors that probably want to hire you), and show-off your progress when it's done. No rules. No pitches. No suits!</P>
		</div>
		<div class="span4">
			<?php //echo Eventish::load('views/content/bullets'); ?>
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
