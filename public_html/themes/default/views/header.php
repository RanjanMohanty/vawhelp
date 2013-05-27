<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<title><?php echo isset($incident_title) ? $incident_title : 'VAWHELP - Crowdsourcing Information about Helplines for Women and Children in India.' ?></title>
<meta property="fb:app_id" content="342053032523999"/>
	<META NAME="KEYWORDS" CONTENT="NGOs,NGO,Helplines,Help,Women,Children,<?php echo isset($incident_location) ? $incident_location : 'India' ?>">
	<meta property="og:type" content="Article" />
	<meta property="og:title" content="<?php echo isset($incident_title) ? $incident_title : 'VAWHELP - Crowdsourcing Information about Helplines for Women and Children in India.' ?>" />
	<meta property="og:description" content="<?php echo isset($incident_description) ? substr($incident_description, 0, 300) : 'Helplines for Women and Children' ?>" />
	<meta property="og:site_name" content="vawhelp" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php echo $header_block; ?>
	<?php
// Action::header_scripts - Additional Inline Scripts from Plugins
	Event::run('ushahidi_action.header_scripts');
	?>
	<link rel="stylesheet" type="text/css" href="http://www.vawhelp.org/themes/default/css/bootstrap.min.css" />
	<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f54929f26b7da3f&async=1"></script>
	 <script type="text/javascript" src="/js/jquery.jplayer.min.js"></script>
	 <link type="text/css" href="/skin/jplayer.blue.monday.css" rel="stylesheet" />
</head>

<body class="container" style="padding:50px"/>
 <div class="navbar navbar-fixed-top">
   <div class="navbar-inner">
     <div class="container">
       <a class="brand" href="http://www.maps4aid.com" target="_blank" title="Visit maps4aid.com"><i class="sprite-maps4aid"></i></a>
	    <span class="pull-right"><ul class="nav" style="padding:0px 0px 0px 0px;"> 
		 <li><a href="http://www.facebook.com/mapsforaid" target="_blank" title="Like Us on Facebook" ><i class="sprite-fb"></i></a></li>
		 <li><a href="http://www.twitter.com/we4change" target="_blank" title="Follow Us on Twitter" ><i class="sprite-twitter"></i></a></li>
		 <li><a href="https://plus.google.com/109078504837236774639/posts" target="_blank" title="On Google+" ><i class="sprite-gplus"></i></a></li>
		 <li><a href="http://feeds.feedburner.com/vawhelp" target="_blank" title="Subscribe to RSS" ><i class="sprite-rss"></i></a></li>	
		 <li><a href="http://pinterest.com/maps4aid/pins/" target="_blank" title="On Pinterest" ><i class="sprite-pinterest"></i></a></li>
		 <li><a href="http://www.flickr.com/photos/maps4aid" target="_blank" title="Flickr Gallery" ><i class="sprite-flickr"></i></a></li>
		 <li><a href="http://www.youtube.com/user/we4change" target="_blank" title="YouTube Playlist" ><i class="sprite-youtube"></i></a></li>
		 </ul></span>
      </div>
   </div>
 </div>

	<!-- wrapper -->
	

		<!-- header -->
		<div>

		<img class="pull-right" src="http://www.vawhelp.org/media/img/m4aidlogo1.png"/><br>
				<br>
				<h3>Crowdsourcing Information about Helplines for Women and Children in India.</h3>
	
			<!-- submit incident -->
		<div class="clearingfix"><a href="http://www.vawhelp.org/reports/submit" class="btn btn-info"><i class="icon-plus icon-white"></i>&nbsp;<strong>Submit A Helpline</strong></a>&nbsp;<a href="http://www.vawhelp.org/contact" class="btn-mini btn-warning"><i class="icon-ok icon-white"></i>&nbsp;<strong>Help Us Verify</strong></a>&nbsp;<a href="http://www.vawhelp.org/pledges.html" class="btn-mini btn-success"><i class="icon-comment icon-white"></i>&nbsp;<strong>Pledge Your Support</strong></a></div>	
		
<br>
		</div>
			<!-- submit incident -->
			
			<!-- / submit incident -->

		</div>
		<!-- / header -->
        <!-- / header item for plugins -->
        <?php
            // Action::header_item - Additional items to be added by plugins
	        Event::run('ushahidi_action.header_item');
        ?>

		<!-- main body -->
				<!-- mainmenu -->
		<section id="navbar">
  <div class="navbar">
    <div class="navbar-inner">
      <div class="container" style="width: auto;">
        <div class="nav-collapse">
           <ul class="nav">
            <li><a href="http://www.vawhelp.org/main/"><i class="icon-home icon-white"></i>&nbsp;Home</a></li>
            <li><a href="http://www.vawhelp.org/reports/?c=0"><i class="icon-th-list icon-white"></i>&nbsp;Helplines List</a></li>
			<li><a href="http://www.vawhelp.org/categories.html"><i class="icon-flag icon-white"></i>&nbsp;Categories</a></li>
			<li><a href="http://www.vawhelp.org/pledges.html"><i class="icon-comment icon-white"></i>&nbsp;Pledges</a></li>
            <li ><a href="http://www.vawhelp.org/about.html"><i class="icon-info-sign icon-white"></i>&nbsp;About</a></li>
			<li><a href="http://www.vawhelp.org/contact"><i class="icon-envelope icon-white"></i>&nbsp;Contact Us</a></li>
          </ul>
<form class="navbar-search pull-left" action="http://www.vawhelp.org/search/" method="get" id="search-form">
            <input type="text" name="k" class="search-query span2" placeholder="Search Information">
          </form>
          <ul class="nav pull-right">
            <li class="divider-vertical"></li>
            <li><a href="http://www.ushahidi.com" target="_blank"><i class="sprite-ushahidi"></i></a></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div>
    </div><!-- /navbar-inner -->
  </div><!-- /navbar -->

</section>
				<!-- / mainmenu -->
