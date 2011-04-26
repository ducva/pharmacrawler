<h1><?php __('List category');?></h1>
<table>
	<tr>
		<td><?php __('STT')?></td>
		<td><?php __('Name')?></td>
		<td><?php __('Link')?></td>
	</tr>
	<?php  $i = 0;?>
	<?php foreach ($cats as $cat) {?>
		<tr>
		<td><?php echo ++$i;?></td>
		<td><?php echo $cat['Name']?></td>
		<td>
			<?php echo $html->link(__('Get Products', true), '/home/get_products/'.$cat['Link']);?>
		</td>
		
		</tr>
	<?php }?>
</table>