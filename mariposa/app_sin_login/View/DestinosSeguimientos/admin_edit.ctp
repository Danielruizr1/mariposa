<div class="destinosSeguimientos form">
<?php echo $this->Form->create('DestinosSeguimiento');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Destinos Seguimiento'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('destino_id');
		echo $this->Form->input('seguimiento_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('DestinosSeguimiento.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('DestinosSeguimiento.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Destinos Seguimientos'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Destinos'), array('controller' => 'destinos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Destino'), array('controller' => 'destinos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seguimientos'), array('controller' => 'seguimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seguimiento'), array('controller' => 'seguimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>
