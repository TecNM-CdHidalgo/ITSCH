@extends('layouts.app')
@section('content')
	 <!--Main layout-->

    <div class="container">
        <img src="{{ asset('images/content/normativos/igualdad/banner.jpg') }}" style="width: 100%">

        <!-- Content -->
        <h3 style="text-align: center; font-family: 'Audiowide', sans-serif;"  >POLITICA DE IGUALDAD LABORAL Y NO DISCRIMINACIÓN DEL TECNOLÓGICO NACIONAL DE MÉXICO</h3>
        <a href="{{ asset('https://www.tecnm.mx/?vista=Sistema_Gestion_Igualdad') }}" class="btn btn-primary">Sistema de igualdad</a>
        <hr class="red">
        <p style="text-align: justify;  font-family: 'Montserrat'; font-size: 20px;" >
            El Tecnológico Nacional de México a través de su Director General, manifiesta su compromiso con la defensa de los derechos humanos, por lo que en la esfera de su competencia garantizara el principio de igualdad sustantiva entre mujeres y hombres en el ejercicio de sus derechos laborales, así como el derecho fundamental a la no discriminación en los procesos de ingreso, formación y promoción profesional, además de sus condiciones de trabajo, quedando prohibido el maltrato, violencia y segregación de las autoridades hacia el personal en materia de cualquier forma de distinción, exclusión o restricción basado en el origen étnico o nacional apariencia física, cultura, sexo, genero, edad, discapacidad, condición social o económica, condiciones de salud, embarazo, lengua, religión, opiniones, preferencias sexuales, estado civil, situación migratoria o cualquier otra, que tenga por efecto impedir o anular el reconocimiento o el ejercicio de los derechos y la igualdad  real de oportunidades.
        </p>




        <p class="text-center" style="font-family: 'Montserrat'; font-size: 24px;"><b>¿Sabias que…?</b> </p>
        <p style="text-align: justify; font-family: 'Montserrat'; font-size: 20px;">De acuerdo a la Norma Mexicana <b>NMX-R-025-SCFI-2015</b> , la <b>IGUALDAD</b> es:

        Principio que reconoce en todas las personas la libertad para desarrollar sus habilidades personales y hacer lecciones sin estar limitadas por estereotipos o prejuicios de manera que sus derechos, responsabilidades y oportunidades no dependan  de su origen étnico, racial o nacional, sexo, genero, edad, discapacidad, condición social o económica, condiciones de salud, embarazo, lengua, religión, opiniones preferencia u orientación sexual, estado civil o cualquier otra análoga: es decir, implica la eliminación de toda forma de discriminación.
        </p>
        <hr>

        {{-- Cards --}}
        <div class="row">
            <div class="col-sm-4">
                <div class="card" style="width:300px">
                    <img class="card-img-top" src="{{asset('images/content/normativos/igualdad/3.jpg')}}" alt="Card image" style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title" style="text-align: center;">Equidad de Género</h4>
                      <p class="card-text" style="text-align: justify; font-family: 'Montserrat'; font-size: 14px;">La Secretaría del Trabajo y Previsión Social (STPS) a partir del 2009, instrumenta la Norma Mexicana NMX-R-025-SCFI-2009 para la Igualdad Laboral entre Mujeres y Hombres. El objetivo de esta Norma se estableció con el fin de evaluar y certificar las prácticas en materia de igualdad laboral y no discriminación. <br> <b>Leer mas...</b> <br><br><br><br><br><br><br><br></p>
                      <a href="{{asset('documents/content/normativos/igualdad/POLITICA DE IGUALDAD LABORAL.pdf')}}" class="btn btn-primary" target="_blank">Ver/descargar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card" style="width:300px">
                    <img class="card-img-top" src="{{asset('images/content/normativos/igualdad/4.jpg')}}" alt="Card image" style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title" style="text-align: center;">Acoso laboral</h4>
                      <p class="card-text" style="text-align: justify; font-family: 'Montserrat'; font-size: 14px;">De  acuerdo  a  la  Norma  Mexicana en  igualdad  laboral y  no  discriminación,  EL  ACOSO  SEXUAL  ES: Una forma de violencia con connotación lasciva en la que, si bien no existe la subordinación, hay un ejercicio abusivo de poder que conlleva a un estado de indefensión y de riesgo para la victima, independientemente de queserealice en uno o varios eventos: <br> <b>Leer mas...</b> <br><br><br><br><br><br> </p>
                      <a href="{{asset('documents/content/normativos/igualdad/PREVENCION DE HOSTIGAMIENTO.pdf')}}" class="btn btn-primary" target="_blank">Ver/descargar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card" style="width:300px">
                    <img class="card-img-top" src="{{asset('images/content/normativos/igualdad/1.jpg')}}" alt="Card image" style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title" style="text-align: center;">Códido de conducta</h4>
                      <p class="card-text" style="text-align: justify; font-family: 'Montserrat'; font-size: 14px;"> La NMX-R-025-SCFl-2015 es la encargada de propiciar la integridad de los servidores públicos y para implementar acciones permanentes que favorezcan su comportamiento ético, dentro de la norma nos menciona el CODIGO DE CONDUCTA, lo cual permite que el personal que desempeña un empleo, cargo, comisión o función, deberá conducir su actuación pública con trasparencia, honestidad, lealtad, cooperación, austeridad, sin ostentación y con una clara orientación al interés público. <br> <b>Leer mas...</b> </p>
                      <a href="{{asset('documents/content/normativos/igualdad/CODIGO DE CONDUCTA DEL TECNOLOGICO NACIONAL DE MEXICO.pdf')}}" class="btn btn-primary" target="_blank">Ver/descargar</a>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-sm-4">
                <div class="card" style="width:300px">
                    <img class="card-img-top" src="{{asset('images/content/normativos/igualdad/6.jpg')}}" alt="Card image" style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title" style="text-align: center;">Formato para denuncia normas éticas</h4>
                      <p class="card-text" style="text-align: justify; font-family: 'Montserrat'; font-size: 14px;">Descarga el formato, llenalo y entregalo a un representante del comite. <br><br></p>
                      <a href="{{asset('documents/content/normativos/igualdad/Formato_Denuncia_Normaseticas.docx')}}" class="btn btn-primary" target="_blank">Ver/descargar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card" style="width:300px">
                    <img class="card-img-top" src="{{asset('images/content/normativos/igualdad/7.jpg')}}" alt="Card image" style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title" style="text-align: center;">Uso del lenguaje no sexista</h4>
                      <p class="card-text" style="text-align: justify; font-family: 'Montserrat'; font-size: 14px;">  Objetivos: visibilizar a las mujeres y la diversidad social, y equilibrar las asimetrías de género <br><br><br></p>
                      <a href="{{asset('documents/content/normativos/igualdad/leng_sexista.pdf')}}" class="btn btn-primary" target="_blank">Ver/descargar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card" style="width:300px">
                    <img class="card-img-top" src="{{asset('images/content/normativos/igualdad/5.jpg')}}" alt="Card image" style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title" style="text-align: center;">Formato para denuncia de Acoso Sexual</h4>
                      <p class="card-text" style="text-align: justify; font-family: 'Montserrat'; font-size: 14px;">Si estas sufriendo de acoso sexual, no te quedes callado(a) descarga el formato, llenalo y entregalo a un representante del comite.</p>
                      <a href="{{asset('documents/content/normativos/igualdad/Formato_Denuncia_Acoso_Sexual.docx')}}" class="btn btn-primary" target="_blank">Ver/descargar</a>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-sm-4">
                <div class="card" style="width:300px">
                    <img class="card-img-top" src="{{asset('images/content/normativos/igualdad/8.jpg')}}" alt="Card image" style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title" style="text-align: center;">Politica de igualdad laboral y no discriminación</h4>
                      <p class="card-text" style="text-align: justify; font-family: 'Montserrat'; font-size: 14px;">El Tecnológico Nacional de México a través de su Director General, manifiesta su compromiso con
                        la defensa de los derechos humanos, por lo que en la esfera de su competencia garantizará el
                        principio de igualdad sustantiva entre mujeres y hombres en el ejercicio de sus derechos laborales,
                        así como el derecho fundamental a la no discriminación en los procesos de ingreso, formación y
                        promoción profesional...<br><br><br> <b>Leer mas...</b> <br></p>
                      <a href="{{asset('documents/content/normativos/igualdad/poli.pdf')}}" class="btn btn-primary" target="_blank">Ver/descargar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card" style="width:300px">
                    <img class="card-img-top" src="{{asset('images/content/normativos/igualdad/2.jpg')}}" alt="Card image" style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title" style="text-align: center;">Inclusión diversidad y derechos humanos</h4>
                      <p class="card-text" style="text-align: justify; font-family: 'Montserrat'; font-size: 14px;">  la  IGUALDAD  es: Principio que reconoce en todas las personas la libertad para desarrollar sus habilidades personales y hacer lecciones sin estar limitadas por estereotipos o prejuicios de manera que sus derechos, responsabilidades y oportunidades no dependan de su origen étnico, racial o nacional, sexo, genero, edad, discapacidad, condición social o económica, condiciones de salud, embarazo, lengua, religión, opiniones preferencia u orientación sexual, estado civil o cualquier otra análoga <br> <b>Leer mas...</b></p>
                      <a href="{{asset('documents/content/normativos/igualdad/INCLUSION-DIVERSIDAD-DERECHOS HUMANOS.pdf')}}" class="btn btn-primary" target="_blank">Ver/descargar</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card" style="width:300px">
                    <img class="card-img-top" src="{{asset('images/content/normativos/igualdad/2.jpg')}}" alt="Card image" style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title" style="text-align: center;">Lactancia materna</h4>
                      <p class="card-text" style="text-align: justify; font-family: 'Montserrat'; font-size: 14px;"> <b>La OMS Y UNICEF</b>  <br> Mencionan que La lactancia materna les proporciona a los bebés todos los nutrientes que necesitan para crecer y que su sistema inmunológico se desarrolle plenamente. Recomiendan que la lecha materna sea el alimento exclusivo de los bebés recién nacidos hasta los 6 meses de edad, y que hasta los 2 años se alimenten con una combinación de la misma con alimentos adecuados y nutritivos para su edad <br><br><br><br> <b>Leer mas...</b></p>
                      <a href="{{asset('documents/content/normativos/igualdad/LACTANCIA MATERNA.pdf')}}" class="btn btn-primary" target="_blank">Ver/descargar</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <div class="card" style="width:300px">
                    <img class="card-img-top" src="{{asset('images/content/normativos/igualdad/2.jpg')}}" alt="Card image" style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title" style="text-align: center;">Código de Ética de la Administración Publica Federal</h4>
                      <p class="card-text" style="text-align: justify; font-family: 'Montserrat'; font-size: 14px;"> El presente Código de Ética es aplicable a todas las personas que desempeñen un empleo, cargo o comisión en las dependencias y entidades de la Administración Pública Federal, por lo que es obligatorio en cualquiera de sus niveles jerárquicos, incluyendo al personal de base y sindicalizado, y su incumplimiento será objeto de denuncia, conforme a lo dispuesto en el artículo 24 del presente instrumento. <br><br><br><br> <b>Leer mas...</b></p>
                      <a href="{{asset('documents/content/normativos/igualdad/Código de Ética de la Administración Publica Federal.pdf')}}" class="btn btn-primary" target="_blank">Ver/descargar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">

            </div>
            <div class="col-sm-4">

            </div>
        </div>
        <br>
        <hr>
        <p style="text-align: justify;  font-family: 'Montserrat'; font-size: 20px;">Si has sufrido algún tipo de acoso y/o discriminación denuncia aquí...</p>
        <a href="{{ route('contenido.denuncia.index') }}" type="button" class="btn btn-primary">Denuncia</a>
        <hr>
        <h4>Certificado NMX-R-025-SCFI-2015</h4>
        <br>
        <img style="max-height: 500px" src="{{ asset('documents/content/normativos/igualdad/CERTIFICADO-2025_162 SUP. DE CD. HIDALGO_001.jpg') }}" class="float-left img-fluid img-thumbnail" alt="Imagen de certificado 1">
        <img style="max-height: 500px" src="{{ asset('documents/content/normativos/igualdad/CERTIFICADO-2025_162 SUP. DE CD. HIDALGO_002.jpg') }}" class="float-right img-fluid img-thumbnail" alt="Imagen de certificado 2">

        <div style="margin-top: 600px"></div>

@endsection
