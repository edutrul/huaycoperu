	</div>
	<!-- / wrapper -->

	<div class="row brindar-ayuda-section red center">
		<p class="heading">Unidos somos <strong>#unasolafuerza</strong></p>
		<p>Juntos podemos dar apoyo a los que más necesitan</p>
		<a href="http://unasolafuerza.pe/" class="btn btn-large" target="_blank">Brindar ayuda</a>
	</div>

	<div class="footer row center">
		<p>Está página ha sido hecha colaborativamente en Hackspace Perú. <a href="#">CONTACTO</a></p>
	</div>

	<?php
	echo $footer_block;
	// Action::main_footer - Add items before the </body> tag
	Event::run('ushahidi_action.main_footer');
	?>

</body>
</html>
