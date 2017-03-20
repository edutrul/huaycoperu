<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<title><?php echo html::specialchars($page_title.$site_name); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- @TODO: 1) Update to translate function -->
    <!-- @TODO: 2) values should come dynamically to update in specific pages -->
    <!-- for Google -->
    <meta name="description" content="Emergencia Perú es un sitio web para reportar incidentes actuales para que así otras personas esten al tanto y puedan saber en que parte del país hay accidentes, lluvia, huayco, puerto, carreteras bloqueadas y poder tomar medidas de acción apartir de estos." />
    <meta name="keywords" content="emergencia Perú, huaycos peru, huaycos, huaycoperu, FuerzaPerú, UnidosXPiura, UnaSolaFuerza" />

    <meta name="author" content="Hackspace, DevsTec, Fedex, Hackathon Lovers Latam, Hackathons en Perú, Desarrolladores Peruanos" />
    <meta name="copyright" content="" />
    <meta name="application-name" content="Emergencia Perú" />

    <!-- for Facebook -->
    <meta property="og:title" content="Emergencia Perú es un sitio web para reportar incidentes actuales para que así tomar acciones #emergenciaPeru" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="/media/img/emergenciaperu.png" />
    <meta property="og:url" content="http://emergenciaperu.com" />
    <meta property="og:description" content="Emergencia Perú es un sitio web para reportar incidentes actuales para que así otras personas esten al tanto y puedan saber en que parte del país hay accidentes, lluvia, huayco, puerto, carreteras bloqueadas y poder tomar medidas de acción apartir de estos." />

    <!-- for Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Emergencia Perú es un sitio web para reportar incidentes actuales para que así tomar acciones #emergenciaPeru" />
    <meta name="twitter:description" content="Emergencia Perú es un sitio web para reportar incidentes actuales para que así otras personas esten al tanto y puedan saber en que parte del país hay accidentes, lluvia, huayco, puerto, carreteras bloqueadas y poder tomar medidas de acción apartir de estos." />
    <meta name="twitter:image" content="/media/img/emergenciaperu.png" />
	<?php echo $header_block; ?>
	<?php
	// Action::header_scripts - Additional Inline Scripts from Plugins
	Event::run('ushahidi_action.header_scripts');
	?>

</head>

<?php
  // Add a class to the body tag according to the page URI

  // we're on the home page
  if (count($uri_segments) == 0)
  {
  	$body_class = "page-main";
  }
  // 1st tier pages
  elseif (count($uri_segments) == 1)
  {
    $body_class = "page-".$uri_segments[0];
  }
  // 2nd tier pages... ie "/reports/submit"
  elseif (count($uri_segments) >= 2)
  {
    $body_class = "page-".$uri_segments[0]."-".$uri_segments[1];
  }
?>

<body id="page" class="<?php echo $body_class; ?>">

	<?php echo $header_nav; ?>

	<!-- wrapper -->
	<div class="wrapper floatholder rapidxwpr">

		<!-- header -->
		<div id="header">

			<!-- searchbox -->
			<div id="searchbox">

				<!-- languages -->
				<?php echo $languages;?>
				<!-- / languages -->

				<!-- searchform -->
				<?php echo $search; ?>
				<!-- / searchform -->

			</div>
			<!-- / searchbox -->

			<!-- logo -->
			<?php if ($banner == NULL): ?>
			<div id="logo">
				<h1><a href="<?php echo url::site();?>"><?php echo $site_name; ?></a></h1>
				<span><?php echo $site_tagline; ?></span>
			</div>
			<?php else: ?>
			<a href="<?php echo url::site();?>"><img src="<?php echo $banner; ?>" alt="<?php echo $site_name; ?>" /></a>
			<?php endif; ?>
			<!-- / logo -->

			<!-- submit incident -->
			<?php echo $submit_btn; ?>
			<!-- / submit incident -->

		</div>
		<!-- / header -->
        <!-- / header item for plugins -->
        <?php
            // Action::header_item - Additional items to be added by plugins
	        Event::run('ushahidi_action.header_item');
        ?>

		<!-- main body -->
		<div id="middle">
			<div class="background layoutleft">

				<!-- mainmenu -->
				<div id="mainmenu" class="clearingfix">
					<ul>
						<?php nav::main_tabs($this_page); ?>
					</ul>

					<?php if ($allow_feed == 1) { ?>
					<div class="feedicon"><a href="<?php echo url::site(); ?>feed/"><img alt="<?php echo html::escape(Kohana::lang('ui_main.rss')); ?>" src="<?php echo url::file_loc('img'); ?>media/img/icon-feed.png" style="vertical-align: middle;" border="0" /></a></div>
					<?php } ?>

				</div>
				<!-- / mainmenu -->
