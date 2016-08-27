<div class="permisos view">
<h2><?php  echo __('Permiso');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($permiso['Permiso']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Campos'); ?></dt>
		<dd>
			<?php echo $this->Html->link($permiso['Campos']['id'], array('controller' => 'campos', 'action' => 'view', $permiso['Campos']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuarios'); ?></dt>
		<dd>
			<?php echo $this->Html->link($permiso['Usuarios']['id'], array('controller' => 'usuarios', 'action' => 'view', $permiso['Usuarios']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Crear'); ?></dt>
		<dd>
			<?php echo h($permiso['Permiso']['crear']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Actualizar'); ?></dt>
		<dd>
			<?php echo h($permiso['Permiso']['actualizar']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Eliminar'); ?></dt>
		<dd>
			<?php echo h($permiso['Permiso']['eliminar']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seleccionar'); ?></dt>
		<dd>
			<?php echo h($permiso['Permiso']['seleccionar']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ninguno'); ?></dt>
		<dd>
			<?php echo h($permiso['Permiso']['ninguno']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Todos'); ?></dt>
		<dd>
			<?php echo h($permiso['Permiso']['todos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Ingreso'); ?></dt>
		<dd>
			<?php echo h($permiso['Permiso']['fecha_ingreso']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Modificacion'); ?></dt>
		<dd>
			<?php echo h($permiso['Permiso']['fecha_modificacion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Permiso'), array('action' => 'edit', $permiso['Permiso']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Permiso'), array('action' => 'delete', $permiso['Permiso']['id']), null, __('Are you sure you want to delete # %s?', $permiso['Permiso']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Permisos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Permiso'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Campos'), array('controller' => 'campos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campos'), array('controller' => 'campos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuarios'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
