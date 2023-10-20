<div class="the-news">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>{{__("words.the_news")}}</h2>
                <div class="row">
                    @foreach ($news as $n )

                    @php
                   if (!count($n->languages)) {
                      $name = '';
                      $info = '';
                   } else {
                      $name = $n->languages[0]->name;
                      $info = $n->languages[0]->info;
                   }
                   @endphp


                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="the-news-wrap">
                            <figure class="post-thumbnail">
                                <a href="#"><img src="{{asset("storage/uploads/news/$n->image")}}" alt=""></a>
                            </figure>
                            <header class="entry-header">
                                <h3>{{$name}}</h3>
                                <div class="post-metas d-flex flex-wrap align-items-center">
                                    <div class="posted-date"><label>Date: </label><a href="#">April 12,
                                            2018</a></div>
                                    <div class="posted-by"><label>By: </label><a href="#">Dr. Jake
                                            Williams</a></div>
                                    <div class="post-comments"><a href="#">2 Comments</a></div>
                                </div>
                            </header>
                            <div class="entry-content">
                                <p>{{$info}} </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
