<div class="agencias form">
<?php echo $this->Form->create('Agencia');?>
	<fieldset>
		<legend><?php echo __('Agregar Agencia'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('activo',array('options' => array(
         '1'=>'Si',
         '2'=>'No'
        )));
		echo $this->Form->input('direccion_agencia');
		echo $this->Form->input('departamentos_id', array('label'=>'Departamento'));
		echo $this->Form->input('ciudades_id', array('label'=>'Ciudad'));
		echo $this->Form->input('telefono_agencia', array('label'=>'Teléfono Agencia'));
		echo $this->Form->input('nombre_contacto');
		echo $this->Form->input('telefono_contacto', array('label'=>'Teléfono Contacto'));
		echo $this->Form->input('mail_contacto', array('label'=>'Email Contacto'));
		echo $this->Form->input('nombre_contacto_2');
		echo $this->Form->input('telefono_contacto_2', array('label'=>'Teléfono Contacto 2'));
		echo $this->Form->input('mail_contacto_2',array('label'=>'Email Contacto 2'));
		echo $this->Form->input('nombre_contacto_3');
		echo $this->Form->input('telefono_contacto_3', array('label'=>'Teléfono Contacto 3'));
		echo $this->Form->input('mail_contacto_3',array('label'=>'Email Contacto 3'));
		echo $this->Form->input('web');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar'));?>
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
