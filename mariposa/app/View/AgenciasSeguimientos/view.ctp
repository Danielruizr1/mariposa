<div class="agenciasSeguimientos view">
<h2><?php  echo __('Agencias Seguimiento');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($agenciasSeguimiento['AgenciasSeguimiento']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Agencia'); ?></dt>
		<dd>
			<?php echo $this->Html->link($agenciasSeguimiento['Agencia']['id'], array('controller' => 'agencias', 'action' => 'view', $agenciasSeguimiento['Agencia']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seguimiento'); ?></dt>
		<dd>
			<?php echo $this->Html->link($agenciasSeguimiento['Seguimiento']['id'], array('controller' => 'seguimientos', 'action' => 'view', $agenciasSeguimiento['Seguimiento']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Agencias Seguimiento'), array('action' => 'edit', $agenciasSeguimiento['AgenciasSeguimiento']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Agencias Seguimiento'), array('action' => 'delete', $agenciasSeguimiento['AgenciasSeguimiento']['id']), null, __('Are you sure you want to delete # %s?', $agenciasSeguimiento['AgenciasSeguimiento']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Agencias Seguimientos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agencias Seguimiento'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Agencias'), array('controller' => 'agencias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agencia'), array('controller' => 'agencias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seguimientos'), array('controller' => 'seguimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seguimiento'), array('controller' => 'seguimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>
