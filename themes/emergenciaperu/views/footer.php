	</div>
	<!-- / wrapper -->

	<div class="row brindar-ayuda-section red center">
		<p class="heading">Unidos somos <strong>#unasolafuerza</strong></p>
		<p>Juntos podemos dar apoyo a los que más necesitan</p>
		<a href="#" class="btn btn-large"><img src="<?php echo url::file_loc('img'); ?>media/img/heart-icon-white.png"  srcset="<?php echo url::file_loc('img'); ?>media/img/heart-icon-white@2x.png 2x"> Brindar ayuda</a>
	</div>

	<?php
	echo $footer_block;
	// Action::main_footer - Add items before the </body> tag
	Event::run('ushahidi_action.main_footer');
	?>

</body>
</html>
