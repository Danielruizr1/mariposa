<div class="tablas index">
     <div style="width:100%">
	<div style="float:left; margin-top:15px;"><h2 style="color:#7907F8;font-size: 20px;">Documentos</h2></div>
<div style="float:right; margin-top:10px;">
  <form action="#" method="post" id="destinocumentosForm">
     <select name="dest_add" id="dest_add" onchange="this.form.submit()">
      <option></option>
     <?php
       $nombre=''; 
       $elid='';
       foreach($destinos as $destino){ 
      if(empty($nombre)){
       echo '<option value="'.$destino['Destino']['id'].'/'.$destino['Destino']['nombre'].'">'.$destino['Destino']['nombre'].'</option>'; 
       $nombre=$destino['Destino']['nombre'];
       $elid = $destino['Destino']['id'];
      }
      else{
      if($nombre!=$destino['Destino']['nombre']){
        echo '<option value="'.$destino['Destino']['id'].'/'.$destino['Destino']['nombre'].'">'.$destino['Destino']['nombre'].'</option>'; 
        $nombre=$destino['Destino']['nombre'];
        $elid = $destino['Destino']['id'];
      } 
      }
     }?>
           </select> 
           </form>  
     </div>
    </div>
    <?php

if(isset($_POST['dest_add'])){ $parts = explode("/", $_POST['dest_add']);       ?>

    <div style="text-align:center;">
<h4 class="first"> <?php echo $parts[1]; ?> </h4>
</div>
<?php } ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo 'Nombre';?></th>
      <th><?php echo 'Vincular';?></th>
	</tr>
	<?php
  $count=0;
if(isset($_POST['dest_add'])){
	foreach ($documentos as $documento): 
    ?>
  <tr>
  
	
		<td><?php echo $this->Html->link($this->Html->image('editar.png', array('alt' => __('Editar usuario'), 'border' => '0')), array('action' => 'edit', $documento['Documento']['id']),array('escape' => false)); ?><?php echo $documento['Documento']['nombre']; ?>&nbsp;</td>
 <?php foreach ($destinocumentos as $destinocu): 
if($destinocu['Destinocumento']['doc_id'] == $documento['Documento']['id'] && $destinocu['Destinocumento']['destID'] == $parts[0] ) {
$count = 1; 
 ?>
   <td style="text-align:center"> <?php echo $this->Form->postLink($this->Html->image('borrar.png', array('alt' => __('Borrar usuario'), 'border' => '0')), array('action' => 'delete', $destinocu['Destinocumento']['id']), array('escape' => false), __('Desea desvincular el documento %s?', $destinocu['Destinocumento']['id'])); ?></td>
    <?php }; endforeach; ?>
 <?php if($count==1){ $count=0; ?>
 <?php } else { ?>  
   <td style="text-align:center"> <?php echo $this->Form->postLink($this->Form->input('.', array('type' => 'checkbox') ), array('controller'=>'Destinocumentos','action' => 'add'), array('escape' => false, 'data'=> array('doc_id' => $documento['Documento']['id'], 'destID' => $parts[0])), __('Desea Vincular El Documento %s?', $documento['Documento']['nombre'])); ?></td>
 <?php } ?>  
    </tr> 
 <?php endforeach; } else { 
  foreach ($documentos as $documento):
  ?>
<tr>
    <td><?php echo $this->Html->link($this->Html->image('editar.png', array('alt' => __('Editar usuario'), 'border' => '0')), array('action' => 'edit', $documento['Documento']['id']),array('escape' => false)); ?><?php echo $documento['Documento']['nombre']; ?>&nbsp;</td>
    <td style="text-align:center"> <?php echo $this->Form->postLink($this->Form->input('.', array('type' => 'checkbox') ), array('controller'=>'Destinocumentos','action' => 'add'), array('escape' => false, 'data'=> array('doc_id' => $documento['Documento']['id'], 'destID' => 0)), __('Desea borrar la tabla %s?', $documento['Documento']['id'])); ?></td>
    </tr> 
<?php  endforeach; } ?>  
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
