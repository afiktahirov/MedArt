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
    {{-- Add Banner Language --}}
    <div class="modal fade" id="addBannerLanguage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="width:700px;height:650px">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Yeni Slider</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sliderLang') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="slider_id">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Dili</label>
                            <select name="lang" id="" class="form-control">
                                @foreach (languages() as $lang)
                                    <option value="{{ $lang->lang }}">{{ $lang->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Başlıq:</label>
                            {{-- <input type="text" class="form-control" name="title" id="recipient-name"> --}}
                            <textarea name="editor_content" id="editor" cols="40" rows="10"></textarea>
                            {{-- <input type="text" name="editor_content" id="editor"> --}}

                        </div>
                        {{-- <div class="mb-3">
                            <label for="message-text" class="col-form-label">Məlumat:</label>
                            <textarea class="form-control" id="message-text" name="text"></textarea>
                        </div> --}}
                        <!-- Fotoraf Yükleme Alanı -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bağla</button>
                            <button type="submit" class="btn btn-primary">Gönder</button>
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
                        <button type="submit" class="btn bg-gradient-danger">Bəli, aktiv edilsin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
            <button class="btn btn-primary mt-2 mx-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Yeni
                Banner</button>
            <button class="btn btn-primary mt-2 mx-2" data-bs-toggle="modal" data-bs-target="#lang_modal">Yeni
                Dil</button>
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
                <h1 class="d-flex justify-content-center">Aktiv Dillər</h1>
                <table class="table table-dark table-striped rounded">
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
        <div class="bottom-data">
            <div class="orders">
                <h1 class="d-flex justify-content-center ">Dilə görə filtrələ</h1>
                <hr color="white">
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
                <h1 class="d-flex justify-content-center ">Aktiv Bannerlər</h1>
                <hr color="white">

                <hr color="white">
                @foreach ($slidersActive as $slider)
                    @php
                        if (count($slider->languages)) {
                            $title = $slider->languages[0]->title;
                            $text = $slider->languages[0]->text;
                        } else {
                            $title = 'Tərcümə Tapılmadı';
                            $text = 'Tərcümə Tapılmadı.';
                        }
                    @endphp
                    <div class="slider_container">
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
                                <button class="btn btn-warning mt-1  ">Redakte et</button>
                                <button class="btn btn-warning mt-1 add-language-button"
                                    data-bs-target="#addBannerLanguage" data-bs-toggle="modal"
                                    data-sliderid="{{ $slider->id }}">Dil əlavə et</button>
                                <button class="btn btn-info deactivateButton   mt-1 " data-bs-target="#deactivateBanner"
                                data-sliderid="{{ $slider->id }}">Deaktiv Et</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="bottom-data">
            <div class="orders">
                <h1 class="d-flex justify-content-center ">Aktiv Şöbələr</h1>
                <hr color="white">
                <div class="departmen_dashboard_colmn">
                    <div class="our-departments-cont">
                        <header class="entry-header d-flex flex-wrap align-items-center">
                            <img src="images/cardiogram.png" alt="">
                            <h3>Cardioology</h3>
                        </header>
                        <div class="entry-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada
                                lorem maximus mauris.</p>
                        </div>
                        <footer class="entry-footer">
                            <a href="#">Читать далее</a>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection




<script>
    document.addEventListener("DOMContentLoaded", function() {
        var addLanguageModal = new bootstrap.Modal(document.getElementById("addBannerLanguage"));

        var languageButtons = document.querySelectorAll(".add-language-button");

        let deactivateBannerButton = document.querySelectorAll(".deactivateButton");
        let deactivateBannerModal = new bootstrap.Modal(document.getElementById("bannerDisableModal"));
        deactivateBannerButton.forEach(function(button) {
            button.addEventListener("click", function() {
                let sliderId = button.getAttribute("data-sliderid");
                let sliderIdInput = document.querySelector(
                    "#bannerDisableModal input[name='slider_id']");
                sliderIdInput.value = sliderId;

                deactivateBannerModal.show();
            });
        });

        languageButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                var sliderId = button.getAttribute("data-sliderid");
                var sliderIdInput = document.querySelector(
                    "#addBannerLanguage input[name='slider_id']");
                sliderIdInput.value = sliderId;

                addLanguageModal.show();
            });
        });

        let deleteSliderButtons = document.querySelectorAll("#deleteSlider");

        deleteSliderButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                let sliderId = button.getAttribute("data-id");
                let sliderIdInput = document.querySelector(
                    " #deleteSliderModal input[name='id']");
                sliderIdInput.value = sliderId;
            })
        })
    });


    document.addEventListener("DOMContentLoaded", function() {
        var alertDiv = document.getElementById("myAlert");

        if (alertDiv) {
            var alertLink = alertDiv.querySelector(".close_alert");

            if (alertLink) {
                alertLink.addEventListener("click", function(event) {
                    event.preventDefault();
                    window.location.reload();
                });
            }

            setTimeout(function() {
                alertDiv.style.display = "none";
            }, 1000);


        }
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });


    });
</script>
