@extends('layouts.app')
@section('content')
    <!--Section: Contact v.2-->
    <section class="mb-4">

        <!--Section heading-->
        <h2 class="h1-responsive font-weight-bold text-center my-4">Denuncia</h2>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto mb-5">Si has sido víctima de acoso laboral, sexual y/o discriminación, denuncia aquí.</p>



        <div class="row">

            <!--Grid column-->
            <div class="col-md-9 mb-md-0 mb-5">
                <p class="pdg">Datos opcionales</p>
                <hr>
                <form id="formDenuncia" action="{{ route('contenido.denuncia.store') }}" method="POST">
                    @csrf
                    <!--Grid row-->
                    <div class="row">

                        {{-- Datos demandante --}}
                        <!--Grid column-->
                        <div class="col-md-6 pdg">
                            <div class="form-outline mb-0">
                                <input type="text" id="nomDem" name="nomDem" class="form-control ">
                                <label for="nomDem" class="form-label">Tú nombre</label>
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6 pdg">
                            <div class="md-form mb-0">
                                <select name="sexoDem" id="sexoDem" class="form-control">
                                    <option value="">Selecciona una opción</option>
                                    <option value="1">Hombre</option>
                                    <option value="2">Mujer</option>
                                    <option value="3">Otro</option>
                                </select>
                                <label for="sexoDem" class="form-label">Sexo</label>
                            </div>
                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <div class="row mb-4">
                        <div class="col-md-6 pdg">
                            <div class="form-outline mb-0">
                                <input type="tel" id="telDem" name="telDem" class="form-control ">
                                <label for="telDem" class="form-label">Teléfono</label>
                            </div>
                        </div>
                        <div class="col-md-6 pdg">
                            <div class="form-outline mb-0">
                                <input type="email" id="corrDem" name="corrDem" class="form-control ">
                                <label for="corrDem" class="form-label">Correo electrónico</label>
                            </div>
                        </div>
                    </div>

                    <!--Grid row-->
                    <div class="row mb-4">
                        <div class="col-md-12 pdg">
                            <div class="form-outline mb-0">
                                <input type="text" id="puestoDem" name="puestoDem" class="form-control">
                                <label for="puestoDem" class="form-label">Puesto o área donde labora</label>
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->

                    <p class="pdg" style="text-align: justify;"><b> Advertencia: </b>A la persona que desee conservar el anonimato, sólo podrá enterarse del curso de la denuncia presentada a través del seguimiento que ella misma dé a las sesiones del Comité o Subcomité.</p>

                    {{-- Fin datos demandante --}}

                    <p class="pdg"><b>DATOS DEL SERVIDOR PÚBLICO (A) CONTRA QUIEN SE PRESENTA LA DENUNCIA</b></p>
                    <p class="pdg">Datos obligatorios</p>
                    <hr>

                    <!--Grid row-->
                    <div class="row">

                        {{-- Datos demandado --}}

                        <!--Grid column-->
                        <div class="col-md-6 pdg">
                            <div class="form-outline mb-0">
                                <input type="text" id="nomAgre" name="nomAgre" class="form-control " required>
                                <label for="nomAgre" class="form-label">Nombre</label>
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6 pdg">
                            <div class="md-form mb-0 ">
                                <select name="sexoAgre" id="sexoAgre" class="form-control" required>
                                    <option value="">Selecciona una opción</option>
                                    <option value="1">Hombre</option>
                                    <option value="2">Mujer</option>
                                    <option value="3">Otro</option>
                                </select>
                                <label for="sexoAgre" class="form-label">Sexo</label>
                            </div>
                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                     <!--Grid row-->
                     <div class="row mb-4">
                        <div class="col-md-12 pdg">
                            <div class="form-outline mb-0">
                                <input type="text" id="puestoAgre" name="puestoAgre" class="form-control" required>
                                <label for="puestoAgre" class="form-label">Cargo o puesto donde labora</label>
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->

                      <!--Grid row-->
                      <div class="row mb-4">
                        <div class="col-md-12 pdg">
                            <div class="form-outline mb-0">
                                <input type="text" id="entAgre" name="entAgre" class="form-control" required>
                                <label for="entAgre" class="form-label">Entidad o dependencia</label>
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->

                    {{-- Fin de datos del demandado --}}

                    <p class="pdg"><b>DECLARACIÓN DE LOS HECHOS</b></p>
                    <hr>

                    <div class="row">
                        <div class="col-md-6 pdg">
                            <div class="md-form input-with-post-icon datepicker">
                                <input placeholder="Select date" type="date" id="fechaHec" name="fechaHec" class="form-control" required>
                                <label for="fechaHec">Fecha en la que ocurrieron los hechos</label>
                            </div>
                        </div>
                        <div class="col-md-6 pdg">
                            <div class="md-form input-with-post-icon">
                                <input placeholder="Select date" type="time" id="horaHec" name="horaHec" class="form-control" required>
                                <label for="horaHec">Hora en la que ocurrieron los hechos</label>
                            </div>
                        </div>
                    </div>

                    <!--Grid row-->
                    <div class="row mb-4">
                        <!--Grid column-->
                        <div class="col-md-12 pdg">
                            <div class="form-outline">
                                <textarea type="text" id="lugHec" name="lugHec" rows="2" class="form-control md-textarea" required></textarea>
                                <label for="lugHec" class="form-label">Lugar en el que ocurrieron los hechos</label>
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->

                     <!--Grid row-->
                     <div class="row mb-4">
                        <!--Grid column-->
                        <div class="col-md-12 pdg">
                            <div class="form-outline">
                                <textarea type="text" id="freHec" name="freHec" rows="2" class="form-control md-textarea" required></textarea>
                                <label for="freHec" class="form-label">Frecuencia de los hechos(si fue una vez o varias veces)</label>
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->

                     <!--Grid row-->
                     <div class="row mb-4">
                        <!--Grid column-->
                        <div class="col-md-12 pdg">
                            <div class="form-outline">
                                <textarea type="text" id="descHec" name="descHec" rows="5" class="form-control md-textarea" required></textarea>
                                <label for="descHec" class="form-label">Describa los hechos</label>
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->

                    <p class="pdg"><b>DATOS DE UNA PERSONA QUE HAYA SIDO TESTIGO DE LOS HECHOS(OPCIONAL)</b></p>
                    <hr>

                     <!--Grid row-->
                     <div class="row">
                        <!--Grid column-->
                        <div class="col-md-4 pdg">
                            <div class="form-outline mb-0">
                                <input type="text" id="nomTes" name="nomTes" class="form-control ">
                                <label for="nomTes" class="form-label">Nombre</label>
                            </div>
                        </div>
                        <!--Grid column-->
                        <div class="col-md-4 pdg">
                            <div class="form-outline mb-0">
                                <input type="tel" id="telTes" name="telTes" class="form-control ">
                                <label for="telTes" class="form-label">Teléfono</label>
                            </div>
                        </div>
                        <div class="col-md-4 pdg">
                            <div class="form-outline mb-0">
                                <input type="email" id="corrTes" name="corrTes" class="form-control ">
                                <label for="corrTes" class="form-label">Correo electrónico</label>
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->

                    <div class="row mb-4">
                        <div class="col-md-12 form-outline pdg">
                            ¿Trabaja en la administración pública? &nbsp &nbsp
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input collpase-button collapsed" id="chek" data-parent="#accordion" data-toggle="collapse" href="#panel-05">
                                <label class="custom-control-label" for="chek" id="opcion" >Si</label>
                            </div>
                        </div>
                    </div>

                    <div class="panel-group ficha-collapse" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-collapse collapse in" id="panel-05">
                                <div class="panel-body">
                                    <!--Grid row-->
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <div class="form-outline mb-0">
                                                <input type="text" id="entTes" name="entTes" class="form-control">
                                                <label for="entTes" class="form-label">Entidad o dependencia</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Grid row-->
                                    <!--Grid row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-outline mb-0">
                                                <input type="text" id="puestoTes" name="puestoTes" class="form-control">
                                                <label for="puestoTes" class="form-label">Cargo o puesto donde labora</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Grid row-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="pdg"><b>Todos los datos proporcionados en este documento serán estrictamente CONFIDENCIALES</b></p>
                    <hr>
                    <div class="pdg">
                        <button class="btn btn-primary g-recaptcha" data-sitekey="6Len1G4gAAAAAJdLW-uP0osW36Um53xDP3MV5h9a" data-callback='onSubmit' data-action='submit'>Enviar</button>
                    </div>

                </form>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-3 text-center">
                <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-map-marker-alt fa-2x"></i>
                        <p>ITSCH, Av. Ing. Carlos Rojas Gutiérrez #2120 Fracc. Valle de la Herradura </p>
                    </li>

                    <li><i class="fas fa-phone mt-4 fa-2x"></i>
                        <p>786 154 9000 ext. 110</p>
                    </li>

                    <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                        <p>equidad@cdhidalgo.tecnm.mx</p>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

        </div>

    </section>
    <!--Section: Contact v.2-->

@endsection

@section('js')

    {{-- Script para uso de CAPTCHA GOOGLE --}}
    <script>
        function onSubmit(token) {
        document.getElementById("formDenuncia").submit();
        }
    </script>

@endsection

