<div class="trackers form">
<?php echo $this->Form->create('Tracker');?>
	<fieldset>
		<legend><?php echo __('Admin Add Tracker'); ?></legend>
	<?php
		echo $this->Form->input('destinos_seguimientos_id');
		echo $this->Form->input('correo_usuario');
		echo $this->Form->input('fecha_ingreso');
		echo $this->Form->input('revisado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Trackers'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Destinos Seguimientos'), array('controller' => 'destinos_seguimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Destinos Seguimientos'), array('controller' => 'destinos_seguimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>
