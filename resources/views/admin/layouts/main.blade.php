<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noimageindex, nofollow, nosnippet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>E-Prastiwi Admin</title>

    <link rel="apple-touch-icon" href="{{ asset('/images/icon/logo.svg') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/images/icon/logo.svg') }}">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('cameleon') }}/css/custom.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('cameleon') }}/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('cameleon') }}/css/app-lite.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('cameleon') }}/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('cameleon') }}/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsoneditor/9.5.3/jsoneditor.min.css" integrity="sha512-6taMimKclNdSk4Dk2/3cLBkloUNKuubiBopGf9nd0SvdgUPigJQ+3plnWc2SOcv3ResTux1Ju6eGdcpec75WLg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    @yield('header')

    @yield('sidebar')

    @yield('content')

    @yield('footer')

    <script src="{{ asset('cameleon') }}/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="{{ asset('cameleon') }}/js/core/app-menu-lite.js" type="text/javascript"></script>
    <script src="{{ asset('cameleon') }}/js/core/app-lite.js" type="text/javascript"></script>
    <script src="{{ asset('cameleon') }}/vendors/js/editors/tinymce/tinymce.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsoneditor/9.5.3/jsoneditor.min.js" integrity="sha512-QAOXn2qwUfMyfzPadaJjIJs1+vrv8fXsRX7OExiD9D5hoEY6O+FfjHILqp3nt4lK6vOLoNmQbSbBjSz1ngVaLg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>

@yield('script')

<script>
    tinymce.init({
        selector: 'textarea',
        menubar: false,
        plugins: 'lists image',
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | image | removeFormat',
        convert_urls: false,
        images_upload_handler: function(blobInfo, success, failure) {
            var xhr, formData;
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', "{{ route('api.tinymce') }}");
            xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
            xhr.onload = function() {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                success(json.location);
            };
            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
        }
    });
</script>
