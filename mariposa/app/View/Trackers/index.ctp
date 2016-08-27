<div class="trackers index">
	<h2><?php echo __('Trackers');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('destinos_seguimientos_id');?></th>
			<th><?php echo $this->Paginator->sort('correo_usuario');?></th>
			<th><?php echo $this->Paginator->sort('fecha_ingreso');?></th>
			<th><?php echo $this->Paginator->sort('revisado');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($trackers as $tracker): ?>
	<tr>
		<td><?php echo h($tracker['Tracker']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tracker['DestinosSeguimientos']['id'], array('controller' => 'destinos_seguimientos', 'action' => 'view', $tracker['DestinosSeguimientos']['id'])); ?>
		</td>
		<td><?php echo h($tracker['Tracker']['correo_usuario']); ?>&nbsp;</td>
		<td><?php echo h($tracker['Tracker']['fecha_ingreso']); ?>&nbsp;</td>
		<td><?php echo h($tracker['Tracker']['revisado']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tracker['Tracker']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tracker['Tracker']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tracker['Tracker']['id']), null, __('Are you sure you want to delete # %s?', $tracker['Tracker']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tracker'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Destinos Seguimientos'), array('controller' => 'destinos_seguimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Destinos Seguimientos'), array('controller' => 'destinos_seguimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>
