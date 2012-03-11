<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
    	<div class="container-fluid">
        	<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
          	</a>
          	<a class="brand" href="#"><?php echo $title;?></a>
			<span class="pull-right" style="color:#fff;">
			Starts at 
			<?php 
				$date = new DateTime($starts);
				echo date_format($date, 'g:ia \o\n l jS F Y');
			?>
			</span>
        </div>
	</div>
</div>
