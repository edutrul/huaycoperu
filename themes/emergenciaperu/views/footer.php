	</div>
	<!-- / wrapper -->

	<div class="row brindar-ayuda-section red center">
		<p class="heading">Unidos somos <strong>#unasolafuerza</strong></p>
		<p>Juntos podemos dar apoyo a los que más necesitan</p>
		<a href="http://voluntariado.emergenciaperu.com/" class="btn btn-large" target="_blank">Brindar ayuda</a>
	</div>

	<div class="footer center">
		<div class="footer-redes-sociales">	
			<a href="https://www.facebook.com/groups/emergenciaperu/" target=>
				<img src="<?php echo url::file_loc('img'); ?>media/img/facebook.png"" alt="Grupo de Facebook">
			</a>

			<a href="https://github.com/edutrul/huaycoperu" target="_blank">
				<img src="<?php echo url::file_loc('img'); ?>media/img/github.png"" alt="Github del proyecto">
			</a>

			<a href="https://twitter.com/search?f=tweets&amp;q=%23UnaSolaFuerza&amp;src=typd" target="_blank">
				<img src="<?php echo url::file_loc('img'); ?>media/img/twitter.png"" alt="# Oficial">
			</a>
		</div>
	</div>

	<?php
	echo $footer_block;
	// Action::main_footer - Add items before the </body> tag
	Event::run('ushahidi_action.main_footer');
	?>
	<script type="text/javascript">
		$(".button-collapse").click(function() {
			$(this).toggleClass('main-nav__button--open');
		  $("#mobile-demo").slideToggle('100');

		});
		
		var lineAnimation = function (el) {
			var $item = $(el);
			var item_l = $item.position().left;
			var item_w = $item.outerWidth();

			$(".main-nav__line").css({
				left: item_l,
				width: item_w	
			});
		};


        $(".main-nav__link").hover(
			function () {
			    lineAnimation(this);
			},
			function() {
			   lineAnimation(".main-nav__link--active");
			}
	    );

	</script>
</body>
</html>
