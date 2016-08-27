<div class="agenciasSeguimientos index">
	<h2><?php echo __('Agencias Seguimientos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('agencia_id');?></th>
			<th><?php echo $this->Paginator->sort('seguimiento_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($agenciasSeguimientos as $agenciasSeguimiento): ?>
	<tr>
		<td><?php echo h($agenciasSeguimiento['AgenciasSeguimiento']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($agenciasSeguimiento['Agencia']['id'], array('controller' => 'agencias', 'action' => 'view', $agenciasSeguimiento['Agencia']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($agenciasSeguimiento['Seguimiento']['id'], array('controller' => 'seguimientos', 'action' => 'view', $agenciasSeguimiento['Seguimiento']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $agenciasSeguimiento['AgenciasSeguimiento']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $agenciasSeguimiento['AgenciasSeguimiento']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $agenciasSeguimiento['AgenciasSeguimiento']['id']), null, __('Are you sure you want to delete # %s?', $agenciasSeguimiento['AgenciasSeguimiento']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Agencias Seguimiento'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Agencias'), array('controller' => 'agencias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agencia'), array('controller' => 'agencias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seguimientos'), array('controller' => 'seguimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seguimiento'), array('controller' => 'seguimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>
