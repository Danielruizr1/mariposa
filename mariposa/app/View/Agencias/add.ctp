<div class="agencias form">
<?php echo $this->Form->create('Agencia');?>
	<fieldset>
		<legend><?php echo __('Add Agencia'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('activo');
		echo $this->Form->input('direccion_agencia');
		echo $this->Form->input('departamentos_id');
		echo $this->Form->input('ciudades_id');
		echo $this->Form->input('telefono_agencia');
		echo $this->Form->input('nombre_contacto');
		echo $this->Form->input('telefono_contacto');
		echo $this->Form->input('mail_contacto');
		echo $this->Form->input('nombre_contacto_2');
		echo $this->Form->input('telefono_contacto_2');
		echo $this->Form->input('mail_contacto_2');
		echo $this->Form->input('nombre_contacto_3');
		echo $this->Form->input('telefono_contacto_3');
		echo $this->Form->input('mail_contacto_3');
		echo $this->Form->input('web');
		echo $this->Form->input('Seguimiento');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Agencias'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Departamentos'), array('controller' => 'departamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Departamentos'), array('controller' => 'departamentos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ciudades'), array('controller' => 'ciudades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ciudades'), array('controller' => 'ciudades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seguimientos'), array('controller' => 'seguimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seguimiento'), array('controller' => 'seguimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>
