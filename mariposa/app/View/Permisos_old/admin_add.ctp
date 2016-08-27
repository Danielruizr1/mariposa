<div class="permisos form">
<?php echo $this->Form->create('Permiso');?>
	<fieldset>
		<legend><?php echo __('Agregar Permiso'); ?></legend>
	<?php
		echo $this->Form->input('tablas_id',array('onchange'=>'llamarajax()'),array('empty' => 'Escoja la tabla de su interes'));
		echo $this->Form->input('users_id');
		echo '<div id="cargacampos"></div>';
		echo $this->Form->input('crear',array('options' => array(
         '1'=>'Activado',
         '2'=>'Desactivado'
        )));
		echo $this->Form->input('actualizar',array('options' => array(
         '1'=>'Activado',
         '2'=>'Desactivado'
        )));
		echo $this->Form->input('eliminar',array('options' => array(
         '1'=>'Activado',
         '2'=>'Desactivado'
        )));
		echo $this->Form->input('seleccionar',array('options' => array(
         '1'=>'Activado',
         '2'=>'Desactivado'
        )));
		echo $this->Form->input('ninguno',array('options' => array(
         '1'=>'Activado',
         '2'=>'Desactivado'
        )));
		echo $this->Form->input('todos',array('options' => array(
         '1'=>'Activado',
         '2'=>'Desactivado'
        )));
		echo $this->Form->input('fecha_ingreso');
		echo $this->Form->input('fecha_modificacion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar'));?>
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
<script type="text/javascript">
 function llamarajax(){
	 id=document.getElementById('PermisoTablasId').value;
	 alert('me llama al cambiar y el id es '+id);
	 require(["dojo/_base/xhr"],
    function(xhr) {
        // Execute a HTTP GET request
        xhr.get({
            // The URL to request
            url: "http://www.viajesde15.com/sistema/mariposa/admin/Permisos/llamaajax/"+id,
            // The method that handles the request's successful result
            // Handle the response any way you'd like!
            load: function(result) {
                alert("The message is: " + result);
	            document.getElementById('cargacampos').innerHTML=result;
	            document.getElementById('cargacampos').style.display='';
            }
        });        
    });
 } 
</script>