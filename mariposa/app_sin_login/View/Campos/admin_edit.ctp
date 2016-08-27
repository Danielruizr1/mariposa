<div class="campos form">
<?php echo $this->Form->create('Campo');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Campo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tablas_id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('tipo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Campo.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Campo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Campos'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Tablas'), array('controller' => 'tablas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tablas'), array('controller' => 'tablas', 'action' => 'add')); ?> </li>
	</ul>
</div>
