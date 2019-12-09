@extends('layouts.front.app')
@extends('adminlte::login') @section('title', 'Inicio Sesíon') @section('content')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Model</title>
    <!-- Fonts -->
    <style>
        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 64px;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <a href=""><img src="{{asset('/img/engranaje.png')}}" alt="First slide"></a>
                    <div class="title m-b-md">
                            AQUÍ Proximamente podrás realizar inicio de sesión
                    </div>
                </div>
            </div>


        </div>
    </div>
</body>

</html>@endsection