<div id="container">
	<div class="row">
		<!-- start contacts block -->
		<div class="span6">
			<h1>Contact Form</h1>
			<div id="contact_us" class="well">
				<?php
				if ($form_error)
				{
					?>
					<!-- red-box -->
					<div class="red-box">
						<h3>Error!</h3>
						<ul>
							<?php
							foreach ($errors as $error_item => $error_description)
							{
								print (!$error_description) ? '' : "<li>" . $error_description . "</li>";
							}
							?>
						</ul>
					</div>
					<?php
				}

				if ($form_sent)
				{
					?>
					<!-- green-box -->
					<div class="green-box">
						<h3><?php echo Kohana::lang('ui_main.contact_message_has_send'); ?></h3>
					</div>
					<?php
				}								
				?>
				
				<?php print form::open(NULL, array('id' => 'contactForm', 'name' => 'contactForm')); ?>
				<div class="report_row">
					<strong><?php echo Kohana::lang('ui_main.contact_name'); ?>:</strong><br />
					<?php print form::input('contact_name', $form['contact_name'], ' class="text"'); ?>
				</div>
				<div class="report_row">
					<strong><?php echo Kohana::lang('ui_main.contact_email'); ?>:</strong><br />
					<?php print form::input('contact_email', $form['contact_email'], ' class="text"'); ?>
				</div>
				<div class="report_row">
					<strong><?php echo Kohana::lang('ui_main.contact_phone'); ?>:</strong>(Optional)<br />
					<?php print form::input('contact_phone', $form['contact_phone'], ' class="text"'); ?>
				</div>
				<div class="report_row">
					<strong><?php echo Kohana::lang('ui_main.contact_subject'); ?>:</strong><br />
					<?php print form::input('contact_subject', $form['contact_subject'], ' class="text"'); ?>
				</div>								
				<div class="report_row">
					<strong><?php echo Kohana::lang('ui_main.contact_message'); ?>:</strong><br />
					<?php print form::textarea('contact_message', $form['contact_message'], ' rows="4" cols="40" class="textarea long" ') ?>
				</div>		
				<div class="report_row">
					<strong><?php echo Kohana::lang('ui_main.contact_code'); ?>:</strong><br />
					<?php print $captcha->render(); ?><br />
					<?php print form::input('captcha', $form['captcha'], ' class="text"'); ?>
				</div>
				<div class="report_row">
					<input name="submit" type="submit" value="<?php echo Kohana::lang('ui_main.contact_send'); ?>" class="btn btn-success" />
				</div>
				<?php print form::close(); ?>
			</div>
			
		</div>

		  <div class="span6">
		      <h2>Verification Team</h2>
    <div class="thumbnail">
      <img src="http://vawhelp.org/letshelp.jpg" alt="">
       </div>
	   </br>
	  <p><span class="notice notice-important"><i class="icon-exclamation-sign icon-white"></i>&nbsp;&nbsp;The Problem&nbsp;</span></p>
	  <p>There are hundreds of NGOs and Agencies working towards Women's Empowerment in India. Many of them provide services like Legal Help, Counselling, Education & Training, Employment Opportunities, Short Stay Homes, etc to women and girls who are in distress. There is information about them available on the Internet but most of the content is outdated and needs to be verified on a regular basis.</p>
   	  </div>

	  <div class="span6">
      <p><span class="notice notice-info"><i class="icon-ok icon-white"></i>&nbsp;&nbsp;Your Help&nbsp;</span></p>
           <p>There are snippets of Information available on the Web. Usually a phone number, sometimes just an address and in most of the cases, just the name of the organization. For Phase 1, our focus will be on verifying the contact numbers and gathering more information from them.</p>
<p>If Possible, you can provide your phone number to the NGO so that they can call you up if there is any change in information and you can pass on the information to us via our email group. This would be very helpful as it creates a link and will help in the re-verification process.</p>
          </div>
	     <div class="span6">
     <p><span class="notice notice-success"><i class="icon-plus icon-white"></i>&nbsp;&nbsp;Ok! I am Ready&nbsp;</span></p>
           <p><h5>Welcome to the Group!</h5><p> Please fill out the contact form available on the left to get in touch with us. </p><p><span class="notice notice-warning">Please</span> &nbsp;Include your Valid <strong>Email Address, Location (City/State)</strong> in the message content so that we can provide you with data that you can easily verify.</p>
         </div>
		<!-- end contacts block -->
	</div>
</div>