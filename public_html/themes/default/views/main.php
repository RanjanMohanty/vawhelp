<!-- main body -->

			 <div class="row">
        <div class="span9">
        
           <p><span class="notice notice-info">Using the Map&nbsp;<i class=" icon-arrow-down icon-white"></i></span> Zoom In and Out of the Map by using Mouse Scroll or <i class="icon-plus"></i>&nbsp;<i class="icon-minus"></i> buttons on the Vertical Scale Bar in the Map. Use the Arrow Buttons to Move left,right,up,down and pan the map view. Click on the Colored dots for more Information. Use the <i class="icon-search"></i>&nbsp;<strong>Search Feature</strong> to find NGOs or You can use the <i class="icon-th-list"></i>&nbsp;<strong>Helplines Listing</strong> for more filters.</p>
        
        </div>
		
        <div class="span3">
        
           <p><span class="notice notice-info">Using Category Filter&nbsp;<i class=" icon-arrow-down icon-white"></i></span> Select a Category of Help Provided below and the dots on the map will refresh according to your selection.</p>
           </div>
       	
      </div>	
						  <div class="pull-right">
						 
				  <div class="subnav">
    <ul class="nav nav-tabs nav-stacked">
  <li><a class="active" id="cat_0" href="#"><span class="swatch" style="background-color:<?php echo "#".$default_map_all;?>"></span><span class="category-title"><?php echo Kohana::lang('ui_main.all_categories');?></span></a></li>
				<?php
					foreach ($categories as $category => $category_info)
					{
						$category_title = $category_info[0];
						$category_color = $category_info[1];
						$category_image = ($category_info[2] != NULL) ? url::convert_uploaded_to_abs($category_info[2]) : NULL;
						$color_css = 'class="swatch" style="background-color:#'.$category_color.'"';
						if($category_info[2] != NULL) {
							$category_image = html::image(array(
								'src'=>$category_image,
								'style'=>'float:left;padding-right:5px;'
								));
							$color_css = '';
						}
						echo '<li><a href="#" id="cat_'. $category .'"><span '.$color_css.'>'.$category_image.'</span><span class="category-title">'.$category_title.'</span></a>';
						// Get Children
						echo '<div class="hide" id="child_'. $category .'">';
                                                if( sizeof($category_info[3]) != 0)
                                                {
                                                    echo '<ul>';
                                                    foreach ($category_info[3] as $child => $child_info)
                                                    {
                                                            $child_title = $child_info[0];
                                                            $child_color = $child_info[1];
                                                            $child_image = ($child_info[2] != NULL) ? url::convert_uploaded_to_abs($child_info[2]) : NULL;
                                                            $color_css = 'class="swatch" style="background-color:#'.$child_color.'"';
                                                            if($child_info[2] != NULL) {
                                                                    $child_image = html::image(array(
                                                                            'src'=>$child_image,
                                                                            'style'=>'float:left;padding-right:5px;'
                                                                            ));
                                                                    $color_css = '';
                                                            }
                                                            echo '<li style="padding-left:20px;"><a href="#" id="cat_'. $child .'"><span '.$color_css.'>'.$child_image.'</span><span class="category-title">'.$child_title.'</span></a></li>';
                                                    }
                                                    echo '</ul>';
                                                }
						echo '</div></li>';
					}
				?>
    </ul>
  </div>
    </div>
	
	
		<!-- content column -->

			<div class="container">
			

				<?php								
				// Map and Timeline Blocks
				echo $div_map;
				echo $div_timeline;
				?>
			</div>

		<!-- / content column -->

<br />
</div>
<!-- / main body -->

		<table class="table table-striped">
			<tbody>
			<tr><td>
			<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_counter addthis_pill_style"></a>
<a class="addthis_button_facebook_like" fb:like:action="recommend"></a>
<a class="addthis_button_tweet" tw:via="we4change"></a>
<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
<a class="btn btn-mini btn-warning" href="https://plus.google.com/109078504837236774639/posts" target="_blank"><strong>On Google+</strong></a>
<a class="btn btn-mini btn-success" href="http://justcoz.org/maps4aid" target="_blank"><strong>Donate A Tweet</strong></a>
<a class="addthis_button_facebook_like" fb:like:href="http://www.facebook.com/mapsforaid"></a>
<a class="addthis_button_twitter_follow_native" tw:screen_name="we4change"></a>
</td></tr>
<tr><td>
			</td></tr>
			</tbody>
		</table>
 <div class="row">
  <div class="span6">
   <h2>Recently Added</h2>
        	<?php blocks::render(); ?>
		        </div>
				<div class="span3">
        <h3>NGOs</h3>
           <p>If you are an NGO working to Provide Support to Women and Children in distress, please use the form below to submit Information about your Organization and your work to us. The Info will be made publicly available through this site in various formats. </p>
          <p><a class="btn" href="http://www.vawhelp.org/reports/submit">Submit Information &raquo;</a></p>
        </div>
				         
	   
				 
     
		     <div class="span3">
          <h3>A Maps4Aid Initiative</h3>
           <p>This Crowdsourcing Project is an Initiative by M FOR CHANGE to Collect, Verify and Host Information about Helplines for Women and Children in Distress in India. The Source Code used is Open Source powered by Ushahidi Crisis Mapping Platform. Once enough information has been gathered, the data will be made available to other websites, apps by API calls.</p>
		   <a href="http://www.mforchange.org" target="_blank"><img class="thumbnail" src="http://www.vawhelp.org/m4aidlogo1.png"/></a>
		   
		   <br />
          <p><a class="btn" href="http://www.vawhelp.org/about.html">About Us &raquo;</a></p>
        </div>
		

      
	 	
   
      
			
      </div>	
	   <hr>
<!-- content -->

<!-- content -->
