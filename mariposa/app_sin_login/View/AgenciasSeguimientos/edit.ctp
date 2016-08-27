<div class="agenciasSeguimientos form">
<?php echo $this->Form->create('AgenciasSeguimiento');?>
	<fieldset>
		<legend><?php echo __('Edit Agencias Seguimiento'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('agencia_id');
		echo $this->Form->input('seguimiento_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AgenciasSeguimiento.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('AgenciasSeguimiento.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Agencias Seguimientos'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Agencias'), array('controller' => 'agencias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agencia'), array('controller' => 'agencias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seguimientos'), array('controller' => 'seguimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seguimiento'), array('controller' => 'seguimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>
