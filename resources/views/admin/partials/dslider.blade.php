@extends('admin.index')
@section('content')
    {{-- Banner Modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Yeni Slider</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('slider.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Başlıq:</label>
                            <input type="text" class="form-control" name="title" id="recipient-name">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Məlumat:</label>
                            <textarea class="form-control" id="message-text" name="text"></textarea>
                            @error('text')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Fotoraf Yükleme Alanı -->
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
    {{-- Add Banner text Modal --}}
    <div class="modal fade" id="addBannerLanguage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <textarea name="editor_content" id="editor_add" cols="40" rows="10"></textarea>
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
                            <textarea name="editor_content" id="editor_edit" cols="40" rows="10"></textarea>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Yeni Slider</h1>
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
    {{-- Banner Active Modal --}}
    <div class="modal fade" id="bannerActivateModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content text-center">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title font-weight-normal" id="deleteModalLabel">Əminsinizmi ?</h5>
                </div>
                <div class="modal-body">
                    <strong class="text-danger">
                        Banner aktiv edilsin?
                    </strong>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn bg-secondary text-white" data-bs-dismiss="modal">Bağla</button>
                    <form action="{{ route('admin.dsilder.active') }}" method="POST" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="slider_id">
                        <button type="submit" class="btn bg-gradient-danger">Bəli, aktiv edilsin</button>
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
    <main>
        <div class="header">
            <div class="left">
                <h1>Banner İdarə Paneli</h1>
                <ul class="breadcrumb">
                    <li><a href="#">
                            Admin
                        </a></li>
                    /
                    <li><a href="#" class="active">Banner İdarə Paneli</a></li>
                </ul>
            </div>
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
        {{-- Filter Languages bottom-data end --}}
        <div class="bottom-data">
            <div class="orders">
                <div class="d-flex justify-content-start">
                    <i class='bx bx-info-circle'></i>
                    <p class="mx-3 font-weight-bold font-italic">Aktiv olmayan bannerlər</p>
                </div>
                <hr color="{{ Cache::get('darkMode') ? 'white' : 'black' }}">
                @php
                    $info = '<p class="mx-3 font-weight-bold font-italic" style="color:#e91e63">Hal hazırda aktiv olmayan banner yoxdur!</p>';
                    if (!count($slidersDeactive)) {
                       echo $info;
                    }
                @endphp
                @foreach ($slidersDeactive as $index=>$slider)
                    @php
                        if (count($slider->languages)) {
                            $title = $slider->languages[0]->title;
                            $text = $slider->languages[0]->text;
                        } else {
                            $title = 'Tərcümə Tapılmadı';
                            $text = 'Tərcümə Tapılmadı.';
                        }
                    @endphp
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
                                <button class="btn btn-info activateButton   mt-1 " data-bs-target="#activateBanner"
                                    data-sliderid="{{ $slider->id }}">Aktiv et</button>
                            </div>
                        </div>
                    </div>
                @endforeach
                <hr color="{{ Cache::get('darkMode') ? 'white' : 'black' }}">
                <div class="page-button"></div>
            </div>
        </div>
    </main>
@endsection


