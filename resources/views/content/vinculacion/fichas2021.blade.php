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
      <section>
          
            <div style="max-width: 90%; margin:auto;">
                       
        <div style=" max-height:600px; max-width:100%;">
            <img src="{{asset('/images/content/fichas2021/slidefichassv.svg')}}" alt="" style="display:block; max-width:100%; max-height:600px; width:auto; height:auto; margin:auto;">
        </div>
        <br>

    
        


        <div class="regContent">
        
          <div class="container-fluid">
              
              
              
              
              <!-- Extra large modal -->


              
<div class="card">
  <div class="card-header">
    Fichas 2021
  </div>
  <div class="card-body">
    <h5 class="card-title">Sigue estos sencillos pasos para sacar tu ficha</h5>
    <p class="card-text">No olvides leér bien y no saltarte ningun paso, preparamos una infografía para que tu proceso sea mas claro. Da clic en el botón para ver la infografía.</p>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Ver Infografía</button>

<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      
          <img src="{{asset('/images/content/fichas2021/inf.jpg')}}" class="img-fluid" alt="Responsive image">

    </div>
  </div>
</div></div>
  
</div>
<br>

<div class="container-fluid">
    <p class="h4">Oferta Educativa</p>

<hr class="red">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
       <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
         <li data-target="#myCarousel" data-slide-to="5"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="1000">
          <img src="{{ asset('images/content/oferta educativa/logosvfinal2020/banner sistemas itsch.svg') }}" class="img-fluid" alt="Responsive image">
        <div class="container">
          <div class="carousel-caption text-left">
              
           <p><a class="btn btn-sm btn-primary" href="https://www.youtube.com/embed/_nD-0C_POGA" role="button">Video SISTEMAS</a></p>
          </div>
        </div>
      </div>
      
      
      
      <div class="carousel-item" data-bs-interval="1000">
         <img src="{{ asset('images/content/oferta educativa/logosvfinal2020/banner tics itsch.svg') }}" class="img-fluid" alt="Responsive image">
        <div class="container">
          <div class="carousel-caption text-left">
              
           <p><a class="btn btn-sm btn-primary" href="https://youtu.be/9mk1Fw-BXiE" role="button">Video TIC´S</a></p>
          </div>
        </div>
      </div>
      
      
      
      
      
        <div class="carousel-item" data-bs-interval="1000">
       <img src="{{ asset('images/content/oferta educativa/logosvfinal2020/banner gestion itsch.svg') }}" class="img-fluid" alt="Responsive image">
        <div class="container">
          <div class="carousel-caption text-left">
              
           <p><a class="btn btn-sm btn-primary" href="https://youtu.be/Jg3qdMTlUdI" role="button">Video GESTION</a></p>
          </div>
        </div>
      </div>
      
      
       <div class="carousel-item" data-bs-interval="1000">
       <img src="{{ asset('images/content/oferta educativa/logosvfinal2020/baner nanotec itsch.svg') }}" class="img-fluid" alt="Responsive image">
        <div class="container">
          <div class="carousel-caption text-left">
              
           <p><a class="btn btn-sm btn-primary" href="https://www.youtube.com/embed/AuMQ7xs_5Ag" role="button">Video NANOTECNOLGÍA</a></p>
          </div>
        </div>
      </div>
      
      
      
       <div class="carousel-item" data-bs-interval="1000">
       <img src="{{ asset('images/content/oferta educativa/logosvfinal2020/banner bioquimica itsch.svg') }}" class="img-fluid" alt="Responsive image">
        <div class="container">
          <div class="carousel-caption text-left">
              
           <p><a class="btn btn-sm btn-primary" href="https://youtu.be/tsol1rX9B-w" role="button">Video BIOQUÍMICA</a></p>
          </div>
        </div>
      </div>
      
      
      
      
        <div class="carousel-item" data-bs-interval="1000">
       <img src="{{ asset('images/content/oferta educativa/logosvfinal2020/banner industrial itsch.svg') }}" class="img-fluid" alt="Responsive image">
        <div class="container">
          <div class="carousel-caption text-left">
              
           <p><a class="btn btn-sm btn-primary" href="https://youtu.be/2RMu_OaSxRo" role="button">Video INDUSTRIAL</a></p>
          </div>
        </div>
      </div>
      
      
        <div class="carousel-item" data-bs-interval="1000">
       <img src="{{ asset('images/content/oferta educativa/logosvfinal2020/banner meca itsch.svg') }}" class="img-fluid" alt="Responsive image">
        <div class="container">
          <div class="carousel-caption text-left">
              
           <p><a class="btn btn-sm btn-primary" href="https://www.youtube.com/embed/YC0sBM2nEag" role="button">Video MECATRÓNICA</a></p>
          </div>
        </div>
      </div>
      
      
      
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

</div>
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
            
           <br>
  
  
  <div class="card">
  <div class="card-header">
    REALIZA TU PAGO
  </div>
  <div class="card-body">
    <h5 class="card-title">Realiza tu pago</h5>
    <p class="card-text">
        <ul>
            
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
        <ul>
            
            Realiza tu registro dando clic en el boton que se encuentra a continuación. 
            <font='red'>¡OJO! Aquí deberas subir los documentos que ya tienes escaneados.</font>
        
        
    </p>
    
    
    <a class="btn btn-primary" href="https://forms.gle/ECN1hdUjvQ3r3fnLA" role="button">Registro</a>
 </div>
</div>




  
  <div class="card">
  <div class="card-header">
    Confirmaciòn
  </div>
  <div class="card-body">
    <h5 class="card-title">Recibiras un correo</h5>
    <p class="card-text">
        <ul>
Recibiràs un correo de confirmaci;on con tu ficha, en máximo 4 días.
        
        
    </p>
    
    
    
 </div>
</div>
  
            
                  <hr>
  
   
            
  
  <div class="card">
  <div class="card-header">
    Examen Psicométrico
  </div>
  <div class="card-body">
    <h5 class="card-title">Realizar examen</h5>
    <p class="card-text">
        <ul>
            
            Deberás realizar tu examen psicométrico, dando clic en el boton que se encuentra a continuación 
        
        
        
    </p>
    
    
    <a class="btn btn-primary" href="https://www.cdhidalgo.tecnm.mx:8081/Caracterizacion/alumno/index.php" role="button">Examen Psicométrico</a>
 </div>
</div>
            
            
            
              <hr class="red">
              

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
mso-bidi-font-family:'Times New Roman';mso-ansi-font-weight:bold;font-size:10.0000pt;">&nbsp;</span></b><span style="font-family: Montserrat; font-size: 9pt;"><o:p></o:p></span></span></p><p class="MsoNormal" style="text-align: center; margin-right: 4.7pt;"><b style=""><span style="font-family: &quot;Montserrat ExtraBold&quot;; font-size: 10pt; font-style: italic;">DIRECTORA GENERAL</span></b><span style="font-style: normal; font-family: Montserrat; font-size: 9pt;"><o:p></o:p></span></p>        </div>

     

    

    </div>
          </section>
    </div>
  
</div>
    
  

  </div>

  

  
  

@endsection