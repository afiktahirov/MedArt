<div class="swiper-container hero-slider">
    <div class="swiper-wrapper">
        @foreach ($sliders as $slider)
            @php
                if (!count($slider->languages)){
                    $text = "Hələki bu dilə tərcümə edilməyib";
                    $title = "Hələki bu dilə tərcümə edilməyib";
                }else{
                    $text = $slider->languages[0]->textj;
                    $title = $slider->languages[0]->title;
                }
            @endphp
            <div class="swiper-slide hero-content-wrap"
                style="background-image: url('{{ asset("storage/uploads/sliders/$slider->image") }}')">
                <div class="hero-content-overlay position-absolute w-100 h-100">
                    <div class="container h-100">
                        <div class="row h-100">
                            <div class="col-12 col-lg-6 d-flex flex-column justify-content-center align-items-start">
                                <header class="entry-header">
                                    <h1>{{ $title }}</h1>
                                </header>
                                <div class="entry-content mt-4">
                                    <p>{{ $text }}
                                    </p>
                                </div>
                                <footer class="entry-footer d-flex flex-wrap align-items-center mt-4">
                                    <a href="#" class="button gradient-bg">{{__("words.read_more")}}</a>
                                </footer>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="pagination-wrap position-absolute w-100">
        <div class="swiper-pagination d-flex flex-row flex-md-column"></div>
    </div>
</div>
