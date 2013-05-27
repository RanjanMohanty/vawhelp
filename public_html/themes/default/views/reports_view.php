<div id="main" class="report_detail">

	<div id="container" class="left-col">

  	  <?php
    	  if ($incident_verified)
    		{
    			echo '<p class="r_verified"><span class="notice notice-success"><i class="icon-ok-sign icon-white"></i>&nbsp;VERIFIED</span></p>';
    		}
    		else
    		{
    			echo '<p class="r_unverified"><span class="notice notice-important"><i class="icon-question-sign icon-white"></i>&nbsp;UNVERIFIED</span></p>';
    		}
  	  ?>

		<h3 class="report-title"><?php
			echo $incident_title;
		?></h3>

		<p>
			<span><i class="icon-map-marker"></i><?php echo $incident_location; ?></span>
			<?php Event::run('ushahidi_action.report_meta_after_time', $incident_id); ?>
		</p>
		
				
			

					<div class="report-category-list">

		<p>
			<?php
				foreach($incident_category as $category)
				{

					// don't show hidden categoies
					if($category->category->category_visible == 0)
					{
						continue;
					}

				  if ($category->category->category_image_thumb)
					{
					?>
					<a href="<?php echo url::site()."reports/?c=".$category->category->id; ?>"><span class="notice notice-info"><?php echo $category->category->category_title; ?></span></a>

					<?php
					}
					else
					{
					?>
					  <a href="<?php echo url::site()."reports/?c=".$category->category->id; ?>"><span class="notice notice-info"><?php echo $category->category->category_title; ?></span></a>
				  <?php
				  }
				}
			?>
			</p>
	
		</div>
		<?php
		// Action::report_display_media - Add content just above media section
	    Event::run('ushahidi_action.report_display_media', $incident_id);
		?>

		<!-- start report media -->
		<div class="<?php if( count($incident_photos) > 0 || count($incident_videos) > 0){ echo "report-media";}?>">
	    <?php
	    // if there are images, show them
	    if( count($incident_photos) > 0 )
	    {
			echo '<div id="report-images">';
			foreach ($incident_photos as $photo)
			{
				echo '<a class="photothumb" title="Click to Enlarge" rel="lightbox-group1" href="'.$photo['large'].'"><img src="'.$photo['thumb'].'"/></a> ';
			};
			echo '</div>';
	    }

	    // if there are videos, show those too
	    if( count($incident_videos) > 0 )
	    {
	      echo '<div id="report-video">';

          // embed the video codes
          foreach( $incident_videos as $incident_video)
          {
		  echo '<br />';
            $videos_embed->embed($incident_video,'');
          };
  			echo '</div>';

	    }
	    ?>
		</div>

		<?php
			// Action::report_meta - Add Items to the Report Meta (Location/Date/Time etc.)
			Event::run('ushahidi_action.report_meta', $incident_id);
			?>
			
		<!-- start report description -->
		<div class="report-description-text">
			<h5>Information:</h5>
			<?php echo $incident_description; ?>
			<br/>


			<!-- start news source link -->
			<?php if( count($incident_news) > 0 ) { ?>
			<div class="credibility">
			<h5>Online Resources:</h5>
					<?php
						foreach( $incident_news as $incident_new)
						{
							?>
							<a href="<?php echo $incident_new; ?> " target="_blank"><?php
							echo $incident_new;?></a>
							<br/>
							<?php
						}
			?>
			</div>
			<?php } ?>
			<!-- end news source link -->

			<!-- start additional fields -->
			<!-- end additional fields -->

			<?php if ($features_count)
			{
				?>
				<br /><br /><h5><?php echo Kohana::lang('ui_main.reports_features');?></h5>
				<?php
				foreach ($features as $feature)
				{
					echo ($feature->geometry_label) ?
					 	"<div class=\"feature_label\"><a href=\"javascript:getFeature($feature->id)\">$feature->geometry_label</a></div>" : "";
					echo ($feature->geometry_comment) ?
						"<div class=\"feature_comment\">$feature->geometry_comment</div>" : "";
				}
			}?>

			<div class="credibility">
				<table class="rating-table" cellspacing="0" cellpadding="0" border="0">
          <tr>
            <td><span class="notice notice-info">Was this Information Useful&nbsp;<i class="icon-question-sign icon-white"></i></span>&nbsp;</td>
            <td><a href="javascript:rating('<?php echo $incident_id; ?>','add','original','oloader_<?php echo $incident_id; ?>')"><img id="oup_<?php echo $incident_id; ?>" src="<?php echo url::file_loc('img'); ?>media/img/up.png" alt="UP" title="UP" border="0" /></a></td>
            <td><a href="javascript:rating('<?php echo $incident_id; ?>','subtract','original')"><img id="odown_<?php echo $incident_id; ?>" src="<?php echo url::file_loc('img'); ?>media/img/down.png" alt="DOWN" title="DOWN" border="0" /></a></td>
            <td><a href="" class="badge badge-info" id="orating_<?php echo $incident_id; ?>"><?php echo $incident_rating; ?></a></td>
            <td><a href="" id="oloader_<?php echo $incident_id; ?>" class="rating_loading" ></a></td>
          </tr>
        </table>
			</div>
		</div>
		
		<table class="table table-striped">
			<tbody>
			<tr><td>
			<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_counter addthis_pill_style"></a>
<a class="addthis_button_facebook_like" fb:like:action="recommend"></a>
<a class="addthis_button_tweet" tw:via="we4change"></a>
<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
</div>
			</td></tr>
			<tr><td>
			</td></tr>
			</tbody>
		</table>
		
		

 <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'vawhelp'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    		</div>

	<div class="right-col">
		<div class="report-media-box-content">
			<div id="report-map" class="report-map">
				<div class="map-holder" id="map"></div>
        <ul class="map-toggles">
          <li><a href="#" class="smaller-map">Smaller map</a></li>
          <li style="display:block;"><a href="#" class="wider-map">Wider map</a></li>
          <li><a href="#" class="taller-map">Taller map</a></li>
          <li><a href="#" class="shorter-map">Shorter Map</a></li>
        </ul>
        <div style="clear:both"></div>
			</div>
		</div>

		<?php
			// Action::report_view_sidebar - This gives plugins the ability to insert into the sidebar (below the map and above additional reports)
			Event::run('ushahidi_action.report_view_sidebar', $incident_id);
		?>

		<table class="table table-bordered">
			<h4>Nearby Helplines</h4><tbody>
			<?php foreach($incident_neighbors as $neighbor) { ?>			  
  			  <tr><td><a href="<?php echo url::site(); ?>reports/view/<?php echo $neighbor->id; ?>"><?php echo $neighbor->incident_title; ?></a></td></td>
  			<?php } ?>
			</tbody>
		</table>
		
			<table class="table table-striped">
			<h4>Support Us</h4><tbody>
			
  			<tr><td>
			<a class="addthis_button_twitter_follow_native" tw:screen_name="we4change"></a>
			</td></tr>
			<tr><td>
			<a class="btn btn-mini btn-primary" href="http://www.facebook.com/mapsforaid" target="_blank"><strong>Visit Us on Facebook</strong></a>&nbsp;<a class="addthis_button_facebook_like" fb:like:href="http://www.facebook.com/mapsforaid"></a>
			</td></tr>
			<tr><td>
			<a class="btn btn-mini btn-success" href="http://justcoz.org/maps4aid" target="_blank"><strong>Donate A Daily Tweet</strong></a>
			</td></tr>
  			<tr><td>
			<a class="btn btn-mini btn-warning" href="https://plus.google.com/109078504837236774639/posts" target="_blank"><strong>Join Us on Google+</strong></a>
			</td></tr>
			<tr><td>
			</td></tr>
			</tbody>
		</table>
		      
		
	
<!-- vawhelp_right -->
<div id='div-gpt-ad-1336062937578-0' style='width:300px; height:100px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1336062937578-0'); });
</script>
</div>
	</div>
	
	<!-- vawhelp_right -->


	<div style="clear:both;"></div>

</div>
