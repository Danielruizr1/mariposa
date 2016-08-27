<div class="tablas index">
     <div style="width:100%">
	<div style="float:left; margin-top:15px;"><h2 style="color:#7907F8;font-size: 20px;">Tablas</h2></div>
    <div style="float:right;"><?php /*echo $this->Html->link(
					$this->Html->image('grabartabla.png', array('alt' => __('Agregar nueva tabla'), 'border' => '0')),
					array('action' => 'add'),
					array('escape' => false)
				);*/
			?></div>
    </div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo 'Nombre';?></th>
			<th><?php echo 'Descripción';?></th>
			<th><?php echo 'Borrar';?></th>
	</tr>
	<?php
	foreach ($tablas as $tabla): ?>
	<tr>
		<td><?php echo $this->Html->link($this->Html->image('editar.png', array('alt' => __('Editar usuario'), 'border' => '0')), array('action' => 'edit', $tabla['Tabla']['id']),array('escape' => false)); ?><?php echo $tabla['Tabla']['nombre']; ?>&nbsp;</td>
		<td><?php echo $tabla['Tabla']['descripcion']; ?>&nbsp;</td>
        <td style="text-align:center"> <?php echo $this->Form->postLink($this->Html->image('borrar.png', array('alt' => __('Borrar usuario'), 'border' => '0')), array('action' => 'delete', $tabla['Tabla']['id']), array('escape' => false), __('Desea borrar la tabla %s?', $tabla['Tabla']['id'])); ?></td>
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

