			 <div class="row">
        <div class="span8">
        
           <p><span class="notice notice-info">Using the List&nbsp;<i class=" icon-arrow-down icon-white"></i></span> You can change from List View to Map View by selecting the Buttons on the header of the table below. You can filter the Helplines List by Catergories, Location and/or Verification Status by using the Filters on the right. </p>
        
        </div>
        <div class="span4">
        
           <p><span class="notice notice-info">Using Filter&nbsp;<i class=" icon-arrow-down icon-white"></i></span> Select the Filter/s you want to apply on the list and click on "Filter Results" Link. For Location, Click on the map and select a radius.</p>
           </div>
       	
      </div>	
<div id="content">
	<div class="content-bg">
		<!-- start reports block -->
		<div class="big-block">
			
			<div style="overflow:auto;">
				<!-- reports-box -->
				<div id="reports-box">
					<?php echo $report_listing_view; ?>
				</div>
				<!-- end #reports-box -->
				
				<div id="filters-box">
					<h2>Filter Results By</h2>
					<div id="accordion">
						
						<h3>
							<a href="#" class="small-link-button f-clear reset" onclick="removeParameterKey('c', 'fl-categories');"><?php echo Kohana::lang('ui_main.clear')?></a>
							<a class="f-title" href="#"><?php echo Kohana::lang('ui_main.category')?></a>
						</h3>
						<div class="f-category-box">
							<ul class="filter-list fl-categories" id="category-filter-list">
								<li>
									<a href="#">
									<span class="item-swatch" style="background-color: #<?php echo Kohana::config('settings.default_map_all'); ?>">&nbsp;</span>
									<span class="item-title"><?php echo Kohana::lang('ui_main.all_categories'); ?></span>
									<span class="item-count" id="all_report_count"><?php echo $report_stats->total_reports; ?></span>
									</a>
								</li>
								<?php echo $category_tree_view; ?>
							</ul>
						</div>
						
						<h3>	
							<a href="#" class="small-link-button f-clear reset" onclick="removeParameterKey('radius', 'f-location-box');removeParameterKey('start_loc', 'f-location-box');">
								<?php echo Kohana::lang('ui_main.clear')?>
							</a>
							<a class="f-title" href="#"><?php echo Kohana::lang('ui_main.location'); ?></a></h3>
						<div class="f-location-box">
							<?php echo $alert_radius_view; ?>
							<p></p>
						</div>
						
											
												
						<h3>
							<a href="#" class="small-link-button f-clear reset" onclick="removeParameterKey('v', 'fl-verification');">
								<?php echo Kohana::lang('ui_main.clear'); ?>
							</a>
							<a class="f-title" href="#"><?php echo Kohana::lang('ui_main.verification'); ?></a>
						</h3>
						<div class="f-verification-box">
							<ul class="filter-list fl-verification">
								<li>
									<a href="#" id="filter_link_verification_1">
										<span class="item-icon ic-verified">&nbsp;</span>
										<span class="item-title"><?php echo Kohana::lang('ui_main.verified'); ?></span>
									</a>
								</li>
								<li>
									<a href="#" id="filter_link_verification_0">
										<span class="item-icon ic-unverified">&nbsp;</span>
										<span class="item-title"><?php echo Kohana::lang('ui_main.unverified'); ?></span>
									</a>
								</li>
								
							</ul>
						</div>
			
						<?php
							// Action, allows plugins to add custom filters
							Event::run('ushahidi_action.report_filters_ui');
						?>
					</div>
					<!-- end #accordion -->
					
					<div id="filter-controls">
						<p>
							<a href="#" class="small-link-button reset" id="reset_all_filters"><i class="icon-retweet"></i>&nbsp;<?php echo Kohana::lang('ui_main.reset_all_filters'); ?></a> 
							<span class="pull-right"><a href="#" id="applyFilters" class="btn btn-primary"><i class="icon-arrow-right icon-white"></i>&nbsp;<strong>Filter Reports</strong></a></span>
						</p>
					</div>          
				</div>
				<!-- end #filters-box -->
			</div>
      
			<div style="display:none">
				<?php
					// Filter::report_stats - The block that contains reports list statistics
					Event::run('ushahidi_filter.report_stats', $report_stats);
					echo $report_stats;
				?>
			</div>

		</div>
		<!-- end reports block -->
		
	</div>
	<!-- end content-bg -->
</div>