	</div>
	<!-- / wrapper -->

	<div class="row brindar-ayuda-section red center">
		<p class="heading">Unidos somos <strong>#unasolafuerza</strong></p>
		<p>Juntos podemos dar apoyo a los que más necesitan</p>
		<a href="<?php echo url::site(); ?>voluntarios" class="btn btn-large" target="_blank">Brindar ayuda</a>
	</div>

	<div class="footer row center">
		<a href="https://www.facebook.com/groups/emergenciaperu/" target="_blank" style="
    padding: 5px;
"><img src="http://www.emergenciaperu.com/themes/emergenciaperu/images/icons/facebook-4-48.png" alt="Grupo de Facebook" style="
    height: 48px;
    width: 48px;
"></a>
		<a href="https://github.com/edutrul/huaycoperu" target="_blank" style="
    padding: 5px;
"><img src="http://www.emergenciaperu.com/themes/emergenciaperu/images/icons/github-10-48.png" alt="Github del proyecto" style="
    height: 48px;
    width: 48px;
"></a>
		<a href="https://twitter.com/search?f=tweets&q=%23UnaSolaFuerza&src=typd" target="_blank" style="
    padding: 5px;
"><img src="http://www.emergenciaperu.com/themes/emergenciaperu/images/icons/twitter-4-48.png" alt="# Oficial" style="
    height: 48px;
    width: 48px;
"></a>

	<?php if ($site_copyright_statement != ''): ?>
  		<p><?php echo $site_copyright_statement; ?></p>
      	<?php endif; ?>
	</div>

	<?php
	echo $footer_block;
	// Action::main_footer - Add items before the </body> tag
	Event::run('ushahidi_action.main_footer');
	?>
	<script type="text/javascript">
		$(".button-collapse").click(function() {
		  $("#mobile-demo").slideToggle('100');

		});
	</script>
</body>
</html>
