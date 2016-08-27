<div class="seguimientos form">
<?php echo $this->Form->create('Seguimiento');?>
	<fieldset>
		<legend><?php echo __('Agregar Seguimiento'); ?></legend>
	<?php
		echo $this->Form->input('users_id');
		echo $this->Form->input('departamentos_id');
		echo $this->Form->input('ciudades_id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('parentesco');
		echo $this->Form->input('fecha');
		echo $this->Form->input('hora');
		echo $this->Form->input('telefono1');
		echo $this->Form->input('telefono2');
		echo $this->Form->input('telefono3');
		echo $this->Form->input('celular');
		echo $this->Form->input('email');
		echo $this->Form->input('ciudad');
		echo $this->Form->input('direccion');
		echo $this->Form->input('fax');
		echo $this->Form->input('nombre_padre');
		echo $this->Form->input('nombre_madre');
		echo $this->Form->input('telefonooficina_padre');
		echo $this->Form->input('telefonooficina_madre');
		echo $this->Form->input('celular_padre');
		echo $this->Form->input('celular_madre');
		echo $this->Form->input('mail_padre');
		echo $this->Form->input('mail_madre');
		echo $this->Form->input('nombre_quinceanera');
		echo $this->Form->input('telefono_quinceanera');
		echo $this->Form->input('mail_quinceanera');
		echo $this->Form->input('celular_quinceanera');
		echo $this->Form->input('anoviaje_quinceanera');
		echo $this->Form->input('mesviaje_quinceanera');
		echo $this->Form->input('estado',array('options' => array(
         '1'=>'Activado',
         '2'=>'Desactivado'
        )));
		echo $this->Form->input('Agencia');
		echo $this->Form->input('Destino');
		echo $this->Form->input('Medio');
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

