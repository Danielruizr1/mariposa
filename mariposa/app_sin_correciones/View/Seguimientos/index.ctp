<div class="seguimientos index">
	<h2><?php echo __('Seguimientos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('usuarios_id');?></th>
			<th><?php echo $this->Paginator->sort('departamentos_id');?></th>
			<th><?php echo $this->Paginator->sort('ciudades_id');?></th>
			<th><?php echo $this->Paginator->sort('fecha');?></th>
			<th><?php echo $this->Paginator->sort('hora');?></th>
			<th><?php echo $this->Paginator->sort('telefono1');?></th>
			<th><?php echo $this->Paginator->sort('telefono2');?></th>
			<th><?php echo $this->Paginator->sort('telefono3');?></th>
			<th><?php echo $this->Paginator->sort('celular');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('ciudad');?></th>
			<th><?php echo $this->Paginator->sort('direccion');?></th>
			<th><?php echo $this->Paginator->sort('fax');?></th>
			<th><?php echo $this->Paginator->sort('nombre_padre');?></th>
			<th><?php echo $this->Paginator->sort('nombre_madre');?></th>
			<th><?php echo $this->Paginator->sort('telefonooficina_padre');?></th>
			<th><?php echo $this->Paginator->sort('telefonooficina_madre');?></th>
			<th><?php echo $this->Paginator->sort('celular_padre');?></th>
			<th><?php echo $this->Paginator->sort('celular_madre');?></th>
			<th><?php echo $this->Paginator->sort('mail_padre');?></th>
			<th><?php echo $this->Paginator->sort('mail_madre');?></th>
			<th><?php echo $this->Paginator->sort('nombre_quinceanera');?></th>
			<th><?php echo $this->Paginator->sort('telefono_quinceanera');?></th>
			<th><?php echo $this->Paginator->sort('mail_quinceanera');?></th>
			<th><?php echo $this->Paginator->sort('celular_quinceanera');?></th>
			<th><?php echo $this->Paginator->sort('anoviaje_quinceanera');?></th>
			<th><?php echo $this->Paginator->sort('mesviaje_quinceanera');?></th>
			<th><?php echo $this->Paginator->sort('estado');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($seguimientos as $seguimiento): ?>
	<tr>
		<td><?php echo h($seguimiento['Seguimiento']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($seguimiento['Usuarios']['id'], array('controller' => 'usuarios', 'action' => 'view', $seguimiento['Usuarios']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($seguimiento['Departamentos']['id'], array('controller' => 'departamentos', 'action' => 'view', $seguimiento['Departamentos']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($seguimiento['Ciudades']['id'], array('controller' => 'ciudades', 'action' => 'view', $seguimiento['Ciudades']['id'])); ?>
		</td>
		<td><?php echo h($seguimiento['Seguimiento']['fecha']); ?>&nbsp;</td>
		<td><?php echo h($seguimiento['Seguimiento']['hora']); ?>&nbsp;</td>
		<td><?php echo h($seguimiento['Seguimiento']['telefono1']); ?>&nbsp;</td>
		<td><?php echo h($seguimiento['Seguimiento']['telefono2']); ?>&nbsp;</td>
		<td><?php echo h($seguimiento['Seguimiento']['telefono3']); ?>&nbsp;</td>
		<td><?php echo h($seguimiento['Seguimiento']['celular']); ?>&nbsp;</td>
		<td><?php echo h($seguimiento['Seguimiento']['email']); ?>&nbsp;</td>
		<td><?php echo h($seguimiento['Seguimiento']['ciudad']); ?>&nbsp;</td>
		<td><?php echo h($seguimiento['Seguimiento']['direccion']); ?>&nbsp;</td>
		<td><?php echo h($seguimiento['Seguimiento']['fax']); ?>&nbsp;</td>
		<td><?php echo h($seguimiento['Seguimiento']['nombre_padre']); ?>&nbsp;</td>
		<td><?php echo h($seguimiento['Seguimiento']['nombre_madre']); ?>&nbsp;</td>
		<td><?php echo h($seguimiento['Seguimiento']['telefonooficina_padre']); ?>&nbsp;</td>
		<td><?php echo h($seguimiento['Seguimiento']['telefonooficina_madre']); ?>&nbsp;</td>
		<td><?php echo h($seguimiento['Seguimiento']['celular_padre']); ?>&nbsp;</td>
		<td><?php echo h($seguimiento['Seguimiento']['celular_madre']); ?>&nbsp;</td>
		<td><?php echo h($seguimiento['Seguimiento']['mail_padre']); ?>&nbsp;</td>
		<td><?php echo h($seguimiento['Seguimiento']['mail_madre']); ?>&nbsp;</td>
		<td><?php echo h($seguimiento['Seguimiento']['nombre_quinceanera']); ?>&nbsp;</td>
		<td><?php echo h($seguimiento['Seguimiento']['telefono_quinceanera']); ?>&nbsp;</td>
		<td><?php echo h($seguimiento['Seguimiento']['mail_quinceanera']); ?>&nbsp;</td>
		<td><?php echo h($seguimiento['Seguimiento']['celular_quinceanera']); ?>&nbsp;</td>
		<td><?php echo h($seguimiento['Seguimiento']['anoviaje_quinceanera']); ?>&nbsp;</td>
		<td><?php echo h($seguimiento['Seguimiento']['mesviaje_quinceanera']); ?>&nbsp;</td>
		<td><?php echo h($seguimiento['Seguimiento']['estado']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $seguimiento['Seguimiento']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $seguimiento['Seguimiento']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $seguimiento['Seguimiento']['id']), null, __('Are you sure you want to delete # %s?', $seguimiento['Seguimiento']['id'])); ?>
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
    <?php print_r($seguimiento);?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Seguimiento'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuarios'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departamentos'), array('controller' => 'departamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Departamentos'), array('controller' => 'departamentos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ciudades'), array('controller' => 'ciudades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ciudades'), array('controller' => 'ciudades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Agencias'), array('controller' => 'agencias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agencia'), array('controller' => 'agencias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Destinos'), array('controller' => 'destinos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Destino'), array('controller' => 'destinos', 'action' => 'add')); ?> </li>
	</ul>
</div>
