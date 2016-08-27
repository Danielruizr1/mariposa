<div class="seguimientos index">
     <div style="width:100%">
	<div style="float:left; margin-top:15px;"><h2 style="color:#7907F8;font-size: 20px;">Seguimientos</h2></div>
    <div style="float:right;"><?php echo $this->Html->link(
					$this->Html->image('grabarseg.png', array('alt' => __('Agregar nuevo seguimiento'), 'border' => '0')),
					array('action' => 'add'),
					array('escape' => false)
				);
			?></div>
    </div>
	<table cellpadding="0" cellspacing="0" style="width:980px;">
	<tr>
			<th style="font-size:11px"><?php echo 'Nombre Quinceanera';?></th>
			<th style="font-size:11px"><?php echo 'Teléfono Quinceanera';?></th>
			<th style="font-size:11px"><?php echo 'Email Quinceanera';?></th>
			<th style="font-size:11px"><?php echo 'Celular Quinceanera';?></th>
            <th style="font-size:11px"><?php echo 'Destino';?></th>
			<th style="font-size:11px"><?php echo 'Año Viaje Quinceanera';?></th>
			<th style="font-size:11px"><?php echo 'Mes Viaje Quinceanera';?></th>
            <th style="font-size:11px"><?php echo 'Usuario';?></th>
            <th style="font-size:11px"><?php echo 'Ciudades';?></th>
            <th style="font-size:11px"><?php echo 'Agencias';?></th>
            <th style="font-size:11px"><?php echo 'Contacto Agencia';?></th>
            <th style="font-size:11px"><?php echo 'Medios';?></th>
            <th style="font-size:11px"><?php echo 'Borrar';?></th>
	</tr>
	<?php
	foreach ($seguimientos as $seguimiento): 
	?>
	<tr>
        <td><?php echo $this->Html->link($this->Html->image('editar.png', array('alt' => __('Editar usuario'), 'border' => '0')), array('action' => 'edit', $seguimiento['Seguimiento']['id']),array('escape' => false)); ?><?php echo $seguimiento['Seguimiento']['nombre_quinceanera']; ?>&nbsp;</td>
		<td><?php echo $seguimiento['Seguimiento']['telefono_quinceanera']; ?>&nbsp;</td>
		<td><?php echo $seguimiento['Seguimiento']['mail_quinceanera']; ?>&nbsp;</td>
		<td><?php echo $seguimiento['Seguimiento']['celular_quinceanera']; ?>&nbsp;</td>
        <td>
			<?php echo $seguimiento['Destino'][0]['nombre']; ?>
		</td>
		<td><?php echo $seguimiento['Seguimiento']['anoviaje_quinceanera']; ?>&nbsp;</td>
		<td><?php echo $seguimiento['Seguimiento']['mesviaje_quinceanera']; ?>&nbsp;</td>
		<td>
			<?php echo $seguimiento['Users']['nombre']; ?>
		</td>
		<td>
			<?php echo $seguimiento['Ciudades']['nombre']; ?>
		</td>
		<td>
			<?php echo $seguimiento['Agencia'][0]['nombre']; ?>
		</td>
        <td>
			<?php echo $seguimiento['Agencia'][0]['nombre_contacto']; ?>
		</td>
		<td>
			<?php echo $seguimiento['Medio'][0]['nombre']; ?>
		</td>
        <td style="text-align:center">
			<?php echo $this->Form->postLink($this->Html->image('borrar.png', array('alt' => __('Borrar usuario'), 'border' => '0')), array('action' => 'delete', $seguimiento['Seguimiento']['id']),array('escape' => false), __('Desea eliminar el seguimiento de la señorita %s?', $seguimiento['Seguimiento']['nombre_quinceanera'])); ?>
		</td>
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
