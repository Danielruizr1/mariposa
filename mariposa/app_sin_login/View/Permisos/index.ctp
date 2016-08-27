<div class="permisos index">
	<h2><?php echo __('Permisos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('campos_id');?></th>
			<th><?php echo $this->Paginator->sort('usuarios_id');?></th>
			<th><?php echo $this->Paginator->sort('crear');?></th>
			<th><?php echo $this->Paginator->sort('actualizar');?></th>
			<th><?php echo $this->Paginator->sort('eliminar');?></th>
			<th><?php echo $this->Paginator->sort('seleccionar');?></th>
			<th><?php echo $this->Paginator->sort('ninguno');?></th>
			<th><?php echo $this->Paginator->sort('todos');?></th>
			<th><?php echo $this->Paginator->sort('fecha_ingreso');?></th>
			<th><?php echo $this->Paginator->sort('fecha_modificacion');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($permisos as $permiso): ?>
	<tr>
		<td><?php echo h($permiso['Permiso']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($permiso['Campos']['id'], array('controller' => 'campos', 'action' => 'view', $permiso['Campos']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($permiso['Usuarios']['id'], array('controller' => 'usuarios', 'action' => 'view', $permiso['Usuarios']['id'])); ?>
		</td>
		<td><?php echo h($permiso['Permiso']['crear']); ?>&nbsp;</td>
		<td><?php echo h($permiso['Permiso']['actualizar']); ?>&nbsp;</td>
		<td><?php echo h($permiso['Permiso']['eliminar']); ?>&nbsp;</td>
		<td><?php echo h($permiso['Permiso']['seleccionar']); ?>&nbsp;</td>
		<td><?php echo h($permiso['Permiso']['ninguno']); ?>&nbsp;</td>
		<td><?php echo h($permiso['Permiso']['todos']); ?>&nbsp;</td>
		<td><?php echo h($permiso['Permiso']['fecha_ingreso']); ?>&nbsp;</td>
		<td><?php echo h($permiso['Permiso']['fecha_modificacion']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $permiso['Permiso']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $permiso['Permiso']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $permiso['Permiso']['id']), null, __('Are you sure you want to delete # %s?', $permiso['Permiso']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Permiso'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Campos'), array('controller' => 'campos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campos'), array('controller' => 'campos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuarios'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
