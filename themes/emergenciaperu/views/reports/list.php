<?php
/**
 * View file for updating the reports display
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author     Ushahidi Team - http://www.ushahidi.com
 * @package    Ushahidi - http://source.ushahididev.com
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL) 
 */
?>
		<!-- Top reportbox section-->
		<div class="rb_nav-controls r-5">
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>
						<ul class="link-toggle report-list-toggle lt-icons-and-text">
							<li class="active"><a href="#rb_list-view" class="list btn red"><i class="material-icons left">toc</i> <?php echo Kohana::lang('ui_main.list'); ?></a></li>
							<li><a href="#rb_map-view" class="map btn red"><i class="material-icons left">language</i> <?php echo Kohana::lang('ui_main.map'); ?></a></li>
						</ul>
					</td>
					<td><?php echo $pagination; ?></td>
					<td><?php echo $stats_breadcrumb; ?></td>
					<td class="last">
						<ul class="link-toggle lt-icons-only">
							<?php //@todo Toggle the status of these links depending on the current page ?>
							<li><a href="#page_<?php echo $previous_page; ?>" class="prev"><i class="material-icons">chevron_left</i></a></li>
							<li><a href="#page_<?php echo $next_page; ?>" class="next"><i class="material-icons">chevron_right</i></a></li>
						</ul>
					</td>
				</tr>
			</table>
		</div>
		<!-- /Top reportbox section-->
		
		<!-- Report listing -->
		<div class="r_cat_tooltip"><a href="#" class="r-3"></a></div>
		<div class="rb_list-and-map-box">
			<div id="rb_list-view">
			<?php
				foreach ($incidents as $incident)
				{
					$incident_id = $incident->incident_id;
					$incident_title = $incident->incident_title;
					$incident_description = $incident->incident_description;
					$incident_url = Incident_Model::get_url($incident_id);
					//$incident_category = $incident->incident_category;
					// Trim to 150 characters without cutting words
					// XXX: Perhaps delcare 150 as constant

					$incident_description = text::limit_chars(html::strip_tags($incident_description), 140, "...", true);
					$incident_date = date('H:i M d, Y', strtotime($incident->incident_date));
					//$incident_time = date('H:i', strtotime($incident->incident_date));
					$location_id = $incident->location_id;
					$location_name = $incident->location_name;
					$incident_verified = $incident->incident_verified;

					if ($incident_verified)
					{
						$incident_verified = '<span class="r_verified new badge red">'.Kohana::lang('ui_main.verified').'</span>';
						$incident_verified_class = "verified";
					}
					else
					{
						$incident_verified = '<span class="r_unverified new badge red">'.Kohana::lang('ui_main.unverified').'</span>';
						$incident_verified_class = "unverified";
					}

					$comment_count = ORM::Factory('comment')->where('incident_id', $incident_id)->count_all();

					$incident_thumb = url::file_loc('img')."media/img/report-thumb-default.jpg";
					$media = ORM::Factory('media')->where('incident_id', $incident_id)->find_all();
					if ($media->count())
					{
						foreach ($media as $photo)
						{
							if ($photo->media_thumb)
							{ // Get the first thumb
								$incident_thumb = url::convert_uploaded_to_abs($photo->media_thumb);
								break;
							}
						}
					}
				?>
				<div class="card horizontal">
				<div class="card-image">
					<p class="r_photo"> <a href="<?php echo $incident_url; ?>">
						<img alt="<?php echo html::escape($incident_title); ?>" src="<?php echo $incident_thumb; ?>" /> </a>
					</p>

					<!-- Only show this if the report has a video -->
					<p class="r_video" style="display:none;"><a href="#"><?php echo Kohana::lang('ui_main.video'); ?></a></p>

					<?php
					// Action::report_extra_media - Add items to the report list in the media section
					Event::run('ushahidi_action.report_extra_media', $incident_id);
					?>
				</div>
				<div class="card-stacked">
					<div class="card-content">
						<h3><a class="r_title" href="<?php echo $incident_url; ?>">
								<?php echo html::escape($incident_title); ?>
							</a>
							<a href="<?php echo "$incident_url#discussion"; ?>" class="r_comments"> <i class="material-icons tiny">chat_bubble</i>
								<?php echo $comment_count; ?></a> 
								<?php echo $incident_verified; ?>
							</h3>

						<p class="r_date r-3 bottom-cap"><i class="material-icons tiny">query_builder</i> <?php echo $incident_date; ?></p>
						<div class="r_description"> <?php echo $incident_description; ?>  
						  <a class="btn-show btn-more" href="#incident_<?php echo $incident_id ?>"><?php echo Kohana::lang('ui_main.more_information'); ?> &raquo;</a> 
						  <a class="btn-show btn-less" href="#incident_<?php echo $incident_id ?>">&laquo; <?php echo Kohana::lang('ui_main.less_information'); ?></a> 
						</div>
						<p class="r_location"><i class="material-icons tiny">location_on</i><a href="<?php echo url::site("reports/?l=$location_id"); ?>"><?php echo html::specialchars($location_name); ?></a></p>
						<?php
						// Action::report_extra_details - Add items to the report list details section
						Event::run('ushahidi_action.report_extra_details', $incident_id);
						?>
					</div>
				</div>
				</div>
			<?php } ?>
			</div>
			<div id="rb_map-view">
			</div>
		</div>
		<!-- /Report listing -->
		
		<!-- Bottom paginator -->
		<div class="rb_nav-controls r-5">
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>
						<ul class="link-toggle report-list-toggle lt-icons-and-text">
							<li class="active"><a href="#rb_list-view" class="list btn red"><i class="material-icons left">toc</i> <?php echo Kohana::lang('ui_main.list'); ?></a></li>
							<li><a href="#rb_map-view" class="map btn red"><i class="material-icons left">language</i> <?php echo Kohana::lang('ui_main.map'); ?></a></li>
						</ul>
					</td>
					<td><?php echo $pagination; ?></td>
					<td><?php echo $stats_breadcrumb; ?></td>
					<td class="last">
						<ul class="link-toggle lt-icons-only">
							<?php //@todo Toggle the status of these links depending on the current page ?>
							<li><a href="#page_<?php echo $previous_page; ?>" class="prev"><i class="material-icons">chevron_left</i></a></li>
							<li><a href="#page_<?php echo $next_page; ?>" class="next"><i class="material-icons">chevron_right</i></a></li>
						</ul>
					</td>
				</tr>
			</table>
		</div>
		<!-- /Bottom paginator -->
	        