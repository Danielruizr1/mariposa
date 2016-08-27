<div class="destinos index">
	<h2><?php echo __('Destinos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('sigla');?></th>
			<th><?php echo $this->Paginator->sort('activo');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($destinos as $destino): ?>
	<tr>
		<td><?php echo h($destino['Destino']['id']); ?>&nbsp;</td>
		<td><?php echo h($destino['Destino']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($destino['Destino']['sigla']); ?>&nbsp;</td>
		<td><?php echo h($destino['Destino']['activo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $destino['Destino']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $destino['Destino']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $destino['Destino']['id']), null, __('Are you sure you want to delete # %s?', $destino['Destino']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Destino'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Seguimientos'), array('controller' => 'seguimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seguimiento'), array('controller' => 'seguimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>
