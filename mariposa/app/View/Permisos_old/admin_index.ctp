<div class="permisos index">
	<div style="width:100%">
	<div style="float:left; margin-top:15px;"><h2 style="color:#7907F8;font-size: 20px;"><?php echo __('Permisos');?></h2></div>
     <div style="float:right; margin-right:0px;"><?php echo $this->Html->link(
					$this->Html->image('grabarper.png', array('alt' => __('Agregar nuevo Permiso'), 'border' => '0')),
					array('action' => 'add'),
					array('escape' => false)
				);
			?></div>
    </div>        
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo 'Nombre Campo';?></th>
			<th><?php echo 'Nombre Usuario';?></th>
			<th><?php echo 'Crear';?></th>
			<th><?php echo 'Actualizar';?></th>
			<th><?php echo 'Eliminar';?></th>
			<th><?php echo 'Seleccionar';?></th>
			<th><?php echo 'Ninguno';?></th>
			<th><?php echo 'Todos';?></th>
			<th><?php echo 'Fecha de Ingreso';?></th>
			<th><?php echo 'Fecha de Modificacion';?></th>
			<th align="center"><?php echo __('Borrar');?></th>
	</tr>
	<?php
	foreach ($permisos as $permiso): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($this->Html->image('editar.png', array('alt' => __('Editar  Permiso'), 'border' => '0')), array('action' => 'edit', $permiso['Permiso']['id']),array('escape' => false)); ?><?php echo $permiso['Campos']['nombre']; ?>
		</td>
		<td>
			<?php echo $permiso['Users']['nombre']; ?>
		</td>
		<td><?php echo $permiso['Permiso']['crear']; ?>&nbsp;</td>
		<td><?php echo $permiso['Permiso']['actualizar']; ?>&nbsp;</td>
		<td><?php echo $permiso['Permiso']['eliminar']; ?>&nbsp;</td>
		<td><?php echo $permiso['Permiso']['seleccionar']; ?>&nbsp;</td>
		<td><?php echo $permiso['Permiso']['ninguno']; ?>&nbsp;</td>
		<td><?php echo $permiso['Permiso']['todos']; ?>&nbsp;</td>
		<td><?php echo $permiso['Permiso']['fecha_ingreso']; ?>&nbsp;</td>
		<td><?php echo $permiso['Permiso']['fecha_modificacion']; ?>&nbsp;</td>
        <td style="border-right:1px solid #ddd; text-align:center"><?php echo $this->Form->postLink($this->Html->image('borrar.png', array('alt' => __('Borrar  Permiso'), 'border' => '0')), array('action' => 'delete', $permiso['Permiso']['id']),array('escape' => false), __('Desea borrar el permiso # %s?', $permiso['Permiso']['id'])); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('USUARIOS'), array('action' => 'index')); ?></li>
         <li><?php echo $this->Html->link(__('GESTOR DE PERMISOS'), array('controller'=>'Permisos','action' => 'index')); ?></li>
        <li><div style="color:#FFF; padding-bottom:5px; font-size:14px; font-weight:bold">ALMACENES</div>
          <ul class="internas">
            <li><?php echo $this->Html->link(__('SEGUIMIENTOS'), array('controller'=>'Seguimientos','action' => 'index'), array('id'=>'inter')); ?></li>
            <li><?php echo $this->Html->link(__('TABLAS'), array('controller'=>'Tablas','action' => 'index'), array('id'=>'inter')); ?></li>
            <li><?php echo $this->Html->link(__('CAMPOS'), array('controller'=>'Campos','action' => 'index'), array('id'=>'inter')); ?></li>
            <li><?php echo $this->Html->link(__('DEPARTAMENTOS'), array('controller'=>'Departamentos','action' => 'index'), array('id'=>'inter')); ?></li>
            <li><?php echo $this->Html->link(__('CIUDADES'), array('controller'=>'Ciudades','action' => 'index'), array('id'=>'inter')); ?></li>
            <li><?php echo $this->Html->link(__('AGENCIAS'), array('controller'=>'Agencias','action' => 'index'), array('id'=>'inter')); ?></li>
            <li><?php echo $this->Html->link(__('DESTINOS'), array('controller'=>'Destinos','action' => 'index'), array('id'=>'inter')); ?></li>
            <li><?php echo $this->Html->link(__('MEDIOS'), array('controller'=>'Medios','action' => 'index'), array('id'=>'inter')); ?></li>
          </ul>
        </li>
	</ul>
    <br />
    <br />
    <br />
    <ul>
     <li><?php echo $this->Html->link(__('CERRAR SESION'), array('controller'=>'Users','action' => 'admin_logout')); ?></li>
    </ul>
</div>

