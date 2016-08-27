<div class="mediosSeguimientos view">
<h2><?php  echo __('Medios Seguimiento');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mediosSeguimiento['MediosSeguimiento']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Medio'); ?></dt>
		<dd>
			<?php echo $this->Html->link($mediosSeguimiento['Medio']['id'], array('controller' => 'medios', 'action' => 'view', $mediosSeguimiento['Medio']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seguimiento'); ?></dt>
		<dd>
			<?php echo $this->Html->link($mediosSeguimiento['Seguimiento']['id'], array('controller' => 'seguimientos', 'action' => 'view', $mediosSeguimiento['Seguimiento']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Medios Seguimiento'), array('action' => 'edit', $mediosSeguimiento['MediosSeguimiento']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Medios Seguimiento'), array('action' => 'delete', $mediosSeguimiento['MediosSeguimiento']['id']), null, __('Are you sure you want to delete # %s?', $mediosSeguimiento['MediosSeguimiento']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Medios Seguimientos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medios Seguimiento'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Medios'), array('controller' => 'medios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medio'), array('controller' => 'medios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seguimientos'), array('controller' => 'seguimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seguimiento'), array('controller' => 'seguimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>
