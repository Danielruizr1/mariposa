<div class="tablas view">
<h2><?php  echo __('Tabla');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tabla['Tabla']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($tabla['Tabla']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($tabla['Tabla']['descripcion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tabla'), array('action' => 'edit', $tabla['Tabla']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tabla'), array('action' => 'delete', $tabla['Tabla']['id']), null, __('Are you sure you want to delete # %s?', $tabla['Tabla']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tablas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tabla'), array('action' => 'add')); ?> </li>
	</ul>
</div>
