<div class="medios form">
<?php echo $this->Form->create('Medio');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Medio'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('fechaingreso');
		echo $this->Form->input('activo');
		echo $this->Form->input('Seguimiento');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Medio.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Medio.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Medios'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Seguimientos'), array('controller' => 'seguimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seguimiento'), array('controller' => 'seguimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>
