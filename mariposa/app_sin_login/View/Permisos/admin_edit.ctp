<div class="permisos form">
<?php echo $this->Form->create('Permiso');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Permiso'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('campos_id');
		echo $this->Form->input('usuarios_id');
		echo $this->Form->input('crear');
		echo $this->Form->input('actualizar');
		echo $this->Form->input('eliminar');
		echo $this->Form->input('seleccionar');
		echo $this->Form->input('ninguno');
		echo $this->Form->input('todos');
		echo $this->Form->input('fecha_ingreso');
		echo $this->Form->input('fecha_modificacion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Permiso.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Permiso.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Permisos'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Campos'), array('controller' => 'campos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campos'), array('controller' => 'campos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuarios'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
