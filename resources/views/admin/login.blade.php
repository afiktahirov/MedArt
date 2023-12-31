<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{ asset('/assets/control/images/logo-ct.png') }}">
    <title> Medart Admin | Login </title>
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="{{ asset('assets/control/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/control/css/nucleo-svg.css') }}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="{{ asset('assets/control/css/material-dashboard.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/control/css/style.css') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-200">
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Daxil ol</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form role="form" method="POST" action="" class="text-start">
                                    @csrf
                                    <div class="input-group input-group-outline my-3">
                                        <input type="email" value="{{ old('email') }}" name="email"
                                            placeholder="Email" class="form-control">
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <input type="password" name="password" placeholder="Şifrə" class="form-control">
                                    </div>
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger  text-white mb-1 p-2" role="alert">
                                                <strong>{{ $error }}</strong>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="text-center">
                                        <button type="submit" name="submit"
                                            class="btn bg-gradient-primary w-100 my-4 mb-2">Giriş</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
