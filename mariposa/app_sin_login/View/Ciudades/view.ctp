<div class="ciudades view">
<h2><?php  echo __('Ciudade');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ciudade['Ciudade']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($ciudade['Ciudade']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Indicativo'); ?></dt>
		<dd>
			<?php echo h($ciudade['Ciudade']['indicativo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Departamentos'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ciudade['Departamentos']['id'], array('controller' => 'departamentos', 'action' => 'view', $ciudade['Departamentos']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ciudade'), array('action' => 'edit', $ciudade['Ciudade']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ciudade'), array('action' => 'delete', $ciudade['Ciudade']['id']), null, __('Are you sure you want to delete # %s?', $ciudade['Ciudade']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ciudades'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ciudade'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departamentos'), array('controller' => 'departamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Departamentos'), array('controller' => 'departamentos', 'action' => 'add')); ?> </li>
	</ul>
</div>
