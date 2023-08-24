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
    {{-- Add Banner Language --}}
    <div class="modal fade" id="addBannerLanguage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Yeni Slider</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sliderLang') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="slider_id">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Başlıq:</label>
                            <input type="text" class="form-control" name="title" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Dili</label>
                            <select name="lang" id="" class="form-control">
                                @foreach (languages() as $lang)
                                    <option value="{{ $lang->lang }}">{{ $lang->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Məlumat:</label>
                            <textarea class="form-control" id="message-text" name="text"></textarea>
                        </div>
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
    <div class="modal fade" id="bannerActivateModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content text-center">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title font-weight-normal" id="deleteModalLabel">Əminsinizmi ?</h5>
                </div>
                <div class="modal-body">
                    <strong class="text-danger">
                        <span id="delete__item__name"></span> Banner aktiv edilsin?
                        !</strong>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn bg-secondary text-white" data-bs-dismiss="modal">Bağla</button>
                    <form action="{{route("admin.dsilder.active")}}" method="POST" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="slider_id">
                        <button type="submit" class="btn bg-gradient-danger">Bəli, aktiv edilsin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <main>

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
                <hr color="white">
                @foreach ($slidersDeactive as $slider)
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
                                                <h1>{{ $title }}</h1>
                                            </header>
                                            <div class="entry-content mt-4">
                                                <p>{{ $text }}</p>
                                            </div>
                                            <footer class="entry-footer d-flex flex-wrap align-items-center mt-4">
                                                <a href="#" class="button gradient-bg">Read More</a>
                                            </footer>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons_ d-flex justify-content-center gap-3">
                                <button class="btn btn-danger  mt-1  ">Sil</button>
                                <button class="btn btn-warning mt-1  ">Redakte et</button>
                                <button class="btn btn-warning mt-1 add-language-button" data-bs-target="#addBannerLanguage"
                                    data-bs-toggle="modal" data-sliderid="{{ $slider->id }}">Dil əlavə et</button>
                                <button class="btn btn-info activateButton   mt-1 " data-bs-target="#activateBanner"
                                    data-bs-toggle="modal" data-sliderid="{{ $slider->id }}">Aktiv et</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="div"></div>
    </main>
@endsection


<script>
    document.addEventListener("DOMContentLoaded", function() {
        let addLanguageModal = new bootstrap.Modal(document.getElementById("addBannerLanguage"));
        let languageButtons = document.querySelectorAll(".add-language-button");

        let activateBannerButton = document.querySelectorAll(".activateButton");
        let activateBannerModal = new bootstrap.Modal(document.getElementById("bannerActivateModal"));

        languageButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                var sliderId = button.getAttribute("data-sliderid");
                var sliderIdInput = document.querySelector(
                    "#addBannerLanguage input[name='slider_id']");
                sliderIdInput.value = sliderId;

                addLanguageModal.show();
            });
        });

        activateBannerButton.forEach(function(button){
            button.addEventListener("click",function() {
                let sliderId = button.getAttribute("data-sliderid");
                let sliderIdInput = document.querySelector(
                    "#bannerActivateModal input[name='slider_id']");
                sliderIdInput.value = sliderId;

                activateBannerModal.show();
            });
        });
        // $("[data-bs-target='#activateBanner']").click(function() {
        //     $("#delete__item__name").text(
        //         $(this).closest("tr").find("td:first").text()
        //     );
        //     $("#delete__item__id").val($(this).data().id);
        // });
    });
</script>
