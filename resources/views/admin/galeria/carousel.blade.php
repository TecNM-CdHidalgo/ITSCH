@extends('template')

@section('head')
    <link rel="stylesheet" href="{{ asset('CustomFileInputs/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('CustomFileInputs/css/component.css') }}">
    <link rel="stylesheet" href="{{ asset('SmartPhoto-master/css/smartphoto.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cropper/dist/cropper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}" crossorigin="anonymous">
    <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
@endsection

@section('titulo')
    Carrusel
@endsection

@section('contenido')
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
    <a href="{{ route('admin.carousel.subir_imagen') }}">
        <img src="{{ asset('images/icons/image-add-icon.png') }}" alt="Upload icon" class="mb-3" data-toggle="tooltip" data-replacement="top" title="Subir imágen">
    </a>
    <div class="gallery row">
        @php
            $max_carousel_height = "300px";
            if((new Jenssegers\Agent\Agent())->isMobile()){
                $max_carousel_height = "600px";
            }
        @endphp
        @foreach ($images as $image)
            <div class="col-md-3 mb-3 col-sm-4 d-flex align-items-stretch" style="max-height: {{ $max_carousel_height }}; overflow:hidden;">
                <img src="{{ asset('images/icons/delete_icon.png') }}" alt="Eliminar" class="img-delete-icon confirmModal" id="{{ $image->id }}" data-toggle="tooltip" data-replacement="top" title="Eliminar imágen">
                <a href="{{ asset('storage/carousel/'.$image->imagen_nombre) }}" data-gallery="manual" class="js-img-viwer" data-caption="" data-id="id-{{ $image->id }}">
                    <img src="{{ asset('storage/carousel/'.$image->imagen_nombre) }}" alt="mds-images" class="gallery-image" data-number="{{ $image->id }}" id="img-{{ $image->id }}" data-group="group">
                </a>
            </div>
        @endforeach
    </div>
    <div class="break-floats"></div>
    <div style="padding:50px;"></div>
    @section('js')
        <script src="{{ asset('CustomFileInputs/js/custom-file-input.js') }}"></script>
        <script src="{{ asset('modals/js/jquery.confirmModal.min.js') }}"></script>
        <script src="{{ asset('SmartPhoto-master/js/smartphoto.min.js') }}"></script>
            
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
                $.confirmModal('¿Estas seguro de eliminar la imágen?', function() {
                    window.location.href = "{{ route('admin.carousel.eliminar') }}"+"?id="+id;
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
            var section = document.getElementById('section-carousel');
            section.className += " default-text-color";
        </script>
    @endsection
@endsection