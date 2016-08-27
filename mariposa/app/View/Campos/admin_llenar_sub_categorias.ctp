<?php
$tabla= '<label for="campos">Campos del Módulo</label>
 <table>
  <tr>
   <th>NOMBRE</th>
   <th>CREAR</th>
   <th>EDITAR</th>
   <th>ELIMINAR</th>
   <th>LEER</th>
  <tr> 
';
foreach ($permisos as $permiso){
       if($permiso['Campos']['nombre']=='Todo el Módulo'){
		$linea1.='<tr>
	         <td style="text-align:center">'.$permiso['Campos']['nombre'].'
			  <input type="hidden" name="idcampo[]" value="'.$permiso['Campos']['id'].'"/>
			 </td>';
			 if($permiso['Permiso']['crear']==1){
				 $linea1.='<td style="text-align:center">'.$this->Form->input('&nbsp;',array('name'=>'crear'.$permiso['Campos']['id'],'selected' => true,'multiple'=>'checkbox','options' => array(
                   '1'=>''
                    ))).'</td>';
			 }else{
				 $linea1.='<td style="text-align:center">'.$this->Form->input('&nbsp;',array('name'=>'crear'.$permiso['Campos']['id'],'selected' => false,'multiple'=>'checkbox','options' => array(
                   '1'=>''
                    ))).'</td>';
			 }
			 if($permiso['Permiso']['actualizar']==1){
				 $linea1.='<td style="text-align:center">'.$this->Form->input('&nbsp;',array('name'=>'actualizar'.$permiso['Campos']['id'],'checked' => true, 'onchange'=>'activar(this)','type'=>'checkbox', 'style'=>'margin-top:1.5em;margin-left:0.5em')).'</td>';
			 }else{
				 $linea1.='<td style="text-align:center">'.$this->Form->input('&nbsp;',array('name'=>'actualizar'.$permiso['Campos']['id'],'checked' => false, 'onchange'=>'activar(this)','type'=>'checkbox', 'style'=>'margin-top:1.5em;margin-left:0.5em')).'</td>';
			 }
			 if($permiso['Permiso']['eliminar']==1){
				 $linea1.='<td style="text-align:center">'.$this->Form->input('&nbsp;',array('name'=>'eliminar'.$permiso['Campos']['id'],'selected' => true,'multiple'=>'checkbox','options' => array(
                   '1'=>''
                    ))).'</td>';
			 }else{
				 $linea1.='<td style="text-align:center">'.$this->Form->input('&nbsp;',array('name'=>'eliminar'.$permiso['Campos']['id'],'selected' => false,'multiple'=>'checkbox','options' => array(
                   '1'=>''
                    ))).'</td>';
			 }
			 if($permiso['Permiso']['seleccionar']==1){
				 $linea1.='<td style="text-align:center;border-right:1px solid #ddd;">'.$this->Form->input('&nbsp;',array('name'=>'seleccionar'.$permiso['Campos']['id'],'selected' => true,'multiple'=>'checkbox','options' => array(
                   '1'=>''
                    ))).'</td>';
			 }else{
				 $linea1.='<td style="border-right:1px solid #ddd; text-align:center">'.$this->Form->input('&nbsp;',array('name'=>'seleccionar'.$permiso['Campos']['id'],'selected' => false,'multiple'=>'checkbox','options' => array(
                   '1'=>''
                    ))).'</td>';
			 }
 }else{
	 $linea2.='<tr>
	         <td style="text-align:center">'.$permiso['Campos']['nombre'].'
			  <input type="hidden" name="idcampo[]" value="'.$permiso['Campos']['id'].'"/>
			 </td>';
			 if($permiso['Permiso']['crear']==1){
				 $linea2.='<td style="text-align:center"><div style="display:none">'.$this->Form->input('&nbsp;',array('name'=>'crear'.$permiso['Campos']['id'],'selected' => true,'multiple'=>'checkbox','options' => array(
                   '1'=>''
                    ))).'</div></td>';
			 }else{
				 $linea2.='<td style="text-align:center"><div style="display:none">'.$this->Form->input('&nbsp;',array('name'=>'crear'.$permiso['Campos']['id'],'selected' => false,'multiple'=>'checkbox','options' => array(
                   '1'=>''
                    ))).'</div></td>';
			 }
			 if($permiso['Permiso']['actualizar']==1){
				 $linea2.='<td style="text-align:center">'.$this->Form->input('&nbsp;',array('name'=>'actualizar'.$permiso['Campos']['id'],'selected' => true,'multiple'=>'checkbox','options' => array(
                   '1'=>''
                    ))).'</td>';
			 }else{
				 $linea2.='<td style="text-align:center">'.$this->Form->input('&nbsp;',array('name'=>'actualizar'.$permiso['Campos']['id'],'selected' => false,'multiple'=>'checkbox','options' => array(
                   '1'=>''
                    ))).'</td>';
			 }
			 if($permiso['Permiso']['eliminar']==1){
				 $linea2.='<td style="text-align:center"><div style="display:none">'.$this->Form->input('&nbsp;',array('name'=>'eliminar'.$permiso['Campos']['id'],'selected' => true,'multiple'=>'checkbox','options' => array(
                   '1'=>''
                    ))).'</div></td>';
			 }else{
				 $linea2.='<td style="text-align:center"><div style="display:none">'.$this->Form->input('&nbsp;',array('name'=>'eliminar'.$permiso['Campos']['id'],'selected' => false,'multiple'=>'checkbox','options' => array(
                   '1'=>''
                    ))).'</div></td>';
			 }
			 if($permiso['Permiso']['seleccionar']==1){
				 $linea2.='<td style="text-align:center;border-right:1px solid #ddd;"><div style="display:none">'.$this->Form->input('&nbsp;',array('name'=>'seleccionar'.$permiso['Campos']['id'],'selected' => true,'multiple'=>'checkbox','options' => array(
                   '1'=>''
                    ))).'</div></td>';
			 }else{
				 $linea2.='<td style="text-align:center;border-right:1px solid #ddd;"><div style="display:none">'.$this->Form->input('&nbsp;',array('name'=>'seleccionar'.$permiso['Campos']['id'],'selected' => false,'multiple'=>'checkbox','options' => array(
                   '1'=>''
                    ))).'</div></td>';
			 }
 }
}
$tabla.=$linea1.$linea2.'</table>';
echo $tabla;
?>