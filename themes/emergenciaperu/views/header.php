<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo html::specialchars($page_title.$site_name); ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- @TODO: 1) Update to translate function -->
        <!-- @TODO: 2) values should come dynamically to update in specific pages -->
        <!-- for Google -->
        <meta name="description" content="Emergencia Perú es un sitio web para reportar incidentes actuales para así otras personas esten al tanto y puedan saber en que parte del país hay accidentes, lluvia, huayco, puerto, carreteras bloqueadas y poder tomar medidas de acción apartir de estos." />
        <meta name="keywords" content="emergencia Perú, huaycos peru, huaycos, huaycoperu, FuerzaPerú, UnidosXPiura, UnaSolaFuerza" />

        <meta name="author" content="Hackspace, DevsTec, Fedex, Hackathon Lovers Latam, Hackathons en Perú, Desarrolladores Peruanos" />
        <meta name="copyright" content="" />
        <meta name="application-name" content="Emergencia Perú" />

        <!-- for Facebook -->
        <meta property="og:title" content="Emergencia Perú es un sitio web para reportar incidentes actuales para así tomar acciones #emergenciaPeru" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="http://www.emergenciaperu.com/media/img/emergenciaperu-hashtag.png" />
        <meta property="og:url" content="http://www.emergenciaperu.com" />
        <meta property="og:description" content="Emergencia Perú es un sitio web para reportar incidentes actuales para así otras personas esten al tanto y puedan saber en que parte del país hay accidentes, lluvia, huayco, puerto, carreteras bloqueadas y poder tomar medidas de acción apartir de estos." />

        <!-- for Twitter -->
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="Emergencia Perú es un sitio web para reportar incidentes actuales para así tomar acciones #emergenciaPeru" />
        <meta name="twitter:description" content="Emergencia Perú es un sitio web para reportar incidentes actuales para así otras personas esten al tanto y puedan saber en que parte del país hay accidentes, lluvia, huayco, puerto, carreteras bloqueadas y poder tomar medidas de acción apartir de estos." />
        <meta name="twitter:image" content="http://www.emergenciaperu.com/media/img/emergenciaperu-hashtag.png" />
        <?php echo $header_block; ?>
        <?php
        // Action::header_scripts - Additional Inline Scripts from Plugins
        Event::run('ushahidi_action.header_scripts');
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,500,700" rel="stylesheet">
        <!-- <link rel="stylesheet" href=""> -->
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

  <div class="emergencia-menu">
        <div class="container">
            <nav class="white row">
                <div class="nav-wrapper col s12">
                  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                  <a href="#" class="brand-logo"><img src="<?php echo url::file_loc('img'); ?>media/img/logo.png" /></a>

                  <a href="<?php echo url::site(); ?>" class="brand-logo"><img src="<?php echo url::file_loc('img'); ?>media/img/logo.png" /></a>
                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <?php nav::main_tabs($this_page, ['home','contact']); ?>
                    <li><a href="<?php echo url::site(); ?>voluntarios" class="waves-effect waves-light btn grey-text" target="_blank"><img src="<?php echo url::file_loc('img'); ?>media/img/heart-icon.png">BRINDAR AYUDA</a></li>
                  </ul>

                  <ul id="mobile-demo" class="close">
                    <?php nav::main_tabs($this_page, ['contact']); ?>
                    <li><a href="http://voluntariado.emergenciaperu.com/" class="waves-effect waves-light btn grey-text"><img src="<?php echo url::file_loc('img'); ?>media/img/heart-icon.png">BRINDAR AYUDA</a></li>
                  </ul>

                </div>
            </nav>
        </div>
    </div>

  <!-- wrapper -->
  <div class="container">
