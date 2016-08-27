<div class="container-fluid">
    <form class="form-inline" id="cantidad" role="form" method="post">
	<div><br></div>
	<div class="row">
        <h2 style="text-align:center; margin-top:-10px">Topes</h2>
       <div class="col-md-4 " style="padding-top:25px">
                      
        <select class="form-control" id="cuando" name="periodo" style="max-width:400px;  display:inline">
        <option>Periodo</option>
         <option value="topeSemanal">Semanal</option>
         <option value="topeMensual">Mensual</option>
         <option value="topeSemestral">Semestral</option>
        </select>
        <select class="form-control" id="destino" name="tipo" style="max-width:300px;display:inline">
        <option>Destino</option>
         <option>FLA</option>
         <option>EUR</option>
         <option>MEX</option>
         <option>FLA_CUN</option>
         <option>FLA_MQT</option>
         <option>SURA_VER</option>
         <option>CXC</option>
         <option>PTY</option>
         <option>FLA_NY</option>
         <option>NY_CUN</option>
         <option>SURA_COMB_PER</option>
         <option>HW</option>
         <option>EUR2</option>
         <option>CUR_AUA</option>
         <option>ORM</option>
         </select>
       </div>
	</div>
	
	<div class="row" style="border-bottom:1px solid grey">
		<div class="col-md-12 ">
			
            <div class="form-group">
                <div class="input-group">
                    <input type="hidden" id="persona" name="nombre">
                  <div class="input-group-addon">Tope</div>
                 <input type="number" class="form-control" name="tope" placeholder="Tope">
                                  </div>
                 <button type="submit" class="btn btn-default" style="margin-top:-12px;">Enviar</button>
                </div>
                 
                
		</div>
	</div>
    </form> 
    <form class="form-inline" id="cantidadUsuario" role="form" method="post">
    <div><br></div>
    <div class="row" >
        <h2 style="text-align:center; margin-top:-10px">Ventas Por Usuario</h2>
       <div class="col-md-4 " style="padding-top:25px;">
                      
        <select class="form-control" id="quien" name="quien" style="max-width:400px;  display:inline">
         <option value="11">Janneth</option>
         <option value="15">Cesar</option>
         <option value="10">Lina</option>
         <option value="26">Fanny</option>
         <option value="13">Yolanda</option>
         <option value="17">Michelle</option>
         <option value="19">Rosalba</option>
         <option value="23">Hanna</option>
         <option value="22">Rocio</option>
         <option value="18">Nathalia</option>
        </select>
        <select class="form-control" id="donde" name="tipo2" style="max-width:300px;display:inline">
        <option>Destino</option>
         <option>FLA</option>
         <option>EUR</option>
         <option>MEX</option>
         <option>FLA_CUN</option>
         <option>FLA_MQT</option>
         <option>SURA_VER</option>
         <option>CXC</option>
         <option>PTY</option>
         <option>FLA_NY</option>
         <option>NY_CUN</option>
         <option>SURA_COMB_PER</option>
         <option>HW</option>
         <option>EUR2</option>
         <option>CUR_AUA</option>
         <option>ORM</option>
         </select>
       </div>
    </div>
    
    <div class="row">
        <div class="col-md-12 ">
            
            <div class="form-group">
                <div class="input-group">
                    <input type="hidden" id="persona" name="nombre">
                  <div class="input-group-addon">Datos</div>
                 <input type="number" class="form-control" name="cantidad" placeholder="Cantidad">
                 <input type="date" class="form-control" name="fecha" placeholder="Fecha DD/MM/AAAA">
                                  </div>
                 <button type="submit" class="btn btn-default" style="margin-top:-12px;">Enviar</button>
                </div>
                 
                
        </div>
    </div>
    </form> 
</div>
