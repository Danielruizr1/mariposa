function buscar(){var widgets=dijit.byId("divGrid");widgets&&widgets.destroyRecursive(!0),queryObj.estado=document.getElementById("estado").value,datos=window.parent.seguimientoAlmacen.query(queryObj),cargagrilla(datos)}function cargagrilla(entrada){var grid;dojo.ready(function(){function poneFont(entry,rowIndex){return'<font style="color:#656565; font-size:0.9em">'+entry+"</font>"}function poneFont2(entry,rowIndex){if(entry){if("MUY INTERESADO"==entry)return'<div align="center" style="width:16px; height:16px; background-color:green; border: 2px solid; border-radius: 10px; margin-left:7px;"></div>';if("MEDIANAMENTE INTERESADO"==entry)return'<div align="center" style="width:16px; height:16px; background-color:yellow; border: 2px solid; border-radius: 10px; margin-left:7px;"></div>';if("POCO INTERES O ABANDONADO"==entry)return'<div align="center" style="width:16px; height:16px; background-color:red; border: 2px solid; border-radius: 10px; margin-left:7px;"></div>';if("blue"==entry)return'<div align="center" style="width:16px; height:16px; background-color:#7BB0D6; border: 2px solid; border-radius: 10px; margin-left:7px;"></div>'}return'<span id="seguimiento"> </span>'}BusquedaAlmacen=new dojo.store.Memory({data:entrada}),BusquedaStore=dojo.data.ObjectStore({objectStore:BusquedaAlmacen}),grid=new dojox.grid.EnhancedGrid({store:BusquedaStore,style:"height:280px",structure:[{name:"Interes",field:"Color",formatter:poneFont2,width:"3.5em"},{name:"#",field:"id",width:"10%",width:"2.5em"},{name:"QUINCEA&Ntilde;ERA",field:"nombrequinceanera",width:"15em",formatter:poneFont},{name:"VENDEDOR",field:"nombreAgente",width:"15em",formatter:poneFont},{name:"CIUDAD",field:"nombreciudad",width:"7.5em",formatter:poneFont},{name:"MEDIO",field:"agenciaNombre",width:"15em",formatter:poneFont},{name:"NOMBRE DEL PADRE",field:"nombre_padre",width:"15em",formatter:poneFont},{name:"CORREO PADRE",field:"mail_padre",width:"15em",formatter:poneFont},{name:"OFICINA PADRE",field:"telefonooficina_padre",width:"5.5em",formatter:poneFont},{name:"CEL PADRE",field:"celular_padre",width:"5.5em",formatter:poneFont},{name:"NOMBRE DE LA MADRE",field:"nombre_madre",width:"15em",formatter:poneFont},{name:"CORREO MADRE",field:"mail_madre",width:"15em",formatter:poneFont},{name:"OFICINA MADRE",field:"telefonooficina_madre",width:"7.5em",formatter:poneFont},{name:"CEL MADRE",field:"celular_madre",width:"7.5em",formatter:poneFont},{name:"NOMBRE PERSONA QUIEN LLAMO",field:"nombrequienllama",width:"15em",formatter:poneFont},{name:"TELEFONO",field:"telefono1",width:"7.5em",formatter:poneFont},{name:"CORREO",field:"email",width:"15em",formatter:poneFont},{name:"CORREO QUINCEA&Ntilde;ERA",field:"mail_quinceanera",width:"15em",formatter:poneFont},{name:"AÑO",field:"anoviaje_quinceanera",width:"2em",formatter:poneFont},{name:"MES",field:"mesViajeQuin",width:"2em",formatter:poneFont},{name:"DESTINO",field:"nombreDestino",width:"15em",formatter:poneFont},{name:"TELEFONO",field:"telefono2",width:"5.5em",formatter:poneFont},{name:"TELEFONO",field:"telefono3",width:"5.5em",formatter:poneFont},{name:"CELULAR",field:"celular",width:"5.5em",formatter:poneFont},{name:"FAX",field:"fax",width:"5.5em",formatter:poneFont},{name:"DIRECCION",field:"direccion",width:"15em",formatter:poneFont},{name:"PARENTESCO",field:"nombreParentesco",width:"7.5em",formatter:poneFont},{name:"TEL QUINCEA&Ntilde;ERA",field:"telefono_quinceanera",width:"7.5em",formatter:poneFont},{name:"CEL QUINCEA&Ntilde;ERA",field:"celular_quinceanera",width:"7.5em",formatter:poneFont},{name:"COLEGIO",field:"colegio",width:"7.5em",formatter:poneFont},{name:"FASE",field:"nombreFase",width:"300px",formatter:poneFont},{name:"MOTIVO DE NO VIAJE",field:"motivo",width:"15em",formatter:poneFont},{name:"ULTIMO CONTACTO",field:"ultimo_contacto",width:"7.5em",formatter:poneFont}],plugins:{exporter:!0},onRowClick:function(e){id=grid._getItemAttr(e.rowIndex,"id"),location.replace("agregar_Seguimiento.php?id="+id)}},"divGrid"),grid.startup(),dojo.connect(grid,"onRowClick",function(e){id=grid._getItemAttr(e.rowIndex,"id"),window.parent.crearseguimiento(id),grid.selection.deselectAll(),grid.selection.setSelected(e.rowIndex,!0)});setTimeout(function(){dojo.query(".displayRowCount")[0].innerHTML=grid.rowCount},500)})}function exportExcel(){dijit.byId("divGrid").exportGrid("csv",{writerArgs:{separator:","}},function(str){dojo.io.iframe.send({url:"CSVexport.php",method:"POST",content:{exp:str},timeout:15e3})})}function removeGrid(){var widgets=dijit.byId("divGrid");widgets&&widgets.destroyRecursive(!0),dijit.byId("ciudad").reset(),dijit.byId("fase").reset(),dijit.byId("interes").reset(),dijit.byId("AgenciaAgencia").reset(),dijit.byId("transfiere").reset(),dijit.byId("mes").reset(),dijit.byId("year").reset(),dojo.query(".displayRowCount")[0].innerHTML=0,queryObj={}}angular.module("search",[]).controller("searchController",function($scope){var controller=this;this.estado=1,this.seguimientos=window.parent.seguimiento,this.bitacoras=window.parent.bitacora,this.filtered,controller.filteredBitas=[],this.searchBitacora=function(){controller.filteredBitas=controller.bitacoras.filter(controller.bitaFilter),console.log(controller.filteredBitas)},this.buscar=function(){controller.filteredBitas.forEach(function(bita){bita=bita.idseguimiento}),controller.filtered=controller.seguimientos.filter(controller.segFilter),console.log(controller.filtered)},this.segFilter=function(value){return 0!=controller.filteredBitas.length&&controller.filteredBitas.includes(value.id)},this.bitaFilter=function(value){return!!controller.search&&("string"==typeof value.ingreso?value.ingreso.toLowerCase().includes(controller.search.toLowerCase()):value.ingreso==controller.search)},this.structure=[{name:"Interes",field:"Color",width:"3.5em"},{name:"#",field:"id",width:"10%",width:"2.5em"},{name:"QUINCEAÑERA",field:"nombrequinceanera",width:"15em"},{name:"VENDEDOR",field:"nombreAgente",width:"15em"},{name:"CIUDAD",field:"nombreciudad",width:"7.5em"},{name:"MEDIO",field:"agenciaNombre",width:"15em"},{name:"NOMBRE DEL PADRE",field:"nombre_padre",width:"15em"},{name:"CORREO PADRE",field:"mail_padre",width:"15em"},{name:"OFICINA PADRE",field:"telefonooficina_padre",width:"5.5em"},{name:"CEL PADRE",field:"celular_padre",width:"5.5em"},{name:"NOMBRE DE LA MADRE",field:"nombre_madre",width:"15em"},{name:"CORREO MADRE",field:"mail_madre",width:"15em"},{name:"OFICINA MADRE",field:"telefonooficina_madre",width:"7.5em"},{name:"CEL MADRE",field:"celular_madre",width:"7.5em"},{name:"NOMBRE PERSONA QUIEN LLAMO",field:"nombrequienllama",width:"15em"},{name:"TELEFONO",field:"telefono1",width:"7.5em"},{name:"CORREO",field:"email",width:"15em"},{name:"CORREO QUINCEAÑERA",field:"mail_quinceanera",width:"15em"},{name:"AÑO",field:"anoviaje_quinceanera",width:"2em"},{name:"MES",field:"mesViajeQuin",width:"2em"},{name:"DESTINO",field:"nombreDestino",width:"15em"},{name:"TELEFONO",field:"telefono2",width:"5.5em"},{name:"TELEFONO",field:"telefono3",width:"5.5em"},{name:"CELULAR",field:"celular",width:"5.5em"},{name:"FAX",field:"fax",width:"5.5em"},{name:"DIRECCION",field:"direccion",width:"15em"},{name:"PARENTESCO",field:"nombreParentesco",width:"7.5em"},{name:"TEL QUINCEAÑERA",field:"telefono_quinceanera",width:"7.5em"},{name:"CEL QUINCEAÑERA",field:"celular_quinceanera",width:"7.5em"},{name:"COLEGIO",field:"colegio",width:"7.5em"},{name:"FASE",field:"nombreFase",width:"300px"},{name:"MOTIVO DE NO VIAJE",field:"motivo",width:"15em"},{name:"ULTIMO CONTACTO",field:"ultimo_contacto",width:"7.5em"}]}),dojo.require("dojox.grid.EnhancedGrid"),dojo.require("dojo.data.ItemFileReadStore"),dojo.require("dojo.store.Memory"),dojo.require("dojo.data.ObjectStore"),dojo.require("dojox.grid.enhanced.plugins.exporter.CSVWriter"),dojo.require("dojo.data.ItemFileWriteStore"),dojo.require("dojo.io.iframe");var seg=window.parent.seguimiento,storeData={items:seg},queryObj={},agencias=window.parent.agencia,medios=window.parent.medio,destinos=window.parent.destino,departamentos=window.parent.departamento,ciudades=window.parent.ciudad,usuarios=window.parent.todos,grid;require(["dojo/ready","dojo/store/Memory","dijit/form/ComboBox","dojo/domReady!","dijit/form/ValidationTextBox","dijit/form/FilteringSelect"],function(ready,Memory,ComboBox,ValidationTextBox,FilteringSelect){ready(function(){var mesStore=new Memory({data:[{name:"JUNIO"},{name:"DICIEMBRE"}]}),interesStore=new Memory({data:[{name:"MUY INTERESADO"},{name:"MEDIANAMENTE INTERESADO"},{name:"POCO INTERES O ABANDONADO"}]}),faseStore=new Memory({data:[{name:"1.INICIO"},{name:"2.DEJE MENSAJE TELEFONICO"},{name:"3.VOLVER A LLAMAR"},{name:"4.POSPONEN EN VIAJE"},{name:"5.ENVIÉ DATOS Y DOCUMENTOS DE INSCRIPCIÓN"},{name:"6.VISITÉ A CLIENTE"},{name:"7.CONCRETÉ CITA EN LA OFICINA"},{name:"8.LES ATENDÍ EN LA OFICINA"},{name:"9.ENVIÉ REVISTA"},{name:"10.FIN"}]}),yearStore=new Memory({data:[{name:"2012"},{name:"2013"},{name:"2014"},{name:"2015"},{name:"2016"},{name:"2017"},{name:"2018"},{name:"2019"},{name:"2020"}]});new dijit.form.ComboBox({id:"ciudad",placeHolder:"SELECCIONE LA CIUDAD",store:new Memory({data:ciudades}),autoComplete:!0,style:"width: 250px;",onChange:function(agencia){console.log(dijit.byId("ciudad").get("value")),queryObj.nombreciudad=dijit.byId("ciudad").get("value")},searchAttr:"name"},"ciudad"),new dijit.form.ComboBox({id:"transfiere",name:"transfiere",placeHolder:"SELECCIONE EL VENDEDOR",invalidMessage:"Usuario Invalido!",store:new Memory({data:usuarios}),autoComplete:!0,style:"width: 260px ; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",onChange:function(agencia){console.log(this.item.id),queryObj.nombreAgente=this.item.nombre},searchAttr:"nombre"},"transfiere"),new dijit.form.ComboBox({id:"AgenciaAgencia",name:"AgenciaAgencia",placeHolder:"SELECCIONE EL MEDIO",invalidMessage:"Usuario Invalido!",store:new Memory({data:agencias}),autoComplete:!0,style:"width: 15em ; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",onChange:function(agencia){queryObj.agenciaNombre=dijit.byId("AgenciaAgencia").get("value")},searchAttr:"name"},"AgenciaAgencia"),new dijit.form.ComboBox({id:"mes",name:"mes",placeHolder:"MES",store:mesStore,style:"width: 15em ; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",onChange:function(agencia){queryObj.mesViajeQuin=dijit.byId("mes").get("value")},searchAttr:"name"},"mes"),new dijit.form.ComboBox({id:"year",name:"year",placeHolder:"AÑO",store:yearStore,autoComplete:!0,style:"width: 15em ; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",onChange:function(agencia){queryObj.anoviaje_quinceanera=dijit.byId("year").get("value")},searchAttr:"name"},"year"),new dijit.form.ComboBox({id:"fase",name:"fase",placeHolder:"FASE",store:faseStore,style:"width: 15em ; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",onChange:function(agencia){queryObj.nombreFase=dijit.byId("fase").get("value")},searchAttr:"name"},"fase"),new dijit.form.ComboBox({id:"interes",name:"interes",placeHolder:"INTERES",store:interesStore,style:"width: 15em ; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",onChange:function(agencia){queryObj.Color=dijit.byId("interes").get("value")},searchAttr:"name"},"interes")})});