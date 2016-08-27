<div class="trackers view">
<h2><?php  echo __('Tracker');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tracker['Tracker']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Destinos Seguimientos'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tracker['DestinosSeguimientos']['id'], array('controller' => 'destinos_seguimientos', 'action' => 'view', $tracker['DestinosSeguimientos']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Correo Usuario'); ?></dt>
		<dd>
			<?php echo h($tracker['Tracker']['correo_usuario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Ingreso'); ?></dt>
		<dd>
			<?php echo h($tracker['Tracker']['fecha_ingreso']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Revisado'); ?></dt>
		<dd>
			<?php echo h($tracker['Tracker']['revisado']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tracker'), array('action' => 'edit', $tracker['Tracker']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tracker'), array('action' => 'delete', $tracker['Tracker']['id']), null, __('Are you sure you want to delete # %s?', $tracker['Tracker']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Trackers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tracker'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Destinos Seguimientos'), array('controller' => 'destinos_seguimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Destinos Seguimientos'), array('controller' => 'destinos_seguimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>
