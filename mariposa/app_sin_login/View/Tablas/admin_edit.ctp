<div class="tablas form">
<?php echo $this->Form->create('Tabla');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Tabla'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Tabla.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Tabla.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tablas'), array('action' => 'index'));?></li>
	</ul>
</div>
