<div class="users index" style="background:#FFF">
   <div style="width:100%">
	<div style="float:left; margin-top:15px;"><h2 style="color:#7907F8;font-size: 20px;">Control de Usuarios</h2></div>
    <div style="float:right;"><?php echo $this->Html->link(
					$this->Html->image('grabar.png', array('alt' => __('Agregar nuevo usuario'), 'border' => '0')),
					array('action' => 'add'),
					array('escape' => false)
				);
			?></div>
    </div>        
	<table cellpadding="0" cellspacing="0">
	<tr>
	  <th>Usuario</th>
      <th>Nombre</th>
      <th align="center">Borrar</th>
	</tr>
	<?php
	foreach ($users as $user): ?>
	<tr>
		<td><?php echo $this->Html->link($this->Html->image('editar.png', array('alt' => __('Editar usuario'), 'border' => '0')),array('action' => 'edit', $user['User']['id']),array('escape' => false)); ?><?php echo $user['User']['email']; ?>&nbsp;</td>
		<td><?php echo $user['User']['nombre']; ?>&nbsp;</td>
		<td style="border-right:1px solid #ddd; text-align:center"><?php echo $this->Form->postLink($this->Html->image('borrar.png', array('alt' => __('Borrar usuario'), 'border' => '0')),array('action' => 'delete', $user['User']['id']),array('escape' => false), __('Desea eliminar al usuario %s?', $user['User']['nombre'])); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('USUARIOS'), array('controller'=>'users','action' => 'index')); ?></li>
         <li><?php echo $this->Html->link(__('GESTOR DE PERMISOS'), array('controller'=>'Permisos','action' => 'index')); ?></li>
         <li><?php echo $this->Html->link(__('SEGUIMIENTOS'), array('controller'=>'Seguimientos','action' => 'index')); ?></li>
        <li><div style="color:#FFF; padding-bottom:5px; font-size:14px; font-weight:bold">ALMACENES</div>
          <ul class="internas">
            <li><?php echo $this->Html->link(__('TABLAS'), array('controller'=>'Tablas','action' => 'index'), array('id'=>'inter')); ?></li>
            <li><?php echo $this->Html->link(__('CAMPOS'), array('controller'=>'Campos','action' => 'index'), array('id'=>'inter')); ?></li>
            <li><?php echo $this->Html->link(__('DEPARTAMENTOS'), array('controller'=>'Departamentos','action' => 'index'), array('id'=>'inter')); ?></li>
            <li><?php echo $this->Html->link(__('CIUDADES'), array('controller'=>'Ciudades','action' => 'index'), array('id'=>'inter')); ?></li>
            <li><?php echo $this->Html->link(__('AGENCIAS'), array('controller'=>'Agencias','action' => 'index'), array('id'=>'inter')); ?></li>
            <li><?php echo $this->Html->link(__('DESTINOS'), array('controller'=>'Destinos','action' => 'index'), array('id'=>'inter')); ?></li>
            <li><?php echo $this->Html->link(__('MEDIOS'), array('controller'=>'Medios','action' => 'index'), array('id'=>'inter')); ?></li>
            <li><?php echo $this->Html->link(__('DOCUMENTOS'), array('controller'=>'Documentos','action' => 'index'), array('id'=>'inter')); ?></li>
            <li><?php echo $this->Html->link(__('DESTINOCUMENTOS'), array('controller'=>'Destinocumentos','action' => 'index'), array('id'=>'inter')); ?></li>
            <li><?php echo $this->Html->link(__('DETALLEDOCUMENTOS'), array('controller'=>'DetalleDocumentos','action' => 'index'), array('id'=>'inter')); ?></li>
            <li><?php echo $this->Html->link(__('PAGOSDESTINO'), array('controller'=>'PagosDestino','action' => 'index'), array('id'=>'inter')); ?></li>
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
