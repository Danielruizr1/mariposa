<div class="seguimientos view">
<h2><?php  echo __('Seguimiento');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuarios'); ?></dt>
		<dd>
			<?php echo $this->Html->link($seguimiento['Usuarios']['id'], array('controller' => 'usuarios', 'action' => 'view', $seguimiento['Usuarios']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Departamentos'); ?></dt>
		<dd>
			<?php echo $this->Html->link($seguimiento['Departamentos']['id'], array('controller' => 'departamentos', 'action' => 'view', $seguimiento['Departamentos']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ciudades'); ?></dt>
		<dd>
			<?php echo $this->Html->link($seguimiento['Ciudades']['id'], array('controller' => 'ciudades', 'action' => 'view', $seguimiento['Ciudades']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parentesco'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['parentesco']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['fecha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['hora']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono1'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['telefono1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono2'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['telefono2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono3'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['telefono3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Celular'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['celular']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ciudad'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['ciudad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fax'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['fax']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre Padre'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['nombre_padre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre Madre'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['nombre_madre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefonooficina Padre'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['telefonooficina_padre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefonooficina Madre'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['telefonooficina_madre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Celular Padre'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['celular_padre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Celular Madre'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['celular_madre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mail Padre'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['mail_padre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mail Madre'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['mail_madre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre Quinceanera'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['nombre_quinceanera']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono Quinceanera'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['telefono_quinceanera']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mail Quinceanera'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['mail_quinceanera']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Celular Quinceanera'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['celular_quinceanera']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Anoviaje Quinceanera'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['anoviaje_quinceanera']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mesviaje Quinceanera'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['mesviaje_quinceanera']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($seguimiento['Seguimiento']['estado']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Seguimiento'), array('action' => 'edit', $seguimiento['Seguimiento']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Seguimiento'), array('action' => 'delete', $seguimiento['Seguimiento']['id']), null, __('Are you sure you want to delete # %s?', $seguimiento['Seguimiento']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Seguimientos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seguimiento'), array('action' => 'add')); ?> </li>
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
		<li><?php echo $this->Html->link(__('List Medios'), array('controller' => 'medios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medio'), array('controller' => 'medios', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Agencias');?></h3>
	<?php if (!empty($seguimiento['Agencia'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Activo'); ?></th>
		<th><?php echo __('Direccion Agencia'); ?></th>
		<th><?php echo __('Departamentos Id'); ?></th>
		<th><?php echo __('Ciudades Id'); ?></th>
		<th><?php echo __('Telefono Agencia'); ?></th>
		<th><?php echo __('Nombre Contacto'); ?></th>
		<th><?php echo __('Telefono Contacto'); ?></th>
		<th><?php echo __('Mail Contacto'); ?></th>
		<th><?php echo __('Nombre Contacto 2'); ?></th>
		<th><?php echo __('Telefono Contacto 2'); ?></th>
		<th><?php echo __('Mail Contacto 2'); ?></th>
		<th><?php echo __('Nombre Contacto 3'); ?></th>
		<th><?php echo __('Telefono Contacto 3'); ?></th>
		<th><?php echo __('Mail Contacto 3'); ?></th>
		<th><?php echo __('Web'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($seguimiento['Agencia'] as $agencia): ?>
		<tr>
			<td><?php echo $agencia['id'];?></td>
			<td><?php echo $agencia['nombre'];?></td>
			<td><?php echo $agencia['activo'];?></td>
			<td><?php echo $agencia['direccion_agencia'];?></td>
			<td><?php echo $agencia['departamentos_id'];?></td>
			<td><?php echo $agencia['ciudades_id'];?></td>
			<td><?php echo $agencia['telefono_agencia'];?></td>
			<td><?php echo $agencia['nombre_contacto'];?></td>
			<td><?php echo $agencia['telefono_contacto'];?></td>
			<td><?php echo $agencia['mail_contacto'];?></td>
			<td><?php echo $agencia['nombre_contacto_2'];?></td>
			<td><?php echo $agencia['telefono_contacto_2'];?></td>
			<td><?php echo $agencia['mail_contacto_2'];?></td>
			<td><?php echo $agencia['nombre_contacto_3'];?></td>
			<td><?php echo $agencia['telefono_contacto_3'];?></td>
			<td><?php echo $agencia['mail_contacto_3'];?></td>
			<td><?php echo $agencia['web'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'agencias', 'action' => 'view', $agencia['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'agencias', 'action' => 'edit', $agencia['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'agencias', 'action' => 'delete', $agencia['id']), null, __('Are you sure you want to delete # %s?', $agencia['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Agencia'), array('controller' => 'agencias', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Destinos');?></h3>
	<?php if (!empty($seguimiento['Destino'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Sigla'); ?></th>
		<th><?php echo __('Activo'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($seguimiento['Destino'] as $destino): ?>
		<tr>
			<td><?php echo $destino['id'];?></td>
			<td><?php echo $destino['nombre'];?></td>
			<td><?php echo $destino['sigla'];?></td>
			<td><?php echo $destino['activo'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'destinos', 'action' => 'view', $destino['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'destinos', 'action' => 'edit', $destino['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'destinos', 'action' => 'delete', $destino['id']), null, __('Are you sure you want to delete # %s?', $destino['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Destino'), array('controller' => 'destinos', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Medios');?></h3>
	<?php if (!empty($seguimiento['Medio'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Fechaingreso'); ?></th>
		<th><?php echo __('Activo'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($seguimiento['Medio'] as $medio): ?>
		<tr>
			<td><?php echo $medio['id'];?></td>
			<td><?php echo $medio['nombre'];?></td>
			<td><?php echo $medio['fechaingreso'];?></td>
			<td><?php echo $medio['activo'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'medios', 'action' => 'view', $medio['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'medios', 'action' => 'edit', $medio['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'medios', 'action' => 'delete', $medio['id']), null, __('Are you sure you want to delete # %s?', $medio['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Medio'), array('controller' => 'medios', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
