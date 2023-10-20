@extends('admin.index')
@section('content')
    {{-- Banner Modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Yeni Banner</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('slider.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="col-form-label">Banner Şəkili:</label>
                            <input type="file" name="image" class="form-control" id="photo-upload" accept="image/*">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bağla</button>
                            <button type="submit" class="btn btn-primary sum">Gönder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Department Add Modal --}}
    <div class="modal fade" id="exampleModalIcon" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Yeni Şöbə</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('department.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="col-form-label">Şöbə iconu yüklə:</label>
                            <input type="file" name="image" class="form-control" id="photo-upload" accept="image/*">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bağla</button>
                            <button type="submit" class="btn btn-primary sum">Gönder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Department AddText Modal --}}
    <div class="modal fade" id="exampleModalIconText" tabindex="-1" aria-labelledby="exampleModalLabelText"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Yeni Şöbə yazısı</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('department.addText') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="department_id">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Dil</label>
                            <select name="lang" id="departmentLang" class="form-control">
                                <option value="" name="lang"></option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Şöbənin Adı:</label>
                            <input type="text" class="form-control" name="department_name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Şöbənin haqqında məlumat:</label>
                            <textarea name="department_info" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bağla</button>
                            <button type="submit" class="btn btn-primary sum">Gönder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Department Delete Modal --}}
    <div class="modal fade" id="deleteDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content text-center">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title font-weight-normal" id="deleteModalLabel">Əminsinizmi ?</h5>
                </div>
                <div class="modal-body">
                    <strong class="text-danger">
                        Şöbə silinəcək və geri alına bilməz
                        !</strong>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn bg-secondary text-white" data-bs-dismiss="modal">Bağla</button>
                    <form action="{{ route('department.destroy') }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" id="delete__item__id" value="">
                        <button type="submit" class="btn bg-gradient-danger">Bəli, silinsin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Add Banner text Modal --}}
    <div class="modal fade" id="addBannerLanguage" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="width:700px;height:650px">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Banner yazısı </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sliderLang') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="slider_id">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Yazı dili</label>
                            <select name="lang" id="" class="form-control">
                                <option id="lang" value=""></option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Yazı məzmunu:</label>
                            <div style="max-height: 340px; overflow: auto;">
                                <textarea name="editor_content" id="editor_add" cols="40" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bağla</button>
                            <button type="submit" class="btn btn-primary">Yadda Saxla</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Edit banner text Modal --}}
    <div class="modal fade" id="EditBannerText" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="width:700px;height:650px">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Banner yazısı </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('editSliderLang') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="slider_id">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Yazı dili</label>
                            <select name="lang" id="EditBannerLang" class="form-control">
                                <option value="" name="lang"></option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Yazı məzmunu:</label>
                            <div style="max-height: 340px; overflow: auto;">
                                <textarea name="editor_content" id="editor_edit" cols="40" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bağla</button>
                            <button type="submit" class="btn btn-primary">Yadda Saxla</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Add language Modal --}}
    <div class="modal fade" id="lang_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Yeni Dil</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('language.save') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Adı:</label>
                            <input type="text" class="form-control" name="name" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Başlığı:</label>
                            <input type="text" class="form-control" name="lang" id="recipient-name">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bağla</button>
                            <button type="sumbit" class="btn btn-primary">Gönder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Delete Language Modal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content text-center">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title font-weight-normal" id="deleteModalLabel">Əminsinizmi ?</h5>
                </div>
                <div class="modal-body">
                    <strong class="text-danger">
                        <span id="delete__item__name"></span> dili silinəcək və geri alına bilməz
                        !</strong>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn bg-secondary text-white" data-bs-dismiss="modal">Bağla</button>
                    <form action="{{ route('language.destroy') }}" method="POST" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="id" id="delete__item__id" value="">
                        <button type="submit" class="btn bg-gradient-danger">Bəli, silinsin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Delete Slider Modal --}}
    <div class="modal fade" id="deleteSliderModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content text-center">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title font-weight-normal" id="deleteModalLabel">Əminsinizmi ?</h5>
                </div>
                <div class="modal-body">
                    <strong class="text-danger">
                        Slider silinəcək və geri alına bilməz
                        !</strong>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn bg-secondary text-white" data-bs-dismiss="modal">Bağla</button>
                    <form action="{{ route('slider.destroy') }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" id="delete__item__id" value="">
                        <button type="submit" class="btn bg-gradient-danger">Bəli, silinsin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Banner Disable Modal --}}
    <div class="modal fade" id="bannerDisableModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content text-center">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title font-weight-normal" id="deleteModalLabel">Əminsinizmi ?</h5>
                </div>
                <div class="modal-body">
                    <strong class="text-danger">
                        Banner deaktiv edilsin?
                    </strong>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn bg-secondary text-white" data-bs-dismiss="modal">Bağla</button>
                    <form action="{{ route('admin.dsilder.deactive') }}" method="POST" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="slider_id">
                        <button type="submit" class="btn bg-gradient-danger">Bəli, deaktiv edilsin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <main>
        {{-- Main Header Navbar --}}
        <div class="header">
            <div class="left">
                <h1>Ana Səhifə İdarə Paneli</h1>
                <ul class="breadcrumb">
                    <li><a href="#">
                            Admin
                        </a></li>
                    /
                    <li><a href="#" class="active">Ana Səhifə İdarə Paneli</a></li>
                </ul>
            </div>
        </div>
        <div class="buttons">
            <button class="btn btn-primary mt-2 mx-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Yeni
                Banner</button>
            <button class="btn btn-primary mt-2 mx-2" data-bs-toggle="modal" data-bs-target="#lang_modal">Yeni
                Dil</button>
            <button class="btn btn-primary mt-2 mx-2" data-bs-toggle="modal" data-bs-target="#exampleModalIcon">Yeni
                Şöbə</button>
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
        {{-- Main Header Navbar end --}}

        {{-- Active Languages bottom-data --}}
        <div class="bottom-data">
            <div class="orders">
                <div class="d-flex justify-content-start">
                    <i class='bx bx-info-circle'></i>
                    <p class="mx-3 font-weight-bold font-italic">Aktiv olan dillər</p>
                </div>
                <hr color="{{ Cache::get('darkMode') ? 'white' : 'black' }}">
                <table class="{{ Cache::get('darkMode') ? 'table-dark' : 'table-success' }} table-striped rounded">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Dil</th>
                            <th scope="col">Kodu</th>
                            <th scope="col">Əməliyyatlar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($languages as $key => $lang)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $lang->name }}</td>
                                <td>{{ $lang->lang }}</td>
                                <td>
                                    <button type="button" data-id="{{ $lang->id }}"
                                        class="btn bg-gradient-primary px-3 py-1 mb-0" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal">
                                        Sil
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Active Languages bottom-data end --}}

        {{-- Filter Languages bottom-data --}}
        <div class="bottom-data">
            <div class="orders">
                <div class="d-flex justify-content-start">
                    <i class='bx bx-info-circle'></i>
                    <p class="mx-3 font-weight-bold font-italic">Dilə görə filtrələ</p>
                </div>
                <hr color="{{ Cache::get('darkMode') ? 'white' : 'black' }}">
                <div class="con">
                    @foreach (languages() as $key => $lang)
                        <a href="?lang={{ $lang->lang }}"
                            class="text-white btn btn-primary mt-2 mx-2">{{ $lang->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- Filter Languages bottom-data end --}}

        {{-- Active Banner bottom-data --}}
        <div class="bottom-data">
            <div class="orders">
                <div class="d-flex justify-content-start">
                    <i class='bx bx-info-circle'></i>
                    <p class="mx-3 font-weight-bold font-italic">Aktiv olan bannerlər</p>
                </div>
                <hr color="{{ Cache::get('darkMode') ? 'white' : 'black' }}">
                @foreach ($slidersActive as $index=>$slider)
                    @php
                        if (count($slider->languages)) {
                            $title = $slider->languages[0]->title;
                            $text = $slider->languages[0]->text;
                        } else {
                            $title = 'Tərcümə Tapılmadı';
                            $text = 'Tərcümə Tapılmadı.';
                        }
                    @endphp
                    <div class="page-button"></div>
                    <div class="slider_container" data-page="{{ $index + 1 }}">
                        <div class="swiper-slide hero-content-wrap s_container"
                            style="background-image: url('{{ asset("storage/uploads/sliders/$slider->image") }}')">
                            <div class="hero-content-overlay position-absolute w-100 h-100">
                                <div class="container h-100">
                                    <div class="row h-100">
                                        <div
                                            class="col-12 col-lg-6 d-flex flex-column justify-content-center align-items-start">
                                            <header class="entry-header d_header">
                                                <div class="content_dash">
                                                    {!! str_replace(['{', '}'], '', $text) !!}
                                                    <footer class="entry-footer d-flex flex-wrap align-items-center mt-4">
                                                        <a href="#"
                                                            class="button gradient-bg">{{ __('words.read_more') }}</a>
                                                    </footer>
                                                </div>
                                            </header>
                                            <div class="entry-content mt-4">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons_ d-flex justify-content-center gap-3">
                                <button class="btn btn-danger  mt-1" data-bs-toggle="modal"
                                    data-bs-target="#deleteSliderModal" id="deleteSlider"
                                    data-id="{{ $slider->id }}">Sil</button>
                                <button class="btn btn-warning mt-1 editBanner" data-bs-toggle="modal"
                                    data-bs-target="#EditBannerText" data-sliderid="{{ $slider->id }}"
                                    @php
                                     if(!count($slider->languages)){
                                        echo 'style="pointer-events: none; opacity: 0.5;"';
                                     } @endphp>Redakte
                                    et</button>
                                <button class="btn btn-warning mt-1 add-language-button"
                                    data-bs-target="#addBannerLanguage" data-bs-toggle="modal"
                                    data-sliderid="{{ $slider->id }}"
                                    @php
                                    if(isset($slider->languages[0])){
                                       echo 'style="pointer-events: none; opacity: 0.5;"';
                                    } @endphp>Yazı
                                    əlavə et</button>
                                <button class="btn btn-info deactivateButton   mt-1 " data-bs-target="#deactivateBanner"
                                    data-sliderid="{{ $slider->id }}">Deaktiv Et</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- Active Banner bottom-data end --}}

        {{-- Active Department bottom-data  --}}
        <div class="bottom-data">
            <div class="orders">
                <div class="d-flex justify-content-start">
                    <i class='bx bx-info-circle'></i>
                    <p class="mx-3 font-weight-bold font-italic">Aktiv olan şöbələr</p>
                </div>
                <hr color="{{ Cache::get('darkMode') ? 'white' : 'black' }}">
                <table class="table {{ Cache::get('darkMode') ? 'dark' : '' }} table-striped rounded">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">İcon</th>
                            <th scope="col">Adı</th>
                            <th scope="col">Məlumatı</th>
                            <th scope="col">Əməliyyatlar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $key => $department)
                            @php
                                if (count($department->languages)) {
                                    $name = $department->languages[0]->name;
                                    $info = $department->languages[0]->info;
                                } else {
                                    $name = 'Tərcümə Tapılmadı';
                                    $info = 'Tərcümə Tapılmadı.';
                                }
                            @endphp
                            <tr>
                                <th scope="row" style="width: 100px;">{{ $key + 1 }}</th>
                                <th scope="row" style="width: 200px;">
                                    <img src="{{ asset("storage/uploads/depart_icon/$department->icon") }}"
                                        alt="" width="50" height="50">
                                </th>
                                <th scope="row" style="width: 200px;">
                                    <p class="text-truncate">
                                        {{ $name }}
                                    </p>
                                </th>
                                <th scope="row" style="max-width: 900px; min-width:900px">
                                    <p class="text-truncate">
                                        {{ $info }}
                                    </p>
                                </th>
                                <th>
                                    <button class="btn btn-danger"
                                        @php
                                if(!count($department->languages)){
                                    echo 'style="pointer-events: none; opacity: 0.5;"';
                                 } @endphp>Düzəliş
                                        et</button>
                                    <button class="btn btn-warning" id="department_text" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalIconText" data-departmentId="{{ $department->id }}"
                                        @php
                                if(isset($department->languages[0])){
                                   echo 'style="pointer-events: none; opacity: 0.5;"';
                                } @endphp>Yazı
                                        əlavə et
                                    </button>
                                    <button class="btn btn-primary" id="deleteDepartment" data-bs-toggle="modal"
                                    data-bs-target="#deleteDepartmentModal" data-departmentId="{{$department->id}}">Sil</button>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        {{-- Active Department bottom-data end --}}
    </main>

    <script>
    </script>
@endsection
