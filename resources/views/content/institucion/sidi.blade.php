@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-2">
             <!--Main Navigation-->
            <header>
                <!-- Sidebar -->
                <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
                <div class="position-sticky">
                    <div class="list-group list-group-flush mx-3 mt-4">
                        <a href="https://www.cdhidalgo.tecnm.mx:8088/" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                            <i class="fas fa-graduation-cap fa-fw me-3"></i><span>STA</span>
                        </a>
                        <a href="http://www.itsch.edu.mx:8080/sgcv3/LoginAdmin.aspx" class="list-group-item list-group-item-action py-2 ripple">
                            <i class="fas fa-users fa-fw me-3"></i><span>Directivos</span>
                        </a>
                        <a href="http://www.itsch.edu.mx:8080/sgcv3/LoginDocen.aspx" class="list-group-item list-group-item-action py-2 ripple">
                            <i class="fas fa-chalkboard-teacher fa-fw me-3"></i><span>Docentes</span></a>
                        <a href="https://www.cdhidalgo.tecnm.mx:8084/admin/index.html#!/" class="list-group-item list-group-item-action py-2 ripple">
                            <i class="fas fa-hand-holding-usd fa-fw me-3"></i><span>Caja</span></a>
                        <a href="http://www.itsch.edu.mx:8080/SAFTEC%20V2.1/Default" class="list-group-item list-group-item-action py-2 ripple">
                            <i class="fas fa-clipboard-list fa-fw me-3"></i><span>SAFTEC</span>
                        </a>
                    </div>
                </div>
                </nav>
                <!-- Sidebar -->
            </header>
            <!--Main Navigation-->

            <!--Main layout-->
            <main style="margin-top: 10px;">
                <div class="container pt-4"></div>
            </main>
            <!--Main layout-->
        </div>
        <div class="col-sm-10" style="text-align: center;">
            <img src="{{ asset('images/content/instituto/sidi.png') }}" alt="Sistema SIDI" style="width: 200px">
            <br>
            <b>Sistema de Información digital del ITSCH </b>
            <p>
                SIDI es una plataforma creada para manejar los diferentes sistemas que el Instituto Tecnológico Superior de Ciudad Hidalgo ha creado para automatizar procesos y digitalizar la información.
            </p>
        </div>
    </div>
@endsection
