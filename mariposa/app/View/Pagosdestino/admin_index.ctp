<div class="tablas index">
     <div style="width:100%">
  <div style="float:left; margin-top:15px;"><h2 style="color:#7907F8;font-size: 20px;">Detalles</h2></div>
    <div style="float:right; margin-top:10px;">
  <form action="#" method="post" id="destinocumentosForm">
     <select name="dest_add" id="dest_add" onchange="this.form.submit()">
      <option></option>
     <?php
       $nombre=''; 
       $elid='';
       print_r($destinos);
       foreach($destinos as $Destino){ 

      if(empty($nombre)){
       echo '<option value="'.$Destino['Destino']['id'].'/'.$Destino['Destino']['nombre'].'">'.$Destino['Destino']['nombre'].'</option>'; 
       $nombre=$Destino['Destino']['nombre'];
       $elid = $Destino['Destino']['id'];
      }
      else{
      if($nombre!=$Destino['Destino']['nombre']){
        echo '<option value="'.$Destino['Destino']['id'].'/'.$Destino['Destino']['nombre'].'">'.$Destino['Destino']['nombre'].'</option>'; 
        $nombre=$Destino['Destino']['nombre'];
        $elid = $Destino['Destino']['id'];
      } 
      }
     }?>
           </select> 
           </form>  
     </div>
     <?php
     if(isset($_POST['dest_add'])){$parts = explode("/", $_POST['dest_add']); $doc = $parts[0];       ?>
     <div><br /></div>
      <div><br /></div>
       <div><br /></div>
        <div><br /></div>
     <div style="float:right;"><?php echo $this->Html->link(
                    $this->Html->image('grabar.png', array('alt' => __('Agregar Documento'), 'border' => '0')),
                    array('action' => 'add', $doc),
                    array('escape' => false)
                );
            ?></div><?php } ?>
     <?php
     if(isset($_POST['dest_add'])){  ?>
    <div><br /></div>
    <div style="text-align:center;">
<h4 class="first"> <?php echo $parts[1]; ?> </h4>
</div>

<?php } ?>
    </div>
  <table cellpadding="0" cellspacing="0">
  <tr>
      <th><?php echo 'Pago';?></th>
      <th><?php echo 'Valor';?></th>
      <th><?php echo 'Moneda';?></th>
      <th><?php echo 'Borrar';?></th>
  </tr>
  <?php
    if(isset($_POST['dest_add'])){
  foreach ($pagosDestino as $documento): 
      if($documento['Pagosdestino']['destino_id'] == $doc) {
        ?>
  <tr>
    <td><?php echo $this->Html->link($this->Html->image('editar.png', array('alt' => __('Editar usuario'), 'border' => '0')), array('action' => 'edit', $documento['Pagosdestino']['id'], $doc),array('escape' => false)); ?><?php echo $documento['Pagosdestino']['pago']; ?>&nbsp;</td>
    <td><?php echo $documento['Pagosdestino']['valor']; ?>&nbsp;</td>
    <td><?php $moneda = $documento['Pagosdestino']['moneda'];
         switch($moneda){
          case 1:
          echo "Pesos";
          break;
          case 2:
          echo "Dolares";
          break;
          case 3:
          echo"Euros";
          break;
         }
     ?>&nbsp;</td>
    <td style="text-align:center"> <?php echo $this->Form->postLink($this->Html->image('borrar.png', array('alt' => __('Borrar usuario'), 'border' => '0')), array('action' => 'delete', $documento['Pagosdestino']['id']), array('escape' => false), __('Desea borrar la tabla %s?', $documento['Pagosdestino']['id'])); ?></td>
  </tr>
<?php }; endforeach; } ?>
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