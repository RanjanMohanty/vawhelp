<?php if(count($incident_comments) > 0): ?>

<div class="report-comments">
	<?php foreach($incident_comments as $comment): ?>
		<div class="report-comment-box">
	
			<div>
				<strong><?php echo $comment->comment_author; ?></strong>&nbsp;(<?php echo date('M j Y', strtotime($comment->comment_date)); ?>)
			</div>
			
			<div><?php echo $comment->comment_description; ?></div>
	
	  <div class="credibility">  
	      <table class="rating-table" cellspacing="0" cellpadding="0" border="0">
	        <tr>
	          <td><span class="notice notice-warning">Comment Rating&nbsp;<i class="icon-fire icon-white"></i></span>&nbsp;</td>
	          <td><a href="javascript:rating('<?php echo $comment->id; ?>','add','comment','cloader_<?php echo $comment->id; ?>')"><img id="cup_<?php echo $comment->id; ?>" src="<?php echo url::file_loc('img'); ?>media/img/up.png" alt="UP" title="UP" border="0" /></a></td>
	          <td><a href="javascript:rating('<?php echo $comment->id; ?>','subtract','comment','cloader_<?php echo $comment->id; ?>')"><img id="cdown_<?php echo $comment->id; ?>" src="<?php echo url::file_loc('img'); ?>media/img/down.png" alt="DOWN" title="DOWN" border="0" /></a></td>
	          <td><div class="badge badge-warning" id="crating_<?php echo $comment->id; ?>"><?php echo $comment->comment_rating; ?></div></td>
	          <td><div id="cloader_<?php echo $comment->id; ?>" class="rating_loading" ></div></td>
	        </tr>
	      </table>
	  </div>
	
		</div>
	<?php endforeach; ?>
	
</div>

<?php endif; ?>