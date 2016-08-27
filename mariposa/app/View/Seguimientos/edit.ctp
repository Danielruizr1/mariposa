<div class="seguimientos form">
<?php echo $this->Form->create('Seguimiento');?>
	<fieldset>
		<legend><?php echo __('Edit Seguimiento'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('users_id');
		echo $this->Form->input('departamentos_id');
		echo $this->Form->input('ciudades_id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('parentesco');
		echo $this->Form->input('fecha');
		echo $this->Form->input('hora');
		echo $this->Form->input('telefono1');
		echo $this->Form->input('telefono2');
		echo $this->Form->input('telefono3');
		echo $this->Form->input('celular');
		echo $this->Form->input('email');
		echo $this->Form->input('ciudad');
		echo $this->Form->input('direccion');
		echo $this->Form->input('fax');
		echo $this->Form->input('nombre_padre');
		echo $this->Form->input('nombre_madre');
		echo $this->Form->input('telefonooficina_padre');
		echo $this->Form->input('telefonooficina_madre');
		echo $this->Form->input('celular_padre');
		echo $this->Form->input('celular_madre');
		echo $this->Form->input('mail_padre');
		echo $this->Form->input('mail_madre');
		echo $this->Form->input('nombre_quinceanera');
		echo $this->Form->input('telefono_quinceanera');
		echo $this->Form->input('mail_quinceanera');
		echo $this->Form->input('celular_quinceanera');
		echo $this->Form->input('anoviaje_quinceanera');
		echo $this->Form->input('mesviaje_quinceanera');
		echo $this->Form->input('estado');
		echo $this->Form->input('Agencia');
		echo $this->Form->input('Destino');
		echo $this->Form->input('Medio');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Seguimiento.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Seguimiento.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Seguimientos'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
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
