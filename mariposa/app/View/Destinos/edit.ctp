<div class="destinos form">
<?php echo $this->Form->create('Destino');?>
	<fieldset>
		<legend><?php echo __('Edit Destino'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('sigla');
		echo $this->Form->input('activo');
		echo $this->Form->input('Seguimiento');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Destino.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Destino.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Destinos'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Seguimientos'), array('controller' => 'seguimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seguimiento'), array('controller' => 'seguimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>
