<div class="campos index">
	<h2><?php echo __('Campos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('tablas_id');?></th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('tipo');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($campos as $campo): ?>
	<tr>
		<td><?php echo h($campo['Campo']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($campo['Tablas']['id'], array('controller' => 'tablas', 'action' => 'view', $campo['Tablas']['id'])); ?>
		</td>
		<td><?php echo h($campo['Campo']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($campo['Campo']['tipo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $campo['Campo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $campo['Campo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $campo['Campo']['id']), null, __('Are you sure you want to delete # %s?', $campo['Campo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Campo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tablas'), array('controller' => 'tablas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tablas'), array('controller' => 'tablas', 'action' => 'add')); ?> </li>
	</ul>
</div>
