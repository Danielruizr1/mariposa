<div class="mediosSeguimientos form">
<?php echo $this->Form->create('MediosSeguimiento');?>
	<fieldset>
		<legend><?php echo __('Edit Medios Seguimiento'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('medio_id');
		echo $this->Form->input('seguimiento_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MediosSeguimiento.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MediosSeguimiento.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Medios Seguimientos'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Medios'), array('controller' => 'medios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medio'), array('controller' => 'medios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seguimientos'), array('controller' => 'seguimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seguimiento'), array('controller' => 'seguimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>
