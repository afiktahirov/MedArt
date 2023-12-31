{{-- <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="our-departments-wrap">
                <h2>Our Departments</h2>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="our-departments-cont">
                            <header class="entry-header d-flex flex-wrap align-items-center">
                                <img src="images/cardiogram.png" alt="">
                                <h3>Cardioology</h3>
                            </header>
                            <div class="entry-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem
                                    maximus mauris.</p>
                            </div>
                            <footer class="entry-footer">
                                <a href="#">read more</a>
                            </footer>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="our-departments-cont">
                            <header class="entry-header d-flex flex-wrap align-items-center">
                                <img src="images/stomach-2.png" alt="">
                                <h3>Gastroenterology</h3>
                            </header>
                            <div class="entry-content">
                                <p>Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac
                                    ligula sapien.</p>
                            </div>
                            <footer class="entry-footer">
                                <a href="#">read more</a>
                            </footer>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="our-departments-cont">
                            <header class="entry-header d-flex flex-wrap align-items-center">
                                <img src="images/blood-sample-2.png" alt="">
                                <h3>Medical Lab</h3>
                            </header>
                            <div class="entry-content">
                                <p>Lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien.
                                    Suspendisse cursus.</p>
                            </div>
                            <footer class="entry-footer">
                                <a href="#">read more</a>
                            </footer>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="our-departments-cont">
                            <header class="entry-header d-flex flex-wrap align-items-center">
                                <img src="images/teeth.png" alt="">
                                <h3>Dental Care</h3>
                            </header>
                            <div class="entry-content">
                                <p>Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac
                                    ligula sapien.</p>
                            </div>
                            <footer class="entry-footer">
                                <a href="#">read more</a>
                            </footer>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="our-departments-cont">
                            <header class="entry-header d-flex flex-wrap align-items-center">
                                <img src="images/stretcher.png" alt="">
                                <h3>Surgery</h3>
                            </header>
                            <div class="entry-content">
                                <p>Lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien.
                                    Suspendisse cursus.</p>
                            </div>
                            <footer class="entry-footer">
                                <a href="#">read more</a>
                            </footer>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="our-departments-cont">
                            <header class="entry-header d-flex flex-wrap align-items-center">
                                <img src="images/scanner.png" alt="">
                                <h3>Neurology</h3>
                            </header>
                            <div class="entry-content">
                                <p>Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac
                                    ligula sapien.</p>
                            </div>
                            <footer class="entry-footer">
                                <a href="#">read more</a>
                            </footer>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-md-0">
                        <div class="our-departments-cont">
                            <header class="entry-header d-flex flex-wrap align-items-center">
                                <img src="images/bones.png" alt="">
                                <h3>Orthopaedy</h3>
                            </header>
                            <div class="entry-content">
                                <p>Lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien.
                                    Suspendisse cursus.</p>
                            </div>
                            <footer class="entry-footer">
                                <a href="#">read more</a>
                            </footer>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-lg-0">
                        <div class="our-departments-cont">
                            <header class="entry-header d-flex flex-wrap align-items-center">
                                <img src="images/blood-donation-2.png" alt="">
                                <h3>Pediatry</h3>
                            </header>
                            <div class="entry-content">
                                <p>Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac
                                    ligula sapien.</p>
                            </div>
                            <footer class="entry-footer">
                                <a href="#">read more</a>
                            </footer>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-0">
                        <div class="our-departments-cont">
                            <header class="entry-header d-flex flex-wrap align-items-center">
                                <img src="images/glasses.png" alt="">
                                <h3>Ophthalmology</h3>
                            </header>
                            <div class="entry-content">
                                <p>Lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien.
                                    Suspendisse cursus.</p>
                            </div>
                            <footer class="entry-footer">
                                <a href="#">read more</a>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

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
