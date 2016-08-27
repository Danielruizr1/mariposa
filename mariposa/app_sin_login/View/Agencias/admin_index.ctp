<div class="agencias index">
	<h2><?php echo __('Agencias');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('activo');?></th>
			<th><?php echo $this->Paginator->sort('direccion_agencia');?></th>
			<th><?php echo $this->Paginator->sort('departamentos_id');?></th>
			<th><?php echo $this->Paginator->sort('ciudades_id');?></th>
			<th><?php echo $this->Paginator->sort('telefono_agencia');?></th>
			<th><?php echo $this->Paginator->sort('nombre_contacto');?></th>
			<th><?php echo $this->Paginator->sort('telefono_contacto');?></th>
			<th><?php echo $this->Paginator->sort('mail_contacto');?></th>
			<th><?php echo $this->Paginator->sort('nombre_contacto_2');?></th>
			<th><?php echo $this->Paginator->sort('telefono_contacto_2');?></th>
			<th><?php echo $this->Paginator->sort('mail_contacto_2');?></th>
			<th><?php echo $this->Paginator->sort('nombre_contacto_3');?></th>
			<th><?php echo $this->Paginator->sort('telefono_contacto_3');?></th>
			<th><?php echo $this->Paginator->sort('mail_contacto_3');?></th>
			<th><?php echo $this->Paginator->sort('web');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($agencias as $agencia): ?>
	<tr>
		<td><?php echo h($agencia['Agencia']['id']); ?>&nbsp;</td>
		<td><?php echo h($agencia['Agencia']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($agencia['Agencia']['activo']); ?>&nbsp;</td>
		<td><?php echo h($agencia['Agencia']['direccion_agencia']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($agencia['Departamentos']['id'], array('controller' => 'departamentos', 'action' => 'view', $agencia['Departamentos']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($agencia['Ciudades']['id'], array('controller' => 'ciudades', 'action' => 'view', $agencia['Ciudades']['id'])); ?>
		</td>
		<td><?php echo h($agencia['Agencia']['telefono_agencia']); ?>&nbsp;</td>
		<td><?php echo h($agencia['Agencia']['nombre_contacto']); ?>&nbsp;</td>
		<td><?php echo h($agencia['Agencia']['telefono_contacto']); ?>&nbsp;</td>
		<td><?php echo h($agencia['Agencia']['mail_contacto']); ?>&nbsp;</td>
		<td><?php echo h($agencia['Agencia']['nombre_contacto_2']); ?>&nbsp;</td>
		<td><?php echo h($agencia['Agencia']['telefono_contacto_2']); ?>&nbsp;</td>
		<td><?php echo h($agencia['Agencia']['mail_contacto_2']); ?>&nbsp;</td>
		<td><?php echo h($agencia['Agencia']['nombre_contacto_3']); ?>&nbsp;</td>
		<td><?php echo h($agencia['Agencia']['telefono_contacto_3']); ?>&nbsp;</td>
		<td><?php echo h($agencia['Agencia']['mail_contacto_3']); ?>&nbsp;</td>
		<td><?php echo h($agencia['Agencia']['web']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $agencia['Agencia']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $agencia['Agencia']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $agencia['Agencia']['id']), null, __('Are you sure you want to delete # %s?', $agencia['Agencia']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Agencia'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Departamentos'), array('controller' => 'departamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Departamentos'), array('controller' => 'departamentos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ciudades'), array('controller' => 'ciudades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ciudades'), array('controller' => 'ciudades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seguimientos'), array('controller' => 'seguimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seguimiento'), array('controller' => 'seguimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>
