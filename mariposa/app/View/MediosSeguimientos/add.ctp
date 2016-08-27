<div class="mediosSeguimientos form">
<?php echo $this->Form->create('MediosSeguimiento');?>
	<fieldset>
		<legend><?php echo __('Add Medios Seguimiento'); ?></legend>
	<?php
		echo $this->Form->input('medio_id');
		echo $this->Form->input('seguimiento_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Medios Seguimientos'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Medios'), array('controller' => 'medios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medio'), array('controller' => 'medios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seguimientos'), array('controller' => 'seguimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seguimiento'), array('controller' => 'seguimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>
