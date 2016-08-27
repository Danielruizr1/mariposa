<div id="fila10" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:0.5em; float:left; ">
            <div style="float:left;" id="obser">
            <label for="time" id="titulo">Observaciones:</label><br/>
            <textarea   id="SeguimientoObservacion" style="width:750px;height:50px;border: 1px solid #D7D7D7;-moz-border-radius: 5px;border-radius: 5px;">
            </textarea>
            </div>
            </div>

             <div id="fila9" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
             <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Estado:</label><br/>
            <select name="estado" id="estado" onChange="" style="width:220px">
         <option value="1" selected="selected">Pendiente</option>
         <option value="2">Inscrita</option>
         <option value="3">No Inscrita</option>
       </select>
            </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Fase:</label><br/>
            <select name="data[Seguimiento][fase]" id="fase" onChange="" style="width:220px">
         <option value="1" selected="selected">1.Inicio</option>
         <option value="2">2.Volver a llamar</option>
         <option value="3">3.Posponen viaje</option>
         <option value="4">4.Envié datos para cosignar y documentos de inscripción</option>
         <option value="5">5.Visité a cliente </option>
         <option value="6">6.Concreté cita en la oficina</option>
         <option value="7">7.Les atendí en la oficina</option>
         <option value="8">8.Dejé mensaje telefónico</option>
         <option value="9">9.Envié revista</option>
         <option value="10">10.Fin</option>

         /v15/mariposa/img/"+destinoNombre+"/"+mesquin+"/"+anoquin+"/"+nombre+"
       </select>
            </div>
          <div style="float:left;padding-left:0.5em">  
         <label for="time" id="titulo">Interés:</label><br/>
         <select name="data[Seguimiento][interes]" id="interes" onChange="" style="width:220px">
         <option value="1">Muy Interesado</option>
         <option value="2">Medianamente Interesado</option>
         <option value="3">Poco Interesado</option>

         </select>
         </div>
         <div style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Ultimo Contacto:</label><br/>
             <input dojoType="dijit.form.ValidationTextBox" id="ultimo_contacto" name="data[Seguimiento][ultimo_contacto]"  style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border: #D7D7D7 solid 1px" />
             </div>
         <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Motivo De No Viaje:</label><br/>
            <select name="data[Seguimiento][fase]" id="motivo" onChange="" style="width:220px">
         <option value="1.FIESTA">1.Fiesta</option>
         <option value="2.OTRO REGALO (CARRO, MOTO, INTERCAMBIO, CIRUGíA, DINERO)">2.Otro regalo (carro, moto, intercambio, cirugía, dinero)</option>
         <option value="3.PRESUPUESTO">3.Presupuesto</option>
         <option value="4.ESCOGEN OTRA AGENCIA">4.Escogen otra agencia</option>
         <option value="5.COMPRA VIAJE LOCAL">5.Compra viaje local</option>
         <option value="6.VIAJE FAMILIAR">6.Viaje familiar</option>
         <option value="7.MAL COMPORTAMIENTO">7.Mal comportamiento</option>
         <option value="8.ESCOGE DESTINO QUE NO TENEMOS">8.Escoge destino que no tenemos</option>
         <option value="9.DESCONFIAN">9.Desconfian</option>

         </select>
         </div>


         $this->Form->postLink($this->Form->input('.', array('type' => 'checkbox') ), array('controller'=>'Destinocumentos','action' => 'add'), array('escape' => false, 'data'=> array('doc_id' => $documento['Documento']['id'], 'destino_id' => '<input id="adminDestID" type="hidden">',),), __('Desea borrar la tabla %s?', $documento['Documento']['id']));