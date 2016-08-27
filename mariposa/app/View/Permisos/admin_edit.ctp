<div class="permisos form">
<?php echo $this->Form->create('Permiso', array('name'=>'permiso'));?>
	<fieldset>
		<legend><?php echo __('Editar permiso'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo '<div style="width:100%">';
		echo '<div style="float:left">'.$this->Form->input('users_id',array('id' => 'users','label'=>'Usuario Activo')).'</div>';
		echo '<div style="float:right; margin-top: -7em; margin-right:40em">'.$this->Form->input('tablas_id',array('id' => 'tablas','label'=>'Módulo Activo')).'</div>';
		echo "</div>";
		echo '<div class="input select" id="carga"></div>';
		echo '<div style="display:none">'.$this->Form->input('fecha_ingreso').'</div>';
		echo '<div style="display:none">'.$this->Form->input('fecha_modificacion').'</div>';
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar'));?>
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

<script type="text/javascript">
 function llamarajax(){
	 id=document.getElementById('tablas').value;
	 user=document.getElementById('users').value;
	 require(["dojo/_base/xhr"],
    function(xhr) {
        // Execute a HTTP GET request
        xhr.get({
            // The URL to request
            url: "http://www.expertoseningles.com/v15/mariposa/admin/campos/llenar_sub_categorias/"+user+"/"+id,
            // The method that handles the request's successful result
            // Handle the response any way you'd like!
            load: function(result) {
	            document.getElementById('carga').innerHTML=result;
            }
        });        
    });
 } 
 function activar(elemento){
	 valor=elemento.checked;
	 if(valor==false){
		 chk=0;
	 }else{
		chk=1; 
	 }
	 for (i=0;i<document.permiso.elements.length;i++){
      if(document.permiso.elements[i].type == "checkbox" && document.permiso.elements[i].name.indexOf('actualizar')!=-1){
         document.permiso.elements[i].checked=chk; }
	 }
 }
 llamarajax();
</script>
