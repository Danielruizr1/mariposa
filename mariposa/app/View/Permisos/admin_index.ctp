<div class="permisos index">
	<div style="width:100%">
	<div style="float:left; margin-top:10px;"><h2 style="color:#7907F8;font-size: 20px;"><?php echo __('Permisos');?></h2></div>
     <div style="float:right; margin-top:10px;">
     <select>
      <option value="">Seleccione el usuario para filtrar</option>
     <?php
	     $nombre=''; 
	     foreach($permisos as $usuario){ 
		  if(empty($nombre)){
		   echo '<option value="'.$usuario['Users']['nombre'].'">'.$usuario['Users']['email'].'</option>'; 
		   $nombre=$usuario['Users']['nombre'];
		  }
		  else{
			if($nombre!=$usuario['Users']['nombre']){
				echo '<option value="'.$usuario['Users']['nombre'].'">'.$usuario['Users']['email'].'</option>'; 
				$nombre=$usuario['Users']['nombre'];
			} 
		  }
		 }?>
           </select>   
     </div>
    </div>        
	<table cellpadding="0" cellspacing="0">
	<tr>
            <th width="150"><?php echo 'Módulo';?></th>
			<!--<th><?php echo 'Nombre Campo';?></th>-->
			<th><?php echo 'Nombre del Usuario';?></th>
			<th><?php echo 'Crear';?></th>
			<th><?php echo 'Editar';?></th>
			<th><?php echo 'Eliminar';?></th>
			<th><?php echo 'Leer';?></th>
			<!--<th align="center"><?php echo __('Borrar');?></th>--->
	</tr>
	<?php
	foreach ($permisos as $permiso):
	    //print_r($permiso);  
	   $nombre=$permiso['Campos']['nombre'];
	   if($nombre=='Todo el Módulo'){?>
	<tr>
		<td style="text-align:left">
			<?php echo $this->Html->link($this->Html->image('editar.png', array('alt' => __('Editar  Permiso'), 'border' => '0')), array('action' => 'edit', $permiso['Permiso']['id'],
'?' => array('tablas' => $permiso['Tablas']['id'], 'user' => $permiso['Users']['id'])),array('escape' => false)); ?><?php echo $permiso['Tablas']['nombre']; ?>
		</td>
       <!-- <td>
			<?php echo $permiso['Campos']['nombre']; ?>
		</td>--->
		<td style="text-align:left">
			<?php echo $permiso['Users']['nombre']; ?>
		</td>
		<td style="text-align:center"><?php if($permiso['Permiso']['crear']==1)
		           echo $this->Html->image('ok.png', array('alt' => __('Activo'), 'border' => '0'));  
		     ?>&nbsp;</td>
        <td style="text-align:center"><?php if($permiso['Permiso']['actualizar']==1)
		           echo $this->Html->image('ok.png', array('alt' => __('Activo'), 'border' => '0'));  
		     ?>&nbsp;</td>
        <td style="text-align:center"><?php if($permiso['Permiso']['eliminar']==1)
		           echo $this->Html->image('ok.png', array('alt' => __('Activo'), 'border' => '0'));   
		     ?>&nbsp;</td>
        <td style="border-right:1px solid #ddd; text-align:center"><?php if($permiso['Permiso']['seleccionar']==1)
		           echo $this->Html->image('ok.png', array('alt' => __('Activo'), 'border' => '0'));   
		     ?>&nbsp;</td>               
        <!---<td style="border-right:1px solid #ddd; text-align:center"><?php echo $this->Form->postLink($this->Html->image('borrar.png', array('alt' => __('Borrar  Permiso'), 'border' => '0')), array('action' => 'delete', $permiso['Permiso']['id']),array('escape' => false), __('Desea borrar el permiso # %s?', $permiso['Permiso']['id'])); ?>&nbsp;</td>--->
	</tr>
<?php }?>    
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

