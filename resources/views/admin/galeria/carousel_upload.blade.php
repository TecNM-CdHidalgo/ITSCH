@extends('template')

@section('head')
    <link rel="stylesheet" href="{{ asset('CustomFileInputs/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('CustomFileInputs/css/component.css') }}">
    <link rel="stylesheet" href="{{ asset('SmartPhoto-master/css/smartphoto.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cropper/dist/cropper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
@endsection

@section('titulo')
    Carrusel | Subir imágen
@endsection

@section('contenido')
    <div class="progress mb-3" id="mds-progress-bar-container" style="display:none;">
        <div class="progress-bar progress-bar-striped progress-bar-animated" id="mds-progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
    </div>
    <div style="margin-left:10%;">
        <button id="save" type="button" class="btn btn-primary btn-lg" title="Guardar imágen">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="Guardar Imágen">
                <span class="fa fa-save"></span>
            </span>
        </button>
        <label class="btn btn-primary btn-upload btn-lg" for="inputImage" title="Subir imágen" style="margin-top:8px;">
        <input type="file" class="sr-only" id="inputImage" name="file" accept=".jpg,.jpeg,.png">
        <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="Subir imágen">
            <span class="fa fa-upload"></span>
        </span>
        </label>
    </div>
    <div class="img-container" style="max-width:80%; margin:auto;">
        <img id="image" src="{{ asset('images/hero_2.jpg') }}" style="max-width:100%;" class="cropper-hidden">
    </div>
    <div style="padding:50px;"></div>
    <form action="{{ route('admin.carousel.guardar') }}" id="myForm" method="POST">
        @csrf
    </form>
    @section('js')
        <script src="{{ asset('CustomFileInputs/js/custom-file-input.js') }}"></script>
        <script src="{{ asset('modals/js/jquery.confirmModal.min.js') }}"></script>
        <script src="{{ asset('SmartPhoto-master/js/smartphoto.min.js') }}"></script>
        <script src="{{ asset('cropper/dist/cropper.js') }}"></script>
        <script src="{{ asset('cropper/dist/jquery-cropper.min.js') }}"></script>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        <script>
            var $image = $('#image');

            $image.cropper({
                aspectRatio: 16 / 9,
            
            });
            // Get the Cropper.js instance after initialized
            var cropper = $image.data('cropper');
            $('#save').on('click', function(event){
                cropper = $('#image').data('cropper');
                cropper.getCroppedCanvas({
                    width: 1200,
                    height: 700,
                    fillColor: '#fff',
                    imageSmoothingEnabled: false,
                    imageSmoothingQuality: 'high',
                }).toBlob((blob) => {
                const formData = new FormData();

                // Pass the image file name as the third parameter if necessary.
                formData.append('image', blob, 'example.png' );
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
                    url: "{{ url('admin/carousel/guardar') }}",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    
                    success(response) {
                        $('#mds-alert').fadeIn();
                        console.log('Upload success');
                        setTimeout(function(){
                            window.location.replace("{{ route('admin.carousel.inicio',['success','Imágen subida con exito']) }}");
                        },3000);
                    },
                    error(error) {
                        $('#mds-alert-danger').fadeIn();
                        $('#mds-alert-danger').fadeOut(3000);
                        console.log('Upload error');
                    },
                });
                }/*, 'image/png' */);
            });
            var URL = window.URL || window.webkitURL;
            var originalImageURL = $image.attr('src');
            var uploadedImageName = 'cropped.jpg';
            var uploadedImageType = 'image/jpeg';
            var uploadedImageURL;
            var $inputImage = $('#inputImage');

            if (URL) {
                $inputImage.change(function () {
                    var files = this.files;
                    var file;

                    if (!$image.data('cropper')) {
                        return;
                    }

                    if (files && files.length) {
                        file = files[0];

                        if (/^image\/\w+$/.test(file.type)) {
                        uploadedImageName = file.name;
                        uploadedImageType = file.type;

                        if (uploadedImageURL) {
                            URL.revokeObjectURL(uploadedImageURL);
                        }

                        uploadedImageURL = URL.createObjectURL(file);
                        $image.cropper('destroy').attr('src', uploadedImageURL).cropper({ aspectRatio: 16 / 9});
                        $inputImage.val('');
                        } else {
                        window.alert('Please choose an image file.');
                        }
                    }
                });
            }
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