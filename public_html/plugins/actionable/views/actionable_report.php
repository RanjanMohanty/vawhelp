<div class="action-taken clearingfix">
	<?php if (!$action_taken && $actionable == 1) { ?>
         <span class="notice notice-success"><i class="icon-hand-right icon-white"></i>&nbsp;&nbsp;Updates</span>
    
   
	<?php }; ?>
  <?php if (!$action_taken && $actionable == 2) { ?>
   <a href="http://www.vawhelp.org/contact" class="btn-mini btn-warning"><i class="icon-hand-right icon-white"></i>&nbsp;<strong>Help Us Verify</strong></a>
	<?php }; ?>
  <?php if ($action_taken) { ?>
   
      <span class="notice notice-success"><i class="icon-hand-right icon-white"></i>&nbsp;<strong>Updates</strong></span>
   
	<?php }; ?>
  <?php if ($action_summary) { ?>
		<div id="action-summary">
		<?php echo $action_summary; ?>
		</div>
	<?php }; ?>
</div>