		<div id="container">
		 <!-- Example row of columns -->
      <div class="row">
        <div class="span4">
          <h3>Who can Submit?</h3>
           <p>Anyone can. Any Information about Organizations working to help Women and Children in Distress can be submitted to the site. You are an Individual (Journalist, Lawyer, Activist, Concerned Citizen) or a Group of Friends and wish to be contacted by those who are in need of help.</p>
        </div>
        <div class="span4">
          <h3>How to Fill this Form?</h3>
           <p>Please Provide us with as <strong>much details as possible</strong>. If you are representing an Organization and have an Office, provide us with a detailed <strong>Location</strong> so that we can map it map the location accurately. Be sure to add <strong>Contact Numbers</strong> and Email Addresses to the descrition.</p>
        </div>
        <div class="span4">
          <div class="alert alert-success">
         <h3>CALL +91 - 22 - 61245805</h3>
      </div>
<p><strong>Leave a Voice Message</strong> with details about Yourself/Organization, What type of help will be provided and ways to contact you. We will add this Information to the Site and Include the Recording. Please provide as much information as possible.</p>
        </div>
      </div>

</div>		

<div id="content">
	<div class="content-bg">

		<?php if ($site_submit_report_message != ''): ?>
			<div class="green-box" style="margin: 25px 25px 0px 25px">
				<h3><?php echo $site_submit_report_message; ?></h3>
			</div>
		<?php endif; ?>

		<!-- start report form block -->
		<?php print form::open(NULL, array('enctype' => 'multipart/form-data', 'id' => 'reportForm', 'name' => 'reportForm', 'class' => 'gen_forms')); ?>
		<input type="hidden" name="latitude" id="latitude" value="<?php echo $form['latitude']; ?>">
		<input type="hidden" name="longitude" id="longitude" value="<?php echo $form['longitude']; ?>">
		<input type="hidden" name="country_name" id="country_name" value="<?php echo $form['country_name']; ?>" />
		<input type="hidden" name="incident_zoom" id="incident_zoom" value="<?php echo $form['incident_zoom']; ?>" />
		<div class="big-block">
			<h2>Submit Helpline Information</h2>
			<?php if ($form_error): ?>
			<!-- red-box -->
			<div class="red-box">
				<h3>Error!</h3>
				<ul>
					<?php
						foreach ($errors as $error_item => $error_description)
						{
							// print "<li>" . $error_description . "</li>";
							print (!$error_description) ? '' : "<li>" . $error_description . "</li>";
						}
					?>
				</ul>
			</div>
			<?php endif; ?>
			<div class="row">
				<input type="hidden" name="form_id" id="form_id" value="<?php echo $id?>">
			</div>
			<div class="report_left">
				<div class="report_row">
					<?php if(count($forms) > 1){ ?>
					<div class="row">
						<h4><span><?php echo Kohana::lang('ui_main.select_form_type');?></span>
						<span class="sel-holder">
							<?php print form::dropdown('form_id', $forms, $form['form_id'],
						' onchange="formSwitch(this.options[this.selectedIndex].value, \''.$id.'\')"') ?>
						</span>
						<div id="form_loader" style="float:left;"></div>
						</h4>
					</div>
					<?php } ?>
					<h4><i class="icon-volume-down"></i>&nbsp;Title<span class="required">*</span></h4>
					<?php print form::input('incident_title', $form['incident_title'], ' class="text long"'); ?>
				</div>
				<div class="report_row">
					<h4><i class="icon-pencil"></i>&nbsp;Description<span class="required">*</span><br /><span class="example">Provide Information About the Organization/Group, Contact Persons, What type of Help is provided and other details.</span></h4>
					<?php print form::textarea('incident_description', $form['incident_description'], ' rows="10" class="textarea long" ') ?>
				</div>
				<div class="report_row">
					<h4><i class="icon-map-marker"></i>&nbsp;Location<span class="required">*</span><br /><span class="example">Provide detailed location, address to help us map it more accurately.</span></h4>
					<?php print form::input('location_name', $form['location_name'], ' class="text long"'); ?>
				</div>
				
					
				<div class="report_row">
					<h4><i class="icon-flag"></i>&nbsp;<?php echo Kohana::lang('ui_main.reports_categories'); ?> <span class="required">*</span><br /><span class="example">You can choose Multiple Categories.</span></h4>
					<div class="report_category" id="categories">
					<?php
						$selected_categories = (!empty($form['incident_category']) AND is_array($form['incident_category']))
							? $selected_categories = $form['incident_category']
							: array();
							
						$columns = 2;
						echo category::tree($categories, $selected_categories, 'incident_category', $columns);
						?>
					</div>
				</div>


				<?php
				// Action::report_form - Runs right after the report categories
				Event::run('ushahidi_action.report_form');
				?>

					<div class="report_row" id="datetime_default">
					<h4><i class="icon-time"></i>
						<a href="#" id="date_toggle" class="show-more"><?php echo Kohana::lang('ui_main.modify_date'); ?></a>
						<?php echo Kohana::lang('ui_main.date_time'); ?>: 
						<?php echo Kohana::lang('ui_main.today_at')." "."<span id='current_time'>".$form['incident_hour']
							.":".$form['incident_minute']." ".$form['incident_ampm']."</span>"; ?>
						<?php if($site_timezone != NULL): ?>
							<small>(<?php echo $site_timezone; ?>)</small>
						<?php endif; ?>
					</h4>
				</div>
				
				<div class="report_row hide" id="datetime_edit">
					<div class="date-box">
						<h4><?php echo Kohana::lang('ui_main.reports_date'); ?></h4>
						<?php print form::input('incident_date', $form['incident_date'], ' class="text short"'); ?>
						<script type="text/javascript">
							$().ready(function() {
								$("#incident_date").datepicker({ 
									showOn: "both", 
									buttonImage: "<?php echo url::file_loc('img'); ?>media/img/icon-calendar.gif", 
									buttonImageOnly: true 
								});
							});
						</script>
					</div>
					<div class="time">
						<h4><?php echo Kohana::lang('ui_main.reports_time'); ?></h4>
						<?php
							for ($i=1; $i <= 12 ; $i++)
							{ 
								$hour_array[sprintf("%02d", $i)] = sprintf("%02d", $i);	 // Add Leading Zero
							}
							for ($j=0; $j <= 59 ; $j++)
							{ 
								$minute_array[sprintf("%02d", $j)] = sprintf("%02d", $j);	// Add Leading Zero
							}
							$ampm_array = array('pm'=>'pm','am'=>'am');
							print form::dropdown('incident_hour',$hour_array,$form['incident_hour']);
							print '<span class="dots">:</span>';
							print form::dropdown('incident_minute',$minute_array,$form['incident_minute']);
							print '<span class="dots">:</span>';
							print form::dropdown('incident_ampm',$ampm_array,$form['incident_ampm']);
						?>
						<?php if ($site_timezone != NULL): ?>
							<small>(<?php echo $site_timezone; ?>)</small>
						<?php endif; ?>
					</div>
					<div style="clear:both; display:block;" id="incident_date_time"></div>
				</div>
				

			

				
			</div>
			
			<div class="report_right">
							<div class="well">
							<h3><?php echo Kohana::lang('ui_main.reports_optional'); ?></h3>
							<hr />
				<!-- News Fields -->
				<div id="divNews" class="report_row">
					<h4><i class="icon-file"></i>&nbsp;News/Website Link<br /><span class="example">Link to your Blog, Website, other Online Sources</span></h4>
					<?php
						$this_div = "divNews";
						$this_field = "incident_news";
						$this_startid = "news_id";
						$this_field_type = "text";
						if (empty($form[$this_field]))
						{
							$i = 1;
							print "<div class=\"report_row\">";
							print form::input($this_field . '[]', '', ' class="text long2"');
							print "<a href=\"#\" class=\"add\" onClick=\"addFormField('$this_div','$this_field','$this_startid','$this_field_type'); return false;\">add</a>";
							print "</div>";
						}
						else
						{
							$i = 0;
							foreach ($form[$this_field] as $value) {
							print "<div class=\"report_row\" id=\"$i\">\n";

							print form::input($this_field . '[]', $value, ' class="text long2"');
							print "<a href=\"#\" class=\"add\" onClick=\"addFormField('$this_div','$this_field','$this_startid','$this_field_type'); return false;\">add</a>";
							if ($i != 0)
							{
								print "<a href=\"#\" class=\"rem\"	onClick='removeFormField(\"#" . $this_field . "_" . $i . "\"); return false;'>remove</a>";
							}
							print "</div>\n";
							$i++;
						}
					}
					print "<input type=\"hidden\" name=\"$this_startid\" value=\"$i\" id=\"$this_startid\">";
				?>
				</div>


				<!-- Video Fields -->
				<div id="divVideo" class="report_row">
					<h4><i class="icon-facetime-video"></i>&nbsp;Video Links<br /><span class="example">URL of YouTube, Vimeo Videos for your report</span></h4>
					<?php
						$this_div = "divVideo";
						$this_field = "incident_video";
						$this_startid = "video_id";
						$this_field_type = "text";

						if (empty($form[$this_field]))
						{
							$i = 1;
							print "<div class=\"report_row\">";
							print form::input($this_field . '[]', '', ' class="text long2"');
							print "<a href=\"#\" class=\"add\" onClick=\"addFormField('$this_div','$this_field','$this_startid','$this_field_type'); return false;\">add</a>";
							print "</div>";
						}
						else
						{
							$i = 0;
							foreach ($form[$this_field] as $value) {
								print "<div class=\"report_row\" id=\"$i\">\n";

								print form::input($this_field . '[]', $value, ' class="text long2"');
								print "<a href=\"#\" class=\"add\" onClick=\"addFormField('$this_div','$this_field','$this_startid','$this_field_type'); return false;\">add</a>";
								if ($i != 0)
								{
									print "<a href=\"#\" class=\"rem\"	onClick='removeFormField(\"#" . $this_field . "_" . $i . "\"); return false;'>remove</a>";
								}
								print "</div>\n";
								$i++;
							}
						}
						print "<input type=\"hidden\" name=\"$this_startid\" value=\"$i\" id=\"$this_startid\">";
					?>
				</div>
				
				<?php Event::run('ushahidi_action.report_form_after_video_link'); ?>

				<!-- Photo Fields -->
				<div id="divPhoto" class="report_row">
				<h4><i class="icon-picture"></i>&nbsp;Upload Photos<br /><span class="example">Add Pictures and Images to your report</span></h4>
					<?php
						$this_div = "divPhoto";
						$this_field = "incident_photo";
						$this_startid = "photo_id";
						$this_field_type = "file";

						if (empty($form[$this_field]['name'][0]))
						{
							$i = 1;
							print "<div class=\"report_row\">";
							print form::upload($this_field . '[]', '', ' class="file long2"');
							print "<a href=\"#\" class=\"add\" onClick=\"addFormField('$this_div','$this_field','$this_startid','$this_field_type'); return false;\">add</a>";
							print "</div>";
						}
						else
						{
							$i = 0;
							foreach ($form[$this_field]['name'] as $value) 
							{
								print "<div class=\"report_row\" id=\"$i\">\n";

								// print "\"<strong>" . $value . "</strong>\"" . "<BR />";
								print form::upload($this_field . '[]', $value, ' class="file long2"');
								print "<a href=\"#\" class=\"add\" onClick=\"addFormField('$this_div','$this_field','$this_startid','$this_field_type'); return false;\">add</a>";
								if ($i != 0)
								{
									print "<a href=\"#\" class=\"rem\"	onClick='removeFormField(\"#" . $this_field . "_" . $i . "\"); return false;'>remove</a>";
								}
								print "</div>\n";
								$i++;
							}
						}
						print "<input type=\"hidden\" name=\"$this_startid\" value=\"$i\" id=\"$this_startid\">";
					?>

				</div>
		<br />			<br />	
					

					
					<div class="report_row">
						<h4><?php echo Kohana::lang('ui_main.reports_first'); ?></h4>
						<?php print form::input('person_first', $form['person_first'], ' class="text long"'); ?>
					</div>
					<div class="report_row">
						<h4><?php echo Kohana::lang('ui_main.reports_last'); ?></h4>
						<?php print form::input('person_last', $form['person_last'], ' class="text long"'); ?>
					</div>
					<div class="report_row">
						<h4><?php echo Kohana::lang('ui_main.reports_email'); ?></h4>
							<?php print form::input('person_email', $form['person_email'], ' class="text long"'); ?>
					</div>
					<?php
					// Action::report_form_optional - Runs in the optional information of the report form
					Event::run('ushahidi_action.report_form_optional');
					?>
				</div>
				
				<div class="report_row">
					<input name="submit" type="submit" value="<?php echo Kohana::lang('ui_main.reports_btn_submit'); ?>" class="btn btn-primary" /> 
				</div>
			</div>
		</div>
		<?php print form::close(); ?>
		<!-- end report form block -->
	</div>
</div>
