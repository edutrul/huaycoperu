
</div>
<div class="ayuda-incidencia">
    <div class="row">
        <div class="ayuda-content">
            <h5>Ayuda a que la ayuda llegue.</h5>
            <h4>Informa si estás en una zona con una situación de emergencia o que necesita apoyo.</h4>
            <form action="/reports/submit" method="get">
              <?php foreach (category::get_category_tree_data() as $category): ?>
                  <p>
                      <input class="with-gap red" name="incident-categories[]" type="checkbox" id="category-<?php print $category['category_id']; ?>" value="<?php print $category['category_id']; ?>" />
                      <label for="category-<?php print $category['category_id']; ?>"><?php print $category['category_title']; ?></label>
                  </p>
              <?php endforeach; ?>
                <button class="btn btn-large red">ENVIAR INCIDENCIA</button>
            </form>
            <p class="informa-ayuda">Informa responsablemente.</p>
        </div>
    </div>
</div>

	<!-- wrapper -->
	<div class="container">
	<?php if ($site_message != ''): ?>
		<div class="green-box">
			<h3><?php echo $site_message; ?></h3>
		</div>
	<?php endif; ?>

<div class="row incidencias">

		<!-- content column -->
		<div class="col m8">
				<?php								
				// Map and Timeline Blocks
				echo $div_map;
				echo $div_timeline;
				?>
		</div>
		<!-- / content column -->

		<!-- right column -->
		<div class="col m4">

			<h5>Incidencias reportadas</h5>
			
			<?php
			// Action::main_sidebar_pre_filters - Add Items to the Entry Page before filters
			Event::run('ushahidi_action.main_sidebar_pre_filters');
			?>

			<!-- category filters -->
			<div class="cat-filters clearingfix">
				<strong>
					<?php echo Kohana::lang('ui_main.category_filter');?>
				</strong>
			</div>

			<ul id="category_switch" class="category-filters">
				<?php
				$color_css = 'class="category-icon swatch" style="background-color:#'.$default_map_all.'"';
				$all_cat_image = '';
				if ($default_map_all_icon != NULL)
				{
					$all_cat_image = html::image(array(
						'src'=>$default_map_all_icon
					));
					$color_css = 'class="category-icon"';
				}
				?>
				<li>
					<a class="active" id="cat_0" href="#">
						<span <?php echo $color_css; ?>><?php echo $all_cat_image; ?></span>
						<span class="category-title"><?php echo Kohana::lang('ui_main.all_categories');?></span>
					</a>
				</li>
				<?php
					foreach ($categories as $category => $category_info)
					{
						$category_title = html::escape($category_info[0]);
						$category_color = $category_info[1];
						$category_image = ($category_info[2] != NULL)
						    ? url::convert_uploaded_to_abs($category_info[2])
						    : NULL;
						$category_description = html::escape(Category_Lang_Model::category_description($category));

						$color_css = 'class="category-icon swatch" style="background-color:#'.$category_color.'"';
						if ($category_info[2] != NULL)
						{
							$category_image = html::image(array(
								'src'=>$category_image,
								));
							$color_css = 'class="category-icon"';
						}

						echo '<li>'
						    . '<a href="#" id="cat_'. $category .'" title="'.$category_description.'">'
						    . '<span '.$color_css.'>'.$category_image.'</span>'
						    . '<span class="category-title">'.$category_title.'</span>'
						    . '</a>';

						// Get Children
						echo '<div class="hide" id="child_'. $category .'">';
						if (sizeof($category_info[3]) != 0)
						{
							echo '<ul>';
							foreach ($category_info[3] as $child => $child_info)
							{
								$child_title = html::escape($child_info[0]);
								$child_color = $child_info[1];
								$child_image = ($child_info[2] != NULL)
								    ? url::convert_uploaded_to_abs($child_info[2])
								    : NULL;
								$child_description = html::escape(Category_Lang_Model::category_description($child));
								
								$color_css = 'class="category-icon swatch" style="background-color:#'.$child_color.'"';
								if ($child_info[2] != NULL)
								{
									$child_image = html::image(array(
										'src' => $child_image
									));

									$color_css = 'class="category-icon"';
								}

								echo '<li>'
								    . '<a href="#" id="cat_'. $child .'" title="'.$child_description.'">'
								    . '<span '.$color_css.'>'.$child_image.'</span>'
								    . '<span class="category-title">'.$child_title.'</span>'
								    . '</a>'
								    . '</li>';
							}
							echo '</ul>';
						}
						echo '</div></li>';
					}
				?>
			</ul>
			<!-- / category filters -->

			<?php if ($layers): ?>
				<!-- Layers (KML/KMZ) -->
				<div class="layers-filters clearingfix">
					<strong><?php echo Kohana::lang('ui_main.layers_filter');?> 
						<span>

							[<a href="javascript:toggleLayer('kml_switch_link', 'kml_switch')" id="kml_switch_link">
								<?php echo Kohana::lang('ui_main.hide'); ?>
							</a>]
						</span>
                  </strong>
              </div>
              <ul id="kml_switch" class="category-filters">
                <?php
                foreach ($layers as $layer => $layer_info)
                {
                  $layer_name = $layer_info[0];
                  $layer_color = $layer_info[1];
                  $layer_url = $layer_info[2];
                  $layer_file = $layer_info[3];

                  $layer_link = ( ! $layer_url)
                    ? url::base().Kohana::config('upload.relative_directory').'/'.$layer_file
                    : $layer_url;

                  echo '<li>'
                    . '<a href="#" id="layer_'. $layer .'">'
                    . '<span class="swatch" style="background-color:#'.$layer_color.'"></span>'
                    . '<span class="layer-name">'.$layer_name.'</span>'
                    . '</a>'
                    . '</li>';
                }
                ?>
              </ul>
              <!-- /Layers -->
          <?php endif; ?>

          <?php
          // Action::main_sidebar_post_filters - Add Items to the Entry Page after filters
          Event::run('ushahidi_action.main_sidebar_post_filters');
          ?>

            <br />

            <!-- additional content -->
          <?php if (Kohana::config('settings.allow_reports')): ?>
              <div class="how-to-report additional-content grey lighten-4">
                  <h5><?php echo Kohana::lang('ui_main.how_to_report'); ?></h5>

                  <div class="how-to-report-methods">

                      <!-- Web Form -->
                      <div class="web-form">
                        <?php echo Kohana::lang('ui_main.report_option_4'); ?> <a href="<?php echo url::site().'reports/submit/'; ?>">aquí
                          </a>
                      </div>

                      <!-- Twitter -->
                    <?php if ( ! empty($twitter_hashtag_array)): ?>
                        <div class="twitter">
                            <strong><?php echo Kohana::lang('ui_main.report_option_3'); ?>:</strong><br/>
                          <?php foreach ($twitter_hashtag_array as $twitter_hashtag): ?>
                              <span>#<?php echo $twitter_hashtag; ?></span>
                            <?php if ($twitter_hashtag != end($twitter_hashtag_array)): ?>
                                  <br />
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                  </div>

              </div>
          <?php endif; ?>

            <!-- / additional content -->

          <?php
          // Action::main_sidebar - Add Items to the Entry Page Sidebar
          Event::run('ushahidi_action.main_sidebar');
          ?>

        </div>
        <!-- / right column -->

    </div>

    <!-- content -->
    <div class="row">

        <!-- content blocks -->
        <div class="col s12">
            <ul class="content-column">
              <?php blocks::render(); ?>
            </ul>
        </div>
        <!-- /content blocks -->

    </div>
    <!-- content -->