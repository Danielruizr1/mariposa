<div class="departamentos form">
<?php echo $this->Form->create('Departamento');?>
	<fieldset>
		<legend><?php echo __('Admin Add Departamento'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Departamentos'), array('action' => 'index'));?></li>
	</ul>
</div>
