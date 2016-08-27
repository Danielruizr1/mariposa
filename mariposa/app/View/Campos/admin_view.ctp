<div class="campos view">
<h2><?php  echo __('Campo');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($campo['Campo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tablas'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campo['Tablas']['id'], array('controller' => 'tablas', 'action' => 'view', $campo['Tablas']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($campo['Campo']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($campo['Campo']['tipo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Campo'), array('action' => 'edit', $campo['Campo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Campo'), array('action' => 'delete', $campo['Campo']['id']), null, __('Are you sure you want to delete # %s?', $campo['Campo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Campos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tablas'), array('controller' => 'tablas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tablas'), array('controller' => 'tablas', 'action' => 'add')); ?> </li>
	</ul>
</div>
