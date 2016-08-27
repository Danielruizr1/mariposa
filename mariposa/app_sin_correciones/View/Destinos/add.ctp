<div class="destinos form">
<?php echo $this->Form->create('Destino');?>
	<fieldset>
		<legend><?php echo __('Add Destino'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Destinos'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Seguimientos'), array('controller' => 'seguimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seguimiento'), array('controller' => 'seguimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>
