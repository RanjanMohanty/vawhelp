<?php blocks::open("reports");?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th scope="col" class="title"><i class="icon-leaf"></i>&nbsp;Helpline</th>
			<th scope="col" class="location"><i class="icon-map-marker"></i>&nbsp;Place</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if ($total_items == 0)
		{
			?>
			<tr><td colspan="3"><?php echo Kohana::lang('ui_main.no_reports'); ?></td></tr>
			<?php
		}
		foreach ($incidents as $incident)
		{
			$incident_id = $incident->id;
			$incident_title = text::limit_chars($incident->incident_title, 200, '...', True);
			$incident_date = $incident->incident_date;
			$incident_date = date('M j Y', strtotime($incident->incident_date));
			$incident_location = $incident->location->location_name;
		?>
		<tr>
			<td><a href="<?php echo url::site() . 'reports/view/' . $incident_id; ?>"> <?php echo $incident_title ?></a></td>
			<td><?php echo $incident_location ?></td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>
<a class="btn" href="<?php echo url::site() . 'reports/' ?>"><?php echo Kohana::lang('ui_main.view_more'); ?>&raquo;</a>
<div style="clear:both;"></div>
<?php blocks::close();?>