<div class="medical-team">
    <div class="container">
        <div class="row">
            <div class="col-12">
              <div class="doctor_text">
                <h2>{{__("words.medical_team")}}</h2>
                <section class="sp_section">
                    <div class="swiper mySwiper container">
                      <div class="swiper-wrapper content">


                    @foreach ($doctors as $doctor)
                        <div class="swiper-slide card">
                            <div class="card-content">
                              <div class="image">
                                <img src="{{asset("storage/uploads/doctors/$doctor->photo")}}" alt="">
                              </div>

                              <div class="media-icons">
                                <i class="fab fa-facebook"></i>
                                <i class="fab fa-twitter"></i>
                                <i class="fab fa-github"></i>
                              </div>

                              <div class="name-profession">
                                <span class="name">{{$doctor->name}}</span>
                                <span class="profession">
                                    @foreach ($departments as $department )
                                    @if ($department->id == $doctor->department_id)
                                        @if (isset($department->languages[0]->name))
                                           {{$department->languages[0]->name}}
                                        @endif
                                    @endif
                                    @endforeach
                                </span>
                              </div>

                              <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                {{-- <i class="fas fa-star"></i> --}}
                                <i class="fa-regular fa-star-half-stroke"></i>
                                {{-- <i class="fa-regular fa-star"></i> --}}
                                <i class="fa-regular fa-star"></i>
                            </div>

                              <div class="button_card">
                                <button class="aboutMe">About Me</button>
                                <button class="hireMe">Hire Me</button>
                              </div>
                            </div>
                          </div>
                    @endforeach
                      </div>
                    </div>

                    <div class="swiper-button-next"></div>
                      <div class="swiper-button-prev"></div>
                      <div class="swiper-pagination"></div>
                </section>
              </div>
            </div>
                {{-- @foreach ($doctors as $doctor )
                <div class="col-12 col-md-6 col-lg-3 doctor_info">
                    <div class="medical-team-wrap">
                        <img src="{{asset("storage/uploads/doctors/$doctor->photo")}}" alt="">
                        <h4>{{$doctor->name}}</h4>
                        <h5>

                            @foreach ($departments as $department )
                            @if ($department->id == $doctor->department_id)
                                @if (isset($department->languages[0]->name))
                                   {{$department->languages[0]->name}}
                                @endif
                            @endif
                            @endforeach
                        </h5>
                    </div>
                </div>
                @endforeach --}}



        </div>
    </div>
</div>
<script>
        var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
</script>
