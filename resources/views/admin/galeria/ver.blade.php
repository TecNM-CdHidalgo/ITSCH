@extends('template')

@section('head')
    <link rel="stylesheet"href="{{ asset('CustomFileInputs/css/normalize.css') }}">
    <link rel="stylesheet"href="{{ asset('CustomFileInputs/css/component.css') }}">
    <link rel="stylesheet"href="{{ asset('SmartPhoto-master/css/smartphoto.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
@endsection

@section('titulo')
    Imágenes | Ver
@endsection

@section('contenido')
    <div class="alert alert-warning" role="alert">
        La ultima photo subida será tomada como portada del album
    </div>
    <div class="alert alert-success" id="mds-alert-success" role="alert" style="display:none;">
        Imágen subida exitosamente
    </div>
    <div class="alert alert-danger" id="mds-alert-danger" role="alert" style="display:none;">
        Ocurrió un error al subir el archivo
    </div>
    <div>
        <h2>{{ $gallery->titulo }}</h2>
        <p style="font-size:large;">{{ $gallery->descripcion }}</p>
    </div>
    <style>
        .gallery-image{
            width: 100%;
            height: auto;
        }

        .img-delete-icon{
            max-height: 32px;
            max-width: 32px;
            position: absolute;
            margin-left: 17px;
            margin-top: 17px;
            display: inline-block;
            visibility: hidden;
        }
    </style>

    <form action="#" method="POST" enctype="multipart/form-data" style="margin-left:1%;" id="submitForm">
        @csrf
        <div class="box">
            <input type="file" name="images[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} archivos seleccionados" multiple required/>
            <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20"height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Subir imágenes&hellip;</span></label>
        </div>
        <input type="hidden" name="gallery_id" value="{{ $gallery->id }}">
        <button name="" type="submit" class="btn btn-primary mb-2" id="submit-files" style="display:none;">Guardar</button>
    </form>
    <div class="progress mb-3" id="mds-progress-bar-container" style="display:none">
        <div class="progress-bar progress-bar-striped progress-bar-animated" id="mds-progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
    </div>
    <div class="gallery row">
        @php
            $max_width = "300px";
            if((new Jenssegers\Agent\Agent())->isMobile()){
                $max_width = "600px";
            }
        @endphp
        @foreach ($images as $image)
            <div class="col-md-3 mb-3 col-sm-4 d-flex align-items-stretch" style="max-height: {{ $max_width }}; overflow:hidden;">
                <img src="{{ asset('images/icons/delete_icon.png') }}" alt="Eliminar" class="img-delete-icon confirmModal" id="{{ $image->id }}">
                <a href="{{ asset('storage/gallery/'.$gallery->id.'/'.$image->nombre) }}" data-gallery="manual" class="js-img-viwer" data-caption="" data-id="id-{{ $image->id }}">
                    <img src="{{ asset('storage/gallery/'.$gallery->id.'/'.$image->nombre) }}" alt="mds-images" class="gallery-image" data-number="{{ $image->id }}" id="img-{{ $image->id }}" data-group="group">
                </a>
            </div>
        @endforeach
    </div>
    <div class="break-floats"></div>
    @section('js')
        <script src="{{ asset('CustomFileInputs/js/custom-file-input.js') }}"></script>
        <script src="{{ asset('modals/js/jquery.confirmModal.min.js') }}"></script>
        <script src="{{ asset('SmartPhoto-master/js/smartphoto.min.js') }}"></script>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        <script>
            var isMobile = "{{ (new Jenssegers\Agent\Agent())->isMobile() }}";
            if(isMobile){
                $(".img-delete-icon").css('visibility','visible');
            }
            $('.gallery-image').on('mouseover',function(){
                $('#'+$(this).data('number')).css('visibility','visible');
                $(this).css('border','solid 5px');
            });
            $('.gallery-image').on('mouseout', function(){
                if(!isMobile)
                    $('#'+$(this).data('number')).css('visibility','hidden');
                $(this).css('border','none');
            });
            $('.img-delete-icon').on('mouseover',function(){
                $('#img-'+$(this).attr('id')).mouseenter();
            });
            $('.confirmModal').click(function(e) {
                e.preventDefault();
                var id = $(this).attr('id');
                $.confirmModal('¿Estas seguro de eliminar la imágen?', function(el) {
                    window.location.href = "{{ route('admin.galeria.eliminar_imagen') }}"+"?id="+id;
                });
            });
            $('#submitForm').on('submit', function(event){
                event.preventDefault();
                $('#mds-progress-bar-container').css('display','default');
                $('#mds-progress-bar-container').fadeIn(100);
                // Use `jQuery.ajax` method for example
                $.ajax({
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);
                            $('#mds-progress-bar').css('width',percentComplete+"%");
                            console.log(percentComplete);
                            if (percentComplete === 100) {

                            }
                        }
                        }, false);
                        return xhr;
                    },
                    method: "POST",
                    url: "{{ route('admin.galeria.subir_imagenes') }}",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success(response) {
                        response = response[0];
                        if(response['type'] == 'error'){
                            document.getElementById('mds-alert-danger').innerHTML = response['message'];
                            $('#mds-alert-danger').fadeIn();
                            $('#mds-alert-danger').fadeOut(3000);
                            console.log('Upload error');
                            setTimeout(function(){
                                $('#mds-progress-bar').css('width',"0%");
                                $('#mds-progress-bar-container').fadeOut(2000);
                            },2000);
                        }else{
                            document.getElementById('mds-alert-success').innerHTML = response['message'];
                            $('#mds-alert-success').fadeIn();
                            setTimeout(function(){
                                window.location.replace("{{ route('admin.galeria.ver',['id' => $gallery->id]) }}");
                            },2000);
                        }

                    },
                    error(error) {
                        error = error[0];
                        document.getElementById('mds-alert-danger').innerHTM = error['message'];
                        $('#mds-progress-bar-container').fadeOut(3000);
                        $('#mds-alert-danger').fadeIn();
                        $('#mds-alert-danger').fadeOut(3000);
                        console.log('Upload error');
                    },
                });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded',function(){
                var photo = new SmartPhoto(".js-img-viwer");
                photo.on('close',function(){
                    $('.mds-header').css('visibility','visible');
                });
                photo.on('open',function(){
                    $('.mds-header').css('visibility','hidden');
                });
            });
        </script>
        <script>
            var section = document.getElementById('section-galeria');
            section.className += " default-text-color";
        </script>
    @endsection
@endsection
