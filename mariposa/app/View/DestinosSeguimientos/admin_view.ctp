<div class="destinosSeguimientos view">
<h2><?php  echo __('Destinos Seguimiento');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($destinosSeguimiento['DestinosSeguimiento']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Destino'); ?></dt>
		<dd>
			<?php echo $this->Html->link($destinosSeguimiento['Destino']['id'], array('controller' => 'destinos', 'action' => 'view', $destinosSeguimiento['Destino']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seguimiento'); ?></dt>
		<dd>
			<?php echo $this->Html->link($destinosSeguimiento['Seguimiento']['id'], array('controller' => 'seguimientos', 'action' => 'view', $destinosSeguimiento['Seguimiento']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Destinos Seguimiento'), array('action' => 'edit', $destinosSeguimiento['DestinosSeguimiento']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Destinos Seguimiento'), array('action' => 'delete', $destinosSeguimiento['DestinosSeguimiento']['id']), null, __('Are you sure you want to delete # %s?', $destinosSeguimiento['DestinosSeguimiento']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Destinos Seguimientos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Destinos Seguimiento'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Destinos'), array('controller' => 'destinos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Destino'), array('controller' => 'destinos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seguimientos'), array('controller' => 'seguimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seguimiento'), array('controller' => 'seguimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>
