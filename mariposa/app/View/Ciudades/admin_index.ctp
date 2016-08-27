<div class="ciudades index">
	<div style="width:100%">
	<div style="float:left; margin-top:15px;"><h2 style="color:#7907F8; font-size:20px;"><?php echo __('Ciudades');?></h2></div>
    <div style="float:right; margin-right:50px;"><?php echo $this->Html->link(
					$this->Html->image('grabarciu.png', array('alt' => __('Agregar nueva Ciudad'), 'border' => '0')),
					array('action' => 'add'),
					array('escape' => false)
				);
			?></div>
    </div>        
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>Nombre</th>
			<th>Indicativo Telefónico</th>
			<th align="center">Borrar</th>
	</tr>
	<?php
	foreach ($ciudades as $ciudade): ?>
	<tr>
		<td><?php echo $this->Html->link($this->Html->image('editar.png', array('alt' => __('Editar Ciudad'), 'border' => '0')),array('action' => 'edit', $ciudade['Ciudade']['id']),array('escape' => false)); ?><?php echo $ciudade['Ciudade']['nombre']; ?>&nbsp;</td>
		<td><?php echo $ciudade['Ciudade']['indicativo']; ?>&nbsp;</td>
		<td style="border-right:1px solid #ddd; text-align:center"><?php echo $this->Form->postLink($this->Html->image('borrar.png', array('alt' => __('Eliminar Ciudad'), 'border' => '0')), array('action' => 'delete', $ciudade['Ciudade']['id']),array('escape' => false), __('Desea eliminar la ciuadad %s?', $ciudade['Ciudade']['nombre'])); ?></td>
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

