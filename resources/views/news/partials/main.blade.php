<div class="container">
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="the-news">
                <div class="row">
                    @foreach ($news as $new )
                    <div class="col-12 col-md-6">
                        <div class="the-news-wrap">
                            <figure class="post-thumbnail">
                                <a href="#"><img src="{{asset("storage/uploads/news/$new->image")}}" alt=""></a>
                            </figure>
                            <header class="entry-header">
                                <h3>{{$new->languages[0]->name}}</h3>
                                <div class="post-metas d-flex flex-wrap align-items-center">
                                    <div class="posted-by"><label>By: </label><a href="#">{{$new->author}}</a>
                                    </div>
                                </div>
                            </header>
                            <div class="entry-content">
                                <p>{{$new->languages[0]->info}}</p>
                            </div>
                            <footer class="entry-footer mt-5">
                                <a class="button gradient-bg" href="#">{{__("words.read_more")}}</a>
                            </footer>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="sidebar">
                <div class="search-widget">
                    <form class="flex flex-wrap align-items-center">
                        <input type="search" placeholder="{{__('words.search')}}">
                        <button type="submit" class="flex justify-content-center align-items-center">{{__("words.search")}}</button>
                    </form>
                </div>
                {{-- <div class="sidebar-cats">
                    <h2 class="widget-title">Categories</h2>
                    <ul class="p-0 m-0">
                        <li><a href="#">Radiology</a></li>
                        <li><a href="#">Cardiology</a></li>
                        <li><a href="#">Gastroenterology</a></li>
                        <li><a href="#">Neurology</a></li>
                        <li><a href="#">General surgery</a></li>
                    </ul>
                </div> --}}
                {{-- <div class="popular-posts">
                    <h2 class="widget-title">Latest Posts</h2>
                    <ul class="p-0 m-0">
                        <li class="d-flex flex-wrap justify-content-between">
                            <figure><a href="#"><img src="images/p-1.jpg" alt=""></a></figure>
                            <div class="entry-content">
                                <h3 class="entry-title"><a href="#">A big discovery for medicine worldwide</a>
                                </h3>
                                <div class="posted-date">Feb 05, 2018</div>
                            </div>
                        </li>
                        <li class="d-flex flex-wrap justify-content-between">
                            <figure><a href="#"><img src="images/p-2.jpg" alt=""></a></figure>
                            <div class="entry-content">
                                <h3 class="entry-title"><a href="#">Dentistry for everybody under 18</a></h3>
                                <div class="posted-date">Feb 05, 2018</div>
                            </div>
                        </li>
                        <li class="d-flex flex-wrap justify-content-between">
                            <figure><a href="#"><img src="images/p-3.jpg" alt=""></a></figure>
                            <div class="entry-content">
                                <h3 class="entry-title"><a href="#">When it’s time to take pills</a></h3>
                                <div class="posted-date">Feb 05, 2018</div>
                            </div>
                        </li>
                    </ul>
                </div> --}}
                <div class="opening-hours">
                    <h2 class="d-flex align-items-center">{{__("words.Opening_Hours")}}</h2>
                    <ul class="p-0 m-0">
                        <li>{{ __('words.monday') }} <span>8.00 - 19.00</span></li>
                        <li>{{ __('words.thursday') }} <span>8.00 - 19.00</span></li>
                        <li>{{ __('words.friday') }} <span>8.00 - 18.30</span></li>
                        <li>{{ __('words.saturday') }} <span>9.30 - 17.00</span></li>
                        <li>{{ __('words.sunday') }} <span>9.30 - 15.00</span></li>
                    </ul>
                </div>
                <div class="emergency-box">
                    <h2 class="d-flex align-items-center">{{__("words.Emergency")}}</h2>
                    <div class="call-btn text-center">
                        <a class="d-flex justify-content-center align-items-center button gradient-bg"
                            href="#"><img src="{{asset("images/emergency-call.png")}}"> +994703883238</a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, cons ectetur adipiscing elit. Donec males uada lorem maximus mauris
                        sceler isque, at rutrum nulla.</p>
                </div>
            </div>
        </div>
    </div>
</div>
