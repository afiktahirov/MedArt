@extends('admin.index')
@section("content")


<main>
    <div class="header">
        <div class="left">
            <h1>Hospital Həkimləri</h1>
            <ul class="breadcrumb">
                <li><a href="#">
                        Ana Səhifə
                    </a></li>
                /
                <li><a href="#" class="active">Həkim İdarə Paneli</a></li>
            </ul>
        </div>
    </div>
    <div class="buttons">
        <button class="btn btn-primary mt-2 mx-2" data-bs-toggle="modal" data-bs-target="#addNewsModal">Yeni Həkim
        əlavə et</button>
    </div>
    @if (count($errors))
    <div id="myAlert" class="alert alert-warning d-flex justify-content-between" role="alert">
        <a href="#" class="alert-link">
            @foreach ($errors->all() as $error)
                <li style="color: white">{{ $error }}</li>
            @endforeach
        </a>
        <a class="close_alert" style="font-size: 20px; cursor: pointer;">X</a>
    </div>
    @endif
    @if (session('success'))
        <div id="myAlert" class="alert alert-success d-flex justify-content-between" role="alert">
            <a href="#" class="alert-link">
                <li style="color: white">{{ session('success') }}</li>
            </a>
            <a class="close_alert" style="font-size: 20px; cursor: pointer;">X</a>
        </div>
    @endif
    <div class="bottom-data">
        <div class="orders">

        </div>
    </div>
</main>





@endsection
