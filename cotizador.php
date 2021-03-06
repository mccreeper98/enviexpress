<!DOCTYPE html>
  <html>
    <head>
      <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Envi-Express &#8211; Cotizador</title>
        <meta name='robots' content='noindex, nofollow' />
        <link rel="shortcut icon" href="https://www.envi-express.mx/wp-content/uploads/2020/10/Favicom.jpg" type="image/x-icon" />
        <meta property="og:title" content="Cotizador"/>
        <meta property="og:type" content="article"/>
        <meta property="og:url" content="https://www.envi-express.mx/"/>
        <meta property="og:site_name" content="Envi-Express"/>
        <meta property="og:description" content="Somos una empresa joven 100% mexicana dedicada a dar soluciones integrales para la distribución de mercancía con alcance local, nacional e internacional fusionando nuestra infraestructura junto con la de nuestros aliados"/>
        <meta property="og:image" content="https://www.envi-express.mx/wp-content/uploads/2020/06/avatar2.png"/>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Extended" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/main.css" media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-195943395-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-195943395-1');
        </script>
    </head>

    <body>

        <main>
            <a href="https://www.envi-express.mx/" class="black-text" style="position: fixed; margin-left: 20px; margin-top: 20px;"><i class="material-icons left black-text">arrow_back</i>Regresar</a>
            <div class="nav center">
              <a href="#"><img src="img/logo.png" class="logo"></a>
            </div>
            <img src="img/banner.jpg" class="banner">
            <div class="cinta center" id="oc">
                <h3 class="title">Cotiza aquí tu envío</h3>
            </div>

            <div class="container center" id="oc1">

              <div class="introduction">
                <br>
                <p class="container body">
                  Mediante nuestro cotizador en linea podrás obtener de forma rápida el costo de tu envío, para cualquier parte de México o el mundo. <br><br> Te invitamos a seguir cada uno de los pasos, para obtener la información de tu envío.
                </p>
                <br><br>
                <div class="container">
                  <div class="naranja">
                    <p class="des"><b><span class="numero">1</span> Introduce tus datos generales</b></p>
                  </div>
                  <br>
                  <div class="col s6 azul">
                    <p class="des"><b><span class="numero">2</span> Cantidad de paquetes y descripción</b></p>
                  </div>
                  <br>
                  <div class="naranja">
                    <p class="des"><b><span class="numero">3</span> Selecciona tu paquetería de envio</b></p>
                  </div>
                  <br>
                  <div class="azul">
                    <p class="des"><b><span class="numero">4</span> Solicita la recolección de tu(s) paquete(s)</b></p>
                  </div>
                  <br>
                  <div class="naranja">
                    <p class="des"><b><span class="numero">5</span> Verifica tus datos de servicio y costo</b></p>
                  </div>
                <br>       
                  <div class="bott">
                    <a href="" class="waves-effect btn botona botones">Regresar</a>
                    <a class="waves-effect btn boton botones" onclick=" next(1)">Comenzar</a>
                  </div>
                </div>
                <br><br>
              </div>

            </div>
            <div id="marcador">
            </div>
            <div class="pasos center hide" id="pedido">
              
            </div>

            <div class="pasos hide" id="pasos">
              <div class="box hide" id="step1">
                <div class="center">
                  <a href="#"><img src="img/logo.png" class="logop"></a>
                </div>
                <div class="container center step z-depth-2">

                  <p class="encabezado">C.P. Y DATOS DE CONTACTO</p>
                  
                  <div class="centrado row">
                      <form class="col s12  m6 l12">
                        <div class="row no-padding">
                          <div class="input-field col s12 m6 l6">
                            <input id="cpo" name="cpo" maxlength="5" onkeypress="return validaNumber(event)" type="text" class="validate" required>
                            <label for="cpo">Código Postal Origen*</label>
                          </div>
                          <div class="input-field col s12 m6 l6">
                            <input id="cpd" name="cpd" maxlength="5" onkeypress="return validaNumber(event);" onkeyup="return buscaredo(this.value)" type="text" class="validate" required>
                            <label for="cpd">Código Postal Destino*</label>
                          </div>
                        </div>
                        <div class="row no-padding">
                          <div class="input-field col s12 m6 l12">
                            <input  id="estado" type="text" placeholder=" " class="validate" required disabled>
                            <label for="estado">Estado*</label>
                          </div>
                        </div>
                        <!-- <div class="input-field col s12 hide" id="coloniadiv">
                          <select id="colonia" name="colonia">
                            <option value="" disabled selected>Selecciona la colonia</option>
                            <option value="1">Option 1</option>
                          </select>
                          <label>Materialize Select</label>
                        </div> -->
                        <div class="row no-padding">
                          <div class="input-field col s12 m6 l12">
                            <input  id="name" name="name" type="text" class="validate" required>
                            <label for="name">Nombre(s)*</label>
                          </div>
                        </div>
                        <div class="row no-padding">
                          <div class="input-field col s12 m6 l12">
                            <input id="lastn" name="lastn" type="text" class="validate" required>
                            <label for="lastn">Apellidos*</label>
                          </div>
                        </div>
                        <div class="row no-padding">
                          <div class="input-field col s12 m6 l6">
                            <input id="email" name="email" type="email" class="validate" required>
                            <label for="email" data-error="Ingresa un correo valido">Correo Electrónico*</label>
                          </div>
                          <div class="input-field col s12 m6 l6">
                              <input id="phone" name="phone" type="tel" class="validate" onkeypress="return validaNumber(event)" maxlength="10" minlength="10" required>
                              <label for="phone" data-error="Ingresa un teléfono valido">Teléfono*</label>
                            </div>
                        </div>

                        <div class="row no-padding">
                          <div class="col s12 m6 l6 left-align">
                            <input type="checkbox" id="moral">
                            <label for="moral">Persona Moral</label>
                          </div>
                        </div>

                        <div class="row no-padding hide" id="raz">
                          <div class="input-field col s12 m6 l12">
                              <input id="reason" name="reason" type="text" class="validate">
                              <label for="reason">Razón Social</label>
                            </div>
                        </div>
  
                        <p class="right-align">
                          * campos obligatorios
                        </p>

                        <p>
                          <a class="grey-text" href="https://www.envi-express.mx/descargables/AVISO DE PRIVACIDAD.pdf" download="" target="_blank" rel="noopener"><i class="material-icons black-text">picture_as_pdf</i> Descarga nuestro aviso de privacidad</a>
                        </p>
  
                        <p>
                          <input type="checkbox" id="terminos" />
                          <label for="terminos">Estoy de acuerdo con el <a href="https://www.envi-express.mx/descargables/AVISO%20DE%20PRIVACIDAD.pdf" target="_blank" style="color: #9e9e9e;">aviso de privacidad</a></label>
                        </p>
                        <p>
                          <input type="checkbox" id="info" checked="checked"/>
                          <label for="info">Deseo recibir novedades y promociones en mi correo</label>
                        </p>
  
                      </form>
                    </div>
                    <div class="row">
                      <div class="col s6"></div>
                      <div class="col s6">
                        <a class="green-effect btn botones" onclick="validStepOne()" style="background-color: #177dbe; color: #000; font-weight: bold;">Siguiente</a>
                      </div>
                  </div>
                  
                </div>
              </div>

              <div class="box hide" id="step2">
                <div class="center">
                  <a href="#"><img src="img/logo.png" class="logop"></a>
                </div>
                <div class="container center step z-depth-2">

                  <p class="encabezado">Especificaciones del paquete</p>
                  
                  <div class="centrado row" style="width: 90%;">
                      <form class="col s12">
                        <div class="col s12 m6 l12">
                          <div class="row no-padding">
                            <div class="input-field col s12 m6 l6">
                              <select id="cant0">
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                              </select>
                              <label>Numero de paquetes identicos</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                              <input id="peso0" name="peso0" type="text" class="validate" required>
                              <label for="peso0">Peso por paquete(kg)*</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                              <input  id="alto0" name="alto0" type="text" class="validate" required>
                              <label for="alto0">Alto por paquete(cm)*</label>
                            </div>
                          

                            <div class="input-field col s12 m6 l6">
                              <input id="largo0" name="largo0" type="text" class="validate" required>
                              <label for="largo0">Largo por paquete(cm)*</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                              <input id="ancho0" name="ancho0" type="text" class="validate" required>
                              <label for="ancho0">Ancho por paquete(cm)*</label>
                            </div>

                                <div class="input-field col s12 m6 l6">
                                  <input id="descripcion0" name="descripcion0" type="text" class="validate" required>
                                  <label for="descripcion0">Descripción del Contenido*</label>
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="col s12 m6 l6 left-align">
                                    <input type="checkbox" id="fragil0" name="fragil0"/>
                                    <label for="fragil0">Frágil</label>
                                </div>
                                <div class="col s12 m6 l6 left-align">
                                    <input type="checkbox" id="especial0" onchange="esp(0)"/>
                                    <label for="especial0">Manejo Especial</label>
                                  </div>
                            </div>
                                
                                  <div class="row hide" id="esp0">
                                      <div class="col s12 l6">
  
                                      </div>
  
                                      <div class="input-field col s12 m6 l6">
                                        <input id="manejo0" name="manejo0" type="text" class="validate" required>
                                        <label for="manejo0">Describa el Manejo Especial*</label>
                                      </div>
                                  </div>
                        </div>
                        <div id="mas"></div>
                        
                              <div class="left-align">
                                <a class="waves-effect waves-teal btn-flat" id="masbtn">Agregar otro paquete con medidas diferentes</a>
                              </div>


                              <div class="row no-padding">
                                <div class="col s12 m6 l6 left-align">
                                  <input type="checkbox" id="declarar">
                                  <label for="declarar">Valor declarado</label>
                                </div>
                              </div>
      
                              <div class="row no-padding hide" id="valo">
                                <div class="input-field col s12 m6 l12">
                                    <input id="valor" name="valor" type="text" class="validate">
                                    <label for="valor">Monto</label>
                                  </div>
                              </div> 
                                <p class="right-align">
                                  * campos obligatorios
                                </p>
                      </form>
                    </div>
                    <div class="row">
                      <div class="col s6"> <a class="green-effect btn botones" style="background-color: #f19202; color: #000; font-weight: bold;"  onclick="prev(1)">Anterior</a></div>
                      <div class="col s6">
                        <a class="green-effect btn botones" onclick="validarMedidas()" style="background-color: #177dbe; color: #000; font-weight: bold;">Siguiente</a>
                      </div>
                  </div>
              </div>
              </div>

              <div class="box hide" id="step3">
                <div class="center">
                  <a href="#"><img src="img/logo.png" class="logop"></a>
                </div>
                <div class="container center step z-depth-2">

                  <div class="margen">
                    <p class="encabezado">Selecciona el servicio y la paquetería de tu preferencia</p>
                    <br>
                  <p class=" margen" style="font-size: 13px;">* Los precios aquí mostrados incluyen: <br> Recolección a domicilio, IVA y seguro(aplica solo con valor declarado)</p>
                  
                  <br>

                  <div class=" row" id="paqSection">

                      <!-- <a onclick="selectPaq(1, 3)">
                        <div class="paq" id="paq1">
                            <img src="img/paqueterias/fedex.png" class="paqueteria">
                        </div>
                      </a>

                      <a onclick="selectPaq(2, 3)">
                        <div class="paq" id="paq2">
                            <img src="img/paqueterias/paquete.png" class="paqueteria">
                        </div>
                      </a>

                      <a onclick="selectPaq(3, 3)">
                        <div class="paq" id="paq3">
                            <img src="img/paqueterias/redpack.png" class="paqueteria">
                        </div>
                      </a> -->

                    </div>
                    <br>
                    <div class="row">
                      <div class="col s3"></div>
                      <div class="col s6"> <a class="green-effect btn botones" style="background-color: #f19202; color: #000; font-weight: bold;" onclick="prev(2)">Anterior</a> <a class="green-effect btn botones" style="background-color: #177dbe; color: #000; font-weight: bold;" onclick="location.reload()">Nueva cotización</a></div>
                      <!-- <div class="col s6">
                        <a class="green-effect btn botones" onclick=" validaPaq()" style="background-color: #177dbe; color: #000; font-weight: bold;">Siguiente</a>
                      </div> -->
                    </div>
                  </div>
              </div>
              </div>

              <div class="box hide" id="step4">
                <div class="center">
                  <a href="#"><img src="img/logo.png" class="logop"></a>
                </div>
                <div class="container center step z-depth-2">

                  <p class="encabezado">Tipo de servicio</p>
                  
                  <div class="centrado row">
                    <a class="paq" onclick="selectenv(1, 2)">
                      <div class="col s12 m6 l6 card black-text selected" id="env1">
                          <h5>Estandar: </h6>
                          <p id="costo">Costo: $350.00</p>
                          <br>
                      </div>
                    </a>
                      <a class="paq hide" onclick="selectenv(2, 2)" >
                      <div class="col s12 m6 l6 card black-text" id="env2">
                          <h5>Express: </h5>
                          <p>Costo: $790.00</p>
                          <br>
                      </div>
                    </a>
                    </div>


                    <!-- <div class="container center">
                      <h5>Servicio Local</h5>

                      <table class="striped centered responsive-table">
                          <thead>
                            <tr>
                                <th>Peso</th>
                                <th>Express (120 min)</th>
                                <th>Mismo Día</th>
                                <th>Día Siguiente</th>
                            </tr>
                          </thead>
                  
                          <tbody>
                            <tr>
                              <td>1 A 5 kg</td>
                              <td>$258.00</td>
                              <td>$233.00</td>
                              <td>$187.00</td>
                            </tr>
                            <tr>
                              <td>5 A 10 kg</td>
                              <td>$336.00</td>
                              <td>$297.00</td>
                              <td>$207.00</td>
                            </tr>
                            <tr>
                              <td>10 A 15 kg</td>
                              <td>$387.00</td>
                              <td>$362.00</td>
                              <td>$228.00</td>
                            </tr>
                            <tr>
                              <td>20 A 30 kg</td>
                              <td>N/A</td>
                              <td>$495.00</td>
                              <td>$370.00</td>
                            </tr>
                            <tr>
                              <td>30 A 40 kg</td>
                              <td>N/A</td>
                              <td>$504.00</td>
                              <td>$436.00</td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                    <br> -->
                    <div class="container center">
                      <h5 class="encabezado">Costos Adicionales</h5>
                      <br>
                      <p>Adicionalmente al precio de tu envío, considera que puede aplicar tambíen alguno de los siguientes costos en función del tipo de paquete(s)</p>
                        <br>
                        <div class="container tabla">
                          <table class="striped container" style="font-size: 12px !important;">
                            <tbody>
                              <tr>
                                <td>Zona extendida</td>
                                <td><b>$157.00</b></td>
                              </tr>
                              <tr>
                                <td>Corrección de dirección</td>
                                <td><b>$79.00</b></td>
                              </tr>
                              <tr>
                                <td>Seguro</td>  
                                <td><b>$92.00 + 1% <br><span style="font-size: 11px !important;">(Sobre valor declarado)</span></b></td>
                              </tr>
                              <tr>
                                <td>Forma Irregular</td>  
                                <td><b>$175.00</b></td>
                              </tr>
                              <tr>  
                                <td>Exceso de carga<br><span style="font-size: 11px !important;"><b>(más de 30kg de carga)</b></span></td>
                                <td><b>$175.00</b></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <br>
                        <p class="leyenda">Esta cotización solo es una referencia para el usuario. Para solicitar la recolección de tu(s) paquete(s) y datos para pago de servicio, comunicate a losteléfonos 5570455360 / 5570309891 <br> O si prefieres ponte en contactovía Whatsapp 5573393933 dando click <a href="https://wa.me/+525573393933" target="_blank" rel="noopener noreferrer">AQUÍ.</a></p>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                      <div class="col s6"> <a class="green-effect btn botones" style="background-color: #f19202; color: #000; font-weight: bold;"  onclick="prev(3)">Anterior</a></div>
                      <div class="col s6">
                        <a class="green-effect btn botones" style="background-color: #177dbe; color: #000; font-weight: bold;" onclick="generarpdf()">Cotizar</a>
                      </div>
                  </div>
              </div>
              </div>
            </div>
        
        </main>

        <!-- Loader Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content center">
      <br><br>
      <br><br>
      <div class="loader"></div>
    </div>
  </div>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
      <script type="text/javascript" src="dist/sweetalert-dev.js"></script>

    </body>
  </html>