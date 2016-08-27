<div class="ciudades form">
<?php echo $this->Form->create('Ciudade');?>
	<fieldset>
		<legend><?php echo __('Edit Ciudade'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('indicativo');
		echo $this->Form->input('departamentos_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Ciudade.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Ciudade.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ciudades'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Departamentos'), array('controller' => 'departamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Departamentos'), array('controller' => 'departamentos', 'action' => 'add')); ?> </li>
	</ul>
</div>
