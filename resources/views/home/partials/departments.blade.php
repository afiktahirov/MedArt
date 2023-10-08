{{-- @dd($departments) --}}
<div class="our-departments">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="our-departments-wrap">
                    <h2>{{__("words.our_departments")}}</h2>
                    <div class="row">
                        @foreach ($departments as $department )

                        @php
                        if (!count($department->languages)){
                            $name = "";
                            $info = "";
                        }else{
                            $name = $department->languages[0]->name;
                            $info = $department->languages[0]->info;
                        }
                        @endphp

                         <div class="col-12 col-md-6 col-lg-4 ">
                             <div class="our-departments-cont border rounded p-3 d-flex flex-column" style="width: 300px; height: 300px;">
                                 <header class="entry-header d-flex flex-wrap align-items-center">
                                     <img src="{{asset("storage/uploads/depart_icon/$department->icon")}}" alt="">
                                     <h3>{{$name}}</h3>
                                 </header>
                                 <div class="entry-content flex-grow-1">
                                     <p>{{$info}}</p>
                                 </div>
                                 <footer class="entry-footer">
                                     <a href="#" class="btn btn-primary">{{__("words.read_more")}}</a>
                                 </footer>
                             </div>
                         </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
