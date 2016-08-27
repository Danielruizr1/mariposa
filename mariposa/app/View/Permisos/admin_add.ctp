<div class="permisos form">
<?php echo $this->Form->create('Permiso');?>
	<fieldset>
		<legend><?php echo __('Agregar Permiso'); ?></legend>
	<?php
	    echo $this->Form->input('users_id',array('empty' => 'Escoja El Usuario a Editar'));
		echo $this->Form->input('tablas_id',array('id' => 'tablas','empty' => 'Escoja la tabla de su interes', 'onchange'=>'llamarajax()'));
		//echo $this->Form->input('campos_id',array('id' => 'campos','empty' => 'Escoja el campo', 'div'=>'carga'));
		echo '<div class="input select" id="carga"></div>';
		echo $this->Form->input('fecha_ingreso');
		echo $this->Form->input('fecha_modificacion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
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
	 id=document.getElementById('tablas').value;
	 require(["dojo/_base/xhr"],
    function(xhr) {
        // Execute a HTTP GET request
        xhr.get({
            // The URL to request
            url: "http://www.expertoseningles.com/v15/mariposa/admin/campos/llenar_sub_categorias/"+id,
            // The method that handles the request's successful result
            // Handle the response any way you'd like!
            load: function(result) {
                /*alert("The message is: " + result);*/
	            document.getElementById('carga').innerHTML=result;
            }
        });        
    });
 } 
</script>