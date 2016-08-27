<div class="destinos view">
<h2><?php  echo __('Destino');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($destino['Destino']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($destino['Destino']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sigla'); ?></dt>
		<dd>
			<?php echo h($destino['Destino']['sigla']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Activo'); ?></dt>
		<dd>
			<?php echo h($destino['Destino']['activo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Destino'), array('action' => 'edit', $destino['Destino']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Destino'), array('action' => 'delete', $destino['Destino']['id']), null, __('Are you sure you want to delete # %s?', $destino['Destino']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Destinos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Destino'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seguimientos'), array('controller' => 'seguimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seguimiento'), array('controller' => 'seguimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Seguimientos');?></h3>
	<?php if (!empty($destino['Seguimiento'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Usuarios Id'); ?></th>
		<th><?php echo __('Departamentos Id'); ?></th>
		<th><?php echo __('Ciudades Id'); ?></th>
		<th><?php echo __('Fecha'); ?></th>
		<th><?php echo __('Hora'); ?></th>
		<th><?php echo __('Telefono1'); ?></th>
		<th><?php echo __('Telefono2'); ?></th>
		<th><?php echo __('Telefono3'); ?></th>
		<th><?php echo __('Celular'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Ciudad'); ?></th>
		<th><?php echo __('Direccion'); ?></th>
		<th><?php echo __('Fax'); ?></th>
		<th><?php echo __('Nombre Padre'); ?></th>
		<th><?php echo __('Nombre Madre'); ?></th>
		<th><?php echo __('Telefonooficina Padre'); ?></th>
		<th><?php echo __('Telefonooficina Madre'); ?></th>
		<th><?php echo __('Celular Padre'); ?></th>
		<th><?php echo __('Celular Madre'); ?></th>
		<th><?php echo __('Mail Padre'); ?></th>
		<th><?php echo __('Mail Madre'); ?></th>
		<th><?php echo __('Nombre Quinceanera'); ?></th>
		<th><?php echo __('Telefono Quinceanera'); ?></th>
		<th><?php echo __('Mail Quinceanera'); ?></th>
		<th><?php echo __('Celular Quinceanera'); ?></th>
		<th><?php echo __('Anoviaje Quinceanera'); ?></th>
		<th><?php echo __('Mesviaje Quinceanera'); ?></th>
		<th><?php echo __('Estado'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($destino['Seguimiento'] as $seguimiento): ?>
		<tr>
			<td><?php echo $seguimiento['id'];?></td>
			<td><?php echo $seguimiento['usuarios_id'];?></td>
			<td><?php echo $seguimiento['departamentos_id'];?></td>
			<td><?php echo $seguimiento['ciudades_id'];?></td>
			<td><?php echo $seguimiento['fecha'];?></td>
			<td><?php echo $seguimiento['hora'];?></td>
			<td><?php echo $seguimiento['telefono1'];?></td>
			<td><?php echo $seguimiento['telefono2'];?></td>
			<td><?php echo $seguimiento['telefono3'];?></td>
			<td><?php echo $seguimiento['celular'];?></td>
			<td><?php echo $seguimiento['email'];?></td>
			<td><?php echo $seguimiento['ciudad'];?></td>
			<td><?php echo $seguimiento['direccion'];?></td>
			<td><?php echo $seguimiento['fax'];?></td>
			<td><?php echo $seguimiento['nombre_padre'];?></td>
			<td><?php echo $seguimiento['nombre_madre'];?></td>
			<td><?php echo $seguimiento['telefonooficina_padre'];?></td>
			<td><?php echo $seguimiento['telefonooficina_madre'];?></td>
			<td><?php echo $seguimiento['celular_padre'];?></td>
			<td><?php echo $seguimiento['celular_madre'];?></td>
			<td><?php echo $seguimiento['mail_padre'];?></td>
			<td><?php echo $seguimiento['mail_madre'];?></td>
			<td><?php echo $seguimiento['nombre_quinceanera'];?></td>
			<td><?php echo $seguimiento['telefono_quinceanera'];?></td>
			<td><?php echo $seguimiento['mail_quinceanera'];?></td>
			<td><?php echo $seguimiento['celular_quinceanera'];?></td>
			<td><?php echo $seguimiento['anoviaje_quinceanera'];?></td>
			<td><?php echo $seguimiento['mesviaje_quinceanera'];?></td>
			<td><?php echo $seguimiento['estado'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'seguimientos', 'action' => 'view', $seguimiento['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'seguimientos', 'action' => 'edit', $seguimiento['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'seguimientos', 'action' => 'delete', $seguimiento['id']), null, __('Are you sure you want to delete # %s?', $seguimiento['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Seguimiento'), array('controller' => 'seguimientos', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
