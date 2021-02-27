@extends('layouts.app')


@section('content')
  <div class="row">
    <div class="col-sm-12">
      <br>
    </div>
  </div>
  <div class="row">
      <div class="col-sm-1"></div>
        <div class="col-sm-10">                
          <img src="{{asset('/images/content/fichas2021/slidefichassv.svg')}}" alt="Fichas" style="width: 100%; max-eigth:800px;" >                     
          <hr>
          <div class="card">
            <div class="card-header">
              <h2>Fichas 2021</h2>
            </div>
            <div class="card-body">
              <h5 class="card-title">Sigue estos sencillos pasos para sacar tu ficha</h5>
              <p class="card-text">No olvides leér bien y no saltarte ningun paso, preparamos una infografía para que tu proceso sea mas claro. Da clic en el botón para ver la infografía.</p>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Ver Infografía</button>
            </div>
            <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">                  
                      <img src="{{asset('/images/content/fichas2021/inf.jpg')}}" class="img-fluid" alt="Responsive image">
                </div>
              </div>            
            </div>
            <br>
          
            <h3>&nbsp Oferta educativa</h3>
            <hr class="red">
          
            {{-- Carrusel de videos --}}

            <div id="demo" class="carousel slide" data-ride="carousel">

              <!-- Indicators -->
              <ul class="carousel-indicators" style="z-index: 100;">
                <li data-target="#demo" data-slide-to="0" class="active" style="background-color: #270838;"></li>
                <li data-target="#demo" data-slide-to="1" style="background-color: #270838;"></li>
                <li data-target="#demo" data-slide-to="2" style="background-color: #270838;"></li>
                <li data-target="#demo" data-slide-to="3" style="background-color: #270838;"></li>
                <li data-target="#demo" data-slide-to="4" style="background-color: #270838;"></li>
                <li data-target="#demo" data-slide-to="5" style="background-color: #270838;"></li>
                <li data-target="#demo" data-slide-to="6" style="background-color: #270838;"></li>
              </ul>
            
              <!-- The slideshow -->
              <div class="carousel-inner">
                <div class="carousel-item active" style="text-align: center;">
                  <img src="{{ asset('images/content/oferta educativa/logosvfinal2020/banner sistemas itsch.svg') }}" alt="Sistemas">
                  <div class="carousel-caption">
                    <a class="btn btn-sm btn-primary" href="https://www.youtube.com/embed/_nD-0C_POGA" type="button">Video SISTEMAS</a>
                  </div>
                </div>
                <div class="carousel-item" style="text-align: center;">
                  <img src="{{ asset('images/content/oferta educativa/logosvfinal2020/banner tics itsch.svg') }}" alt="Tics">
                  <div class="carousel-caption">
                    <a class="btn btn-sm btn-primary" href="https://youtu.be/9mk1Fw-BXiE" type="button">Video TICS</a>
                  </div>
                </div>
                <div class="carousel-item" style="text-align: center;">
                  <img src="{{ asset('images/content/oferta educativa/logosvfinal2020/banner gestion itsch.svg') }}" alt="Tics">
                  <div class="carousel-caption">
                    <a class="btn btn-sm btn-primary" href="https://youtu.be/Jg3qdMTlUdI" type="button">Video GESTIÓN</a>
                  </div>
                </div>
                <div class="carousel-item" style="text-align: center;">
                  <img src="{{ asset('images/content/oferta educativa/logosvfinal2020/baner nanotec itsch.svg') }}" alt="Nanotecnologia">
                  <div class="carousel-caption">
                    <a class="btn btn-sm btn-primary" href="https://www.youtube.com/embed/AuMQ7xs_5Ag" type="button">Video NANOTECNOLGÍA</a>
                  </div>
                </div>
                <div class="carousel-item" style="text-align: center;">
                  <img src="{{ asset('images/content/oferta educativa/logosvfinal2020/banner bioquimica itsch.svg') }}" alt="Bioquímica">
                  <div class="carousel-caption">
                    <a class="btn btn-sm btn-primary" href="https://youtu.be/tsol1rX9B-w" type="button">Video BIOQUÍMICA</a>
                  </div>
                </div>
                <div class="carousel-item" style="text-align: center;">
                  <img src="{{ asset('images/content/oferta educativa/logosvfinal2020/banner industrial itsch.svg') }}" alt="Industrial">
                  <div class="carousel-caption">
                    <a class="btn btn-sm btn-primary" href="https://youtu.be/2RMu_OaSxRo" type="button">Video INDUSTRIAL</a>
                  </div>
                </div>
                <div class="carousel-item" style="text-align: center;">
                  <img src="{{ asset('images/content/oferta educativa/logosvfinal2020/banner meca itsch.svg') }}" alt="Mecatrónica">
                  <div class="carousel-caption">
                    <a class="btn btn-sm btn-primary" href="https://www.youtube.com/embed/YC0sBM2nEag" type="button">Video MECATRÓNICA</a>
                  </div>
                </div>
              </div>
            
              <!-- Left and right controls -->
              <a class="carousel-control-prev text-dark" href="#demo" data-slide="prev">
                <span class="fa fa-chevron-left" style="font-size:24px"></span>
              </a>
              <a class="carousel-control-next text-dark" href="#demo" data-slide="next">
                <span class="fa fa-chevron-right" style="font-size:24px"></span>
              </a>          
            </div>

            {{-- Fin de carrusel de videos --}}          
            <div class="container">            
              <br>           
              <br>           
              <div class="card">
                <div class="card-header">
                  Documentación
                </div>
                <div class="card-body">
                  <h5 class="card-title">Reúne y escanea tus documentos</h5>
                  <p class="card-text">
                      <ul>                    
                        <li>Acta de nacimiento</li>
                        <li>Certificado de bachillerato (en caso de no contar con el, deberán presentar una   constancia original con promedio indicando que cursa el último semestre)</li>
                        <li>CURP</li>
                        <li>Dos fotografías tamaño infantil (blanco y negro o color)</li>
                        <li>Impresión de tu número de seguridad social (página del IMSS)</li>
                        <li>Descarga la solicitud para el Examen de selección</li>
                      </ul>                 
                  </p>
                  <a href="{{asset('documents/content/vinculacion/fichas2021/SOLICITUD_PARA_EXAMEN_DE_SELECCION_AGOSTO-DICIEMBRE_2021.pdf')}}" class="btn btn-primary">Descargar Solicitud</a>
                </div>
              </div>                     
              <hr>                     
                    
              <div class="card">
                <div class="card-header">
                  Realiza tu pago
                </div>
                <div class="card-body">                
                  <p class="card-text">                                          
                    <strong>REALIZAR PAGO</strong> en el banco y <strong>CANJEAR</strong> por tu recibo oficial en el boton que se encuentra a continuación y escaneas.                    
                  </p>
                  <a href="https://cdhidalgo.tecnm.mx/apps/reciboe2/index.html#!/login" class="btn btn-primary">Canjear Recibo</a>
                </div>
              </div>                    
              <hr>    

              <div class="card">
                <div class="card-header">
                  Registro
                </div>
                <div class="card-body">
                  <h5 class="card-title">Llenar registro</h5>
                  <p class="card-text">                      
                    Realiza tu registro dando clic en el boton que se encuentra a continuación. 
                    <font='red'>¡OJO! Aquí deberas subir los documentos que ya tienes escaneados.</font>                  
                  </p>               
                  <a class="btn btn-primary" href="https://forms.gle/ECN1hdUjvQ3r3fnLA" role="button">Registro</a>
                </div>
              </div>   
              <hr>

              <div class="card">
                <div class="card-header">
                  Confirmaciòn
                </div>
                <div class="card-body">
                  <h5 class="card-title">Recibiras un correo</h5>
                  <p class="card-text">                   
                    Recibiràs un correo de confirmación con tu ficha, en máximo 4 días.                  
                  </p> 
                </div> 
              </div>   
              <hr>

              <div class="card">
                <div class="card-header">
                  Test Psicométrico
                </div>
                <div class="card-body">
                  <h5 class="card-title">Realizar test</h5>
                  <p class="card-text">              
                    Deberás realizar tu test psicométrico, dando clic en el boton que se encuentra a continuación                
                  </p>           
                  <a class="btn btn-primary" href="https://www.cdhidalgo.tecnm.mx:8081/Caracterizacion/alumno/index.php" role="button">Test Psicométrico</a>
                </div>
              </div>
              <br>              
            </div>
          </div>  
          <p class="MsoNormal" align="justify" style="font-style: normal; margin-right: 4.7pt; text-align: justify; line-height: 114%;"><span style="mso-spacerun:'yes';font-family:'Montserrat Medium';mso-fareast-font-family:'Times New Roman';
          mso-bidi-font-family:Arial;line-height:114%;font-size:10.0000pt;">&nbsp;</span></p><p class="MsoNormal" style="font-style: normal; margin-right: 4.7pt;"><b><span style="mso-spacerun:'yes';font-family:'Montserrat ExtraBold';mso-fareast-font-family:'Times New Roman';
          mso-bidi-font-family:'Times New Roman';mso-ansi-font-weight:bold;font-size:10.0000pt;">&nbsp;</span></b></p><p class="MsoNormal" style="font-style: normal; text-align: center; margin-right: 4.7pt;"><b><span style="mso-spacerun:'yes';font-family:'Montserrat ExtraBold';mso-fareast-font-family:'Times New Roman';
          mso-bidi-font-family:'Times New Roman';mso-ansi-font-weight:bold;font-size:10.0000pt;">A T E N T A M E N T E </span></b><b><span style="mso-spacerun:'yes';font-family:'Montserrat ExtraBold';mso-fareast-font-family:'Times New Roman';
          mso-bidi-font-family:'Times New Roman';mso-ansi-font-weight:bold;font-size:10.0000pt;"><o:p></o:p></span></b></p>
          <p class="MsoNormal" style="font-style: normal; text-align: center; margin-right: 4.7pt;"><b><i><span style="mso-spacerun:'yes';font-family:'Montserrat ExtraLight';mso-fareast-font-family:'Times New Roman';
          mso-bidi-font-family:'Times New Roman';mso-ansi-font-weight:bold;mso-ansi-font-style:italic;
          font-size:8.0000pt;">Excelencia en Educación Tecnológica</span></i></b><b><i><span style="mso-spacerun:'yes';font-family:'Montserrat ExtraLight';mso-fareast-font-family:'Times New Roman';
          mso-bidi-font-family:'Times New Roman';mso-ansi-font-weight:bold;mso-ansi-font-style:italic;
          font-size:4.0000pt;">®</span></i></b><b><i><span style="mso-spacerun:'yes';font-family:'Montserrat ExtraLight';mso-fareast-font-family:'Times New Roman';
          mso-bidi-font-family:'Times New Roman';mso-ansi-font-weight:bold;mso-ansi-font-style:italic;
          font-size:8.0000pt;">&nbsp;</span></i></b><b><i><span style="mso-spacerun:'yes';font-family:'Montserrat ExtraLight';mso-fareast-font-family:'Times New Roman';
          mso-bidi-font-family:'Times New Roman';mso-ansi-font-weight:bold;mso-ansi-font-style:italic;
          font-size:8.0000pt;"><o:p></o:p></span></i></b></p><p class="MsoNormal" style="font-style: normal; text-align: center; margin-right: 4.7pt;"><b><i><span style="mso-spacerun:'yes';font-family:'Montserrat ExtraLight';mso-fareast-font-family:'Times New Roman';
          mso-bidi-font-family:'Times New Roman';mso-ansi-font-weight:bold;mso-ansi-font-style:italic;
          font-size:8.0000pt;">Educación. Herencia para el Éxito</span></i></b><b><i><span style="mso-spacerun:'yes';font-family:'Montserrat ExtraLight';mso-fareast-font-family:'Times New Roman';
          mso-bidi-font-family:'Times New Roman';mso-ansi-font-weight:bold;mso-ansi-font-style:italic;
          font-size:8.0000pt;"><o:p></o:p></span></i></b></p><p class="MsoNormal" align="justify" style="font-style: normal; margin-right: 4.7pt; text-align: justify; line-height: 114%;"><span style="mso-spacerun:'yes';font-family:'Montserrat Medium';mso-fareast-font-family:'Times New Roman';
          mso-bidi-font-family:'Times New Roman';line-height:114%;font-size:10.0000pt;">&nbsp;</span></p><p class="MsoNormal" align="justify" style="text-align: center; font-style: normal; margin-right: 4.7pt; line-height: 114%;"><span style="mso-spacerun:'yes';font-family:'Montserrat Medium';mso-fareast-font-family:'Times New Roman';
          mso-bidi-font-family:'Times New Roman';line-height:114%;font-size:10.0000pt;">&nbsp;</span></p><p class="MsoNormal" style="text-align: center; margin-right: 4.7pt;"><span style="font-style: italic;"><b style=""><span style="font-family: &quot;Montserrat ExtraBold&quot;; font-size: 10pt;">MTRA. PALOMA ELIZABETH MARTÍNEZ PALOMARES</span></b><b style=""><span style="mso-spacerun:'yes';font-family:'Montserrat ExtraBold';mso-fareast-font-family:'Times New Roman';
          mso-bidi-font-family:'Times New Roman';mso-ansi-font-weight:bold;font-size:10.0000pt;">&nbsp;</span></b><span style="font-family: Montserrat; font-size: 9pt;"><o:p></o:p></span></span></p><p class="MsoNormal" style="text-align: center; margin-right: 4.7pt;"><b style=""><span style="font-family: &quot;Montserrat ExtraBold&quot;; font-size: 10pt; font-style: italic;">DIRECTORA GENERAL</span></b><span style="font-style: normal; font-family: Montserrat; font-size: 9pt;"><o:p></o:p></span></p>        
    </div>       
    <div class="col-sm-1"></div>    
  </div>

@endsection