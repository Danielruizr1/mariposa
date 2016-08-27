<div class="agencias index">
	<div style="width:100%">
	<div style="float:left; margin-top:15px;"><h2 style="color:#7907F8; font-size: 20px;"><?php echo __('Agencias');?></h2></div>
    <div style="float:right; margin-right:0px;"><?php echo $this->Html->link(
					$this->Html->image('grabaragen.png', array('alt' => __('Agregar nueva Agencia'), 'border' => '0')),
					array('action' => 'add'),
					array('escape' => false)
				);
			?></div>
     </div>       
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th style="font-size:14px;"><?php echo 'Agencia';?></th>
            <th style="font-size:14px;"><?php echo 'Ciudad';?></th>
            <th style="font-size:14px;"><?php echo 'Teléfono';?></th>
			<th style="font-size:14px;"><?php echo 'Nombre Contacto';?></th>
			<th style="font-size:14px;"><?php echo 'Teléfono Contacto';?></th>
			<th style="font-size:14px;"><?php echo 'Email Contacto';?></th>
            <th align="center" style="font-size:14px;">Borrar</th>
	</tr>
	<?php
	foreach ($agencias as $agencia): ?>
	<tr>
		<td><?php echo $this->Html->link($this->Html->image('editar.png', array('alt' => __('Editar  Agencia'), 'border' => '0')),array('action' => 'edit', $agencia['Agencia']['id']),array('escape' => false)); ?><?php echo $agencia['Agencia']['nombre']; ?>&nbsp;</td>
        <td>
			<?php echo $agencia['Ciudades']['nombre']; ?>
		</td>
        <td><?php echo $agencia['Agencia']['telefono_agencia']; ?>&nbsp;</td>
		<td><?php echo $agencia['Agencia']['nombre_contacto']; ?>&nbsp;</td>
		<td><?php echo $agencia['Agencia']['telefono_contacto']; ?>&nbsp;</td>
		<td><?php echo $agencia['Agencia']['mail_contacto']; ?>&nbsp;</td>
        <td style="border-right:1px solid #ddd; text-align:center"><?php echo $this->Form->postLink($this->Html->image('borrar.png', array('alt' => __('Borrar  Agencia'), 'border' => '0')), array('action' => 'delete', $agencia['Agencia']['id']),array('escape' => false), __('Desea elminiar la agencia # %s?', $agencia['Agencia']['nombre'])); ?>&nbsp;</td>
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
