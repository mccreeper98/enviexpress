var paqId = -1;
var cpOrigen = '';
  var cpDestino = '';
  var colonia = '';
  var nombre = '';
  var apellidos = '';
  var correo = '';
  var telefono = '';
  var razon = '';
  var paqN = '';

  var numeros = [];
  var pesos = [];
  var altos = [];
  var largos = [];
  var descripcions = [];
  var anchos = [];
  var manejos = [];
  var especials = [false, false, false, false, false, false, false, false, false, false];
  var fragils = [false, false, false, false, false, false, false, false, false, false];

  var valor = false;
  var declarado = '';
  
  var moral = false;
  var precio = '';
  var extendida = '';
  var auxPaq = 0;

$(document).ready(function(){
  $('.modal').modal();

  $("#moral").click(function() {  
    if($("#moral").is(':checked')) {  
      document.querySelector(`#raz`).classList.remove('hide');
    } else {  
      document.querySelector(`#raz`).classList.add('hide');  
    }  
  }); 

  $("#declarar").click(function() {  
    if($("#declarar").is(':checked')) {  
      document.querySelector(`#valo`).classList.remove('hide');
    } else {  
      document.querySelector(`#valo`).classList.add('hide');  
    }  
  }); 

  $("#masbtn").click(function() {
    console.log(auxPaq);
    if(auxPaq<9){
      auxPaq++;
      var paq = '<div class="col s10 m6 l12"><div class="row no-padding"><div class="input-field col s6"><select id="cant'+auxPaq+'"><option value="1" selected>1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select><label>Numero de paquetes identicos</label></div><div class="input-field col s6"><input id="peso'+auxPaq+'" name="peso'+auxPaq+'" type="text" class="validate" required><label for="peso'+auxPaq+'">Peso por paquete(kg)*</label></div><div class="input-field col s6"><input  id="alto'+auxPaq+'" name="alto'+auxPaq+'" type="text" class="validate" required><label for="alto'+auxPaq+'">Alto por paquete(cm)*</label></div><div class="input-field col s6"><input id="largo'+auxPaq+'" name="largo'+auxPaq+'" type="text" class="validate" required><label for="largo'+auxPaq+'">Largo por paquete(cm)*</label></div><div class="input-field col s6"><input id="ancho'+auxPaq+'" name="ancho'+auxPaq+'" type="text" class="validate" required><label for="ancho'+auxPaq+'">Ancho por paquete(cm)*</label></div><div class="input-field col s6"><input id="descripcion'+auxPaq+'" name="descripcion'+auxPaq+'" type="text" class="validate" required><label for="descripcion'+auxPaq+'">Descripción del Contenido*</label></div></div><br><div class="row"><div class="col s12 m6 l6 left-align"><input type="checkbox" id="fragil'+auxPaq+'" name="fragil'+auxPaq+'"/><label for="fragil'+auxPaq+'">Frágil</label></div><div class="col s12 m6 l6 left-align"><input type="checkbox" id="especial'+auxPaq+'"/><label for="especial'+auxPaq+'">Manejo Especial</label></div></div><div class="row hide" id="esp"><div class="col s12 l6"></div><div class="input-field col s12 m6 l6"><input id="manejo'+auxPaq+'" name="manejo'+auxPaq+'" type="text" class="validate" required><label for="manejo'+auxPaq+'">Describa el Manejo Especial*</label></div></div></div>'
      $('#mas').append(paq);
      $('select').material_select();
    }else{
      $("#masbtn").addClass('hide');
    }
    
  });

});

function buscaredo(cp){
  console.log(cp);
  if(cp.length == 5){
    $('#modal1').modal('open');
    $.ajax({
      url:"getedo.php",
      type: "POST",
      data:{cp: cp},
      success: function(data){
        $('#modal1').modal('close');
        $('#estado').val(data);
      },
      error: function(e){
        console.log(e);
        $('#modal1').modal('close');
        error('Ha ocurrido un error inesperado, recargue la pagina e intente nuevamente');
      }
    });
  }
}

function esp(id){
  if($("#especial"+id).is(':checked')) {  
    document.querySelector(`#esp`+id).classList.remove('hide');
  } else {  
    document.querySelector(`#esp`+id).classList.add('hide');  
  }
}

function next(number){
  if(number == 1){
    document.querySelector('#pasos').classList.remove('hide');
  }
  const nextStep = document.querySelector(`#step${number}`);

  nextStep.classList.remove("hide");
  nextStep.scrollIntoView({block: "start", behavior: "smooth"});

  if(number === 2){$('select').material_select();}

}

function prev(number){
  const prevStep = document.querySelector(`#step${number}`);
  const actStep = document.querySelector(`#step${number+1}`);

  prevStep.scrollIntoView({block: "start", behavior: "smooth"});
  // actStep.classList.add("hide");
}

function colonias(val){
  $('#modal1').modal('open');
  $.ajax({
    url:"getcolonias.php",
    type: "POST",
    data:{cpd: val,},
    success: function(data){
      $('#modal1').modal('close');
      $('#coloniadiv').removeClass('hide');
      $('#colonia').html('');
      $('#colonia').html(data);
      $('select').material_select();
    },
    error: function(e){
      console.log(e);
      $('#modal1').modal('close');
      error('Ha ocurrido un error inesperado, recargue la pagina e intente nuevamente');
    }
  });
}

function validStepOne(){
  cpOrigen = document.getElementById("cpo").value;
  cpDestino = document.getElementById("cpd").value;
  // colonia = document.getElementById("colonia").value;
  nombre = document.getElementById("name").value;
  apellidos = document.getElementById("lastn").value;
  correo = document.getElementById("email").value;
  telefono = document.getElementById("phone").value;
  razon = document.getElementById("reason").value;
  moral = document.getElementById("moral").checked;

  var terminos = document.getElementById("terminos");
  var notificar = document.getElementById("info");

  if(cpOrigen == ''){
    error('Introduce el codigo postal de origen');
    return false;
  }

  if(cpDestino == ''){
    error('Introduce el codigo postal de destino');
    return false;
  }

  if(nombre  == ''){
    error('Introduce tu nombre');
    return false;
  }

  if(apellidos == ''){
    error('Introduce tus apellidos');
    return false;
  }

  if(correo == ''){
    error('Introduce tu correo');
    return false;
  }

  if(telefono == ''){
    error('Introduce tu teléfono');
    return false;
  }
  
  if(telefono.length != 10){
    error("Introduce un teléfono valido");
    return false;
  }

  if(moral && razon == ''){
    error('Introduce tu razón social');
    return false;
  }

  if(!/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(correo)){
    error('Introduce un correo valido');
  }

  if(!terminos.checked){
    error('Acepta el aviso de privacidad');
    return false;
  }

  $('#modal1').modal('open');
  $.ajax({
    url:"datos.php",
    type: "POST",
    data:{cpo: cpOrigen, cpd: cpDestino, name: nombre, lastn: apellidos, email: correo, phone: telefono, reason: razon, contact: notificar.checked},
    success: function(data){
      $('#modal1').modal('close');
      if(data == 'error'){
        error('Todos los datos son necesarios');
      }else{
        $('#paqSection').html('');
        $('#paqSection').html(data);
        next(2);
      }
    },
    error: function(e){
      console.log(e);
      $('#modal1').modal('close');
      error('Ha ocurrido un error inesperado, recargue la pagina e intente nuevamente');
    }
  });

}

function error(msg){
  return sweetAlert('Error', msg, 'error');
}

function validaNumber(e) {
  tecla = (document.all) ? e.keyCode : e.which;

  //Tecla de retroceso para borrar, siempre la permite
  if (tecla == 8) {
    return true;
  }

  // Patron de entrada, en este caso solo acepta numeros
  patron = /[0-9-.]/;
  tecla_final = String.fromCharCode(tecla);
  return patron.test(tecla_final);
}

function selectPaq(number, cantidad, idPaq, name, ex){
  paqId = idPaq;
  paqN = name;
  extendida = ex;

  for(i=1; i<= cantidad; i++){
    var paq = document.querySelector(`#paq${i}`);

    if(i == number){
      paq.classList.add("selected");
    }else{
      paq.classList.remove("selected");
    }
  }

}

function validaPaq(){
  if(paqId != -1){
    next(3);
  }else{
    error('Selecciona una paquetería')
  }
}

function cotizaPaq(col){
  console.log(col)
  $('#modal1').modal('open');

  colonia = col;

  var numsend = JSON.stringify(numeros);
  var pesosend = JSON.stringify(pesos);
  var altosend = JSON.stringify(altos);
  var largosend = JSON.stringify(largos);
  var descsend = JSON.stringify(descripcions);
  var anchosend = JSON.stringify(anchos);
  var manejosend = JSON.stringify(manejos);
  var especialsend = JSON.stringify(especials);
  console.log(auxPaq)
  $.ajax({ 
    url:"cotizarcol.php",
    type: "POST",
    data:{numeros: numsend, pesos:pesosend, altos: altosend, largos: largosend, descs: descsend, anchos: anchosend, manejos: manejosend, especiales: especialsend, cpo: cpOrigen, cpd: cpDestino, name: nombre, last: apellidos, email: correo, tel: telefono, ismoral: moral, razon: razon, declarado: valor, valor: declarado, aux: auxPaq, col:col},
    success: function(data){

      $('#paqExp').html('');
      $('#paqExp').html(data);
      $('#modal1').modal('close');
      document.querySelector(`#prepaq`).classList.remove('hide');
    },
    error: function(e){
      console.log(e);
      $('#modal1').modal('close');
      error('Ha ocurrido un error inesperado, recargue la pagina e intente nuevamente');
    }
  });
}

function validarMedidas(){

  valor = document.getElementById("declarar").checked;
  declarado = document.getElementById("valor").value; 

  if(valor && declarado == ''){
    error('Introduce el valor declarado');
    return false;
  }

  for(var i=0; i<=auxPaq; i++){

  var num = document.getElementById("cant"+i).value;
  var peso = document.getElementById("peso"+i).value;
  var alto = document.getElementById("alto"+i).value;
  var largo = document.getElementById("largo"+i).value;
  var descripcion = document.getElementById("descripcion"+i).value;
  var ancho = document.getElementById("ancho"+i).value;
  var manejo = document.getElementById("manejo"+i).value;

  var especial = document.getElementById("especial"+i).checked;
  fragils[i] = document.getElementById("fragil"+i).checked;

  if(num == ''){
    error('Introduce el peso del paquete '+(i+1));
    return false;
  }
  
  if(peso == ''){
    error('Introduce el peso del paquete '+(i+1));
    return false;
  }

  if(alto == ''){
    error('Introduce el alto del paquete '+(i+1));
    return false;
  }

  if(largo  == ''){
    error('Introduce el largo del paquete '+(i+1));
    return false;
  }

  if(ancho == ''){
    error('Introduce el ancho del paquete '+(i+1));
    return false;
  }

  if(descripcion == ''){
    error('Introduce la descripción del paquete '+(i+1));
    return false;
  }

  if(especial && manejo == ''){
    error('Introduce el manejo especial del paquete '+(i+1));
    return false;
  }

  numeros.push(num);
  pesos.push(peso);
  altos.push(alto);
  largos.push(largo);
  descripcions.push(descripcion);
  anchos.push(ancho);
  manejos.push(manejo);
  especials[i] = especial;

  }

  $('#modal1').modal('open');

  var numsend = JSON.stringify(numeros);
  var pesosend = JSON.stringify(pesos);
  var altosend = JSON.stringify(altos);
  var largosend = JSON.stringify(largos);
  var descsend = JSON.stringify(descripcions);
  var anchosend = JSON.stringify(anchos);
  var manejosend = JSON.stringify(manejos);
  var especialsend = JSON.stringify(especials);
  console.log(auxPaq)
  $.ajax({ 
    url:"cotizar.php",
    type: "POST",
    data:{numeros: numsend, pesos:pesosend, altos: altosend, largos: largosend, descs: descsend, anchos: anchosend, manejos: manejosend, especiales: especialsend, cpo: cpOrigen, cpd: cpDestino, name: nombre, last: apellidos, email: correo, tel: telefono, ismoral: moral, razon: razon, declarado: valor, valor: declarado, aux: auxPaq},
    success: function(data){
      $('#paqSection').html('');
      $('#paqSection').html(data);
      $('select').material_select();
      $('#modal1').modal('close');
      next(3);
      
    },
    error: function(e){
      console.log(e);
      $('#modal1').modal('close');
      error('Ha ocurrido un error inesperado, recargue la pagina e intente nuevamente');
    }
  });
}

function solicitar(paqueteria, precio, tipo){

  var paqInfo = '';

  for(var i=0; i<=auxPaq; i++){

    paqInfo += `
    <br>
    <p class="detallesc">Cantidad de paquetes: ${numeros[i]}</p>
    <p class="detallesm">Peso (kgs): ${pesos[i]}  Alto (cm): ${altos[i]}  Largo (cm): ${largos[i]}  Ancho (cm): ${anchos[i]}</p>
    <br>
    `;
  
    }

  

  var templateres = `<div class="container">
  <br>
  <div class="cinta center" id="oc">
  <h3 class="titlep">Revisa la información antes de solicitar el servicio</h3>
  </div>
  <br>
  <p class="nombre">${nombre} ${apellidos}</p>
  <br>
  <div class="nasec center">
  <p class="detalles">Código origen ${cpOrigen} | Código destino ${cpDestino}</p>
  <p class="detalles">correo: ${correo}</p>
  <p class="detalles">teléfono: ${telefono}</p>
  </div>
  <br>
  <div class="azsec center">
  <p class="detallest">Información sobre el (los) paquete(s)</p>
  ${paqInfo}
  </div>
  <br><br>
  <p class="selecpaq">
  ${paqueteria} ${tipo} <br> Costo envio*: <br> $${precio}
  </p>
  <p>*incluye recolección a domicilio, IVA y seguro(aplica solo con valor declarado)</p>
  <br>
  <h5 class="encabezado">Costos Adicionales</h5>
  <br>
  <p class="container">Adicionalmente al precio de tu envío, considera que puede aplicar tambíen alguno de los siguientes costos en función del tipo de paquete(s)</p>
  <br>
  <h5 class="encabezado">Correción de dirección: $79.00</h5>
  <h5 class="encabezado">Forma irregular: $175.00</h5>
  <br>
  <p class="">Esta cotización es una referencia para el usuario y no representa el precio final. <br>Si esta conforme con los datos y requiere el servicio, Solicitar recolección dando click en el botón o comunicarse a los teléfonos 55 70455360 / 55 70309881</p>
  <br>
  <a href="https://wa.me/+525573393933/?text=Hola%2C+quisiera+solicitar+la+recolecci%C3%B3n+de+mi+envio." target="_blank" class="waves-effect btn boton botones"><i class="material-icons left" style="color:#00bb2d">whatsapp</i>SOLICITAR RECOLECCIÓN</a>
  <br><br>
  <a class="waves-effect waves-teal btn-flat" onclick=" reg()">Regresar</a> | <a class="waves-effect waves-teal btn-flat" onclick=" print()">Imprimir</a>
  <br><br><br>
 </div>`;

  $('#pedido').html(templateres);
  const nextStep = document.querySelector(`#pedido`);

  nextStep.classList.remove("hide");
  document.querySelector(`#pasos`).classList.add('hide');
  document.querySelector(`#oc`).classList.add('hide');
  document.querySelector(`#oc1`).classList.add('hide');
  document.querySelector(`#marcador`).scrollIntoView({block: "start", behavior: "smooth"});
}


function reg(){
  window.location.reload();
}

function print(){
  var ticket = document.querySelector("#pedido");
  var ventana = window.open('', 'PRINT', 'height=400,width=600');
  ventana.document.write(`<html><head><title>Cotización</title><!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Extended" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/main.css" media="screen,projection"/>`);
  ventana.document.write('</head><body ><center>');
  ventana.document.write(ticket.innerHTML);
  ventana.document.write('</center></body></html>');
  ventana.document.close();
  ventana.focus();
  ventana.print();
  ventana.close();
  return true;
}

function selectenv(number, cantidad){

  for(i=1; i<= cantidad; i++){
    var env = document.querySelector(`#env${i}`);

    if(i == number){
      env.classList.add("selected");
    }else{
      env.classList.remove("selected");
    }
  }
}


function generarpdf(){
  $('#modal1').modal('open');
  $.ajax({
    url:"pdf.php",
    type: "POST",
    data:{cpo: cpOrigen, cpd: cpDestino, colonia: colonia, name: nombre, ape: apellidos, email: correo, tel: telefono, razon: razon, paq: paqN, peso: peso, alto:alto, largo:largo, ancho:ancho, des:descripcion, fragil: fragil, especial: especial, cual: manejo, precio:precio},
    success: function(data){
      console.log(data);
      $('#modal1').modal('close');
      window.location = "view.php?pdf="+data;
      
    },
    error: function(e){
      console.log(e);
      $('#modal1').modal('close');
      error('Ha ocurrido un error inesperado, recargue la pagina e intente nuevamente');
    }
  });
}
