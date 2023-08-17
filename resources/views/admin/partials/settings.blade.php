@extends('admin.index')
@section('content')

    <main>
        <div class="header">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li><a href="#">
                            Analytics
                        </a></li>
                    /
                    <li><a href="#" class="active">Shop</a></li>
                </ul>
            </div>
        </div>
        <div class="buttons">
        </div>

        <div class="bottom-data">
            <div class="orders">
                <h1 class="d-flex justify-content-center ">Aktiv Olmayan Sliderler</h1>
                <hr color="white">
                {{-- <h1 class="d-flex justify-content-center text-size-20 ">Dillərə görə sliderler</h1> --}}
                <div class="con">
                    @foreach (languages() as $key => $lang)
                        <a href="?lang={{ $lang->lang }}"
                            class="text-white btn btn-success mt-2 mx-2">{{ $lang->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="bottom-data">
            <div class="orders">

            </div>
        </div>
        <div class="div"></div>
    </main>
@endsection



