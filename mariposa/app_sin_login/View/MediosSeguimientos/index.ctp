<div class="mediosSeguimientos index">
	<h2><?php echo __('Medios Seguimientos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('medio_id');?></th>
			<th><?php echo $this->Paginator->sort('seguimiento_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($mediosSeguimientos as $mediosSeguimiento): ?>
	<tr>
		<td><?php echo h($mediosSeguimiento['MediosSeguimiento']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($mediosSeguimiento['Medio']['id'], array('controller' => 'medios', 'action' => 'view', $mediosSeguimiento['Medio']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($mediosSeguimiento['Seguimiento']['id'], array('controller' => 'seguimientos', 'action' => 'view', $mediosSeguimiento['Seguimiento']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $mediosSeguimiento['MediosSeguimiento']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $mediosSeguimiento['MediosSeguimiento']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $mediosSeguimiento['MediosSeguimiento']['id']), null, __('Are you sure you want to delete # %s?', $mediosSeguimiento['MediosSeguimiento']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Medios Seguimiento'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Medios'), array('controller' => 'medios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medio'), array('controller' => 'medios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seguimientos'), array('controller' => 'seguimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seguimiento'), array('controller' => 'seguimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>
