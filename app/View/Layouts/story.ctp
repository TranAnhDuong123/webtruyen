<!DOCTYPE html>
<html lang="en">
    <?php echo $this->element('story/head');?>
    <body>
		<div id="wrapper" class="container">
			<?php echo $this->element('story/menu');?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<script src="themes/js/common.js"></script>
		<script src="themes/js/jquery.flexslider-min.js"></script>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>
    </body>
</html>