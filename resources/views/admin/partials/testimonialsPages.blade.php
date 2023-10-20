@extends('admin.index')
@section('content')


{{-- Testimonial Delete Modal --}}
<div class="modal fade" id="deleteTestimonialModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content text-center">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title font-weight-normal" id="deleteModalLabel">Əminsinizmi ?</h5>
                </div>
                <div class="modal-body">
                    <strong class="text-danger">
                        Rəy silinəcək və geri alına bilməz
                        !</strong>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn bg-secondary text-white" data-bs-dismiss="modal">Bağla</button>
                    <form action="{{ route('testimonial.destroy') }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" id="delete__item__id" value="">
                        <button type="submit" class="btn bg-gradient-danger">Bəli, silinsin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

{{-- Testimonail Add Modal --}}
<div class="modal fade" id="addNewComment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Yeni Rəy</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route("testimonial.add")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="col-form-label">İstifadəçi adı:</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Rəy</label>
                        <textarea class="form-control" name="user_comment" id="user_comment" cols="30" rows="10"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">İstifadəçi şəkli yüklə:</label>
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
{{-- News Add Modal --}}
<div class="modal fade" id="addNewsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Yeni Xəbər</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('news.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="col-form-label">Xəbərin şəkli:</label>
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
{{-- News AddText Modal --}}
<div class="modal fade" id="addTextNewsModal" tabindex="-1" aria-labelledby="exampleModalLabelText"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Yeni xəbər yazısı</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('news.addText') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="news_id">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Dil</label>
                            <select name="lang" id="newsLang" class="form-control">
                                <option value="" name="lang"></option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Xəbərin Başlığı:</label>
                            <input type="text" class="form-control" name="news_name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Xəbər haqqında məlumat:</label>
                            <textarea name="news_info" class="form-control" cols="30" rows="10"></textarea>
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
{{-- News Delete Modal --}}
<div class="modal fade" id="deleteNewsModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content text-center">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title font-weight-normal" id="deleteModalLabel">Əminsinizmi ?</h5>
                </div>
                <div class="modal-body">
                    <strong class="text-danger">
                        Yenilik silinəcək və geri alına bilməz
                        !</strong>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn bg-secondary text-white" data-bs-dismiss="modal">Bağla</button>
                    <form action="{{ route('news.destroy') }}" method="POST" class="d-inline-block">
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
                <h1>Yenilik / Rəy İdarə Paneli</h1>
                <ul class="breadcrumb">
                    <li><a href="#">
                            Ana Səhifə
                        </a></li>
                    /
                    <li><a href="#" class="active">Yenilik/Rəy Paneli</a></li>
                </ul>
            </div>
        </div>
        <div class="buttons">
            <button class="btn btn-primary mt-2 mx-2" data-bs-toggle="modal" data-bs-target="#addNewsModal">Yenilik
            əlavə et</button>
            <button class="btn btn-primary mt-2 mx-2" data-bs-toggle="modal" data-bs-target="#addNewComment">Yeni
                Rəy</button>
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

        {{-- Testimonials bottom-data --}}
        <div class="bottom-data">
            <div class="orders">
                <div class="d-flex justify-content-start">
                    <i class='bx bx-info-circle'></i>
                    <p class="mx-3 font-weight-bold font-italic">Əlavə olunan rəylər</p>
                </div>
                <hr color="{{ Cache::get('darkMode') ? 'white' : 'black' }}">
                <table class="{{ Cache::get('darkMode') ? 'table-dark' : 'table-success' }} table-striped rounded">
                    @if (count($testimonials))
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Şəkli</th>
                            <th scope="col">Ad,Soyad</th>
                            <th scope="col">Rəy</th>
                            <th scope="col">Əməliyyatlar</th>
                        </tr>
                    </thead>
                    @endif
                    <tbody>
                        @php
                        $info = '<p class="mx-3 font-weight-bold font-italic" style="color:#e91e63">Hal hazırda web saytda heç bir istifadəçi rəyi  yoxdur</p>';
                        if (!count($testimonials)) {
                           echo $info;
                        }
                        @endphp
                       @foreach ($testimonials as $key=>$testimonial )
                          <tr>
                            <th scope="col">{{$key +1}}</th>
                            <td><img src="{{asset("storage/uploads/testimonials/$testimonial->user_image")}}" alt=""></td>
                            <td style="max-width:100px; min-width:50px">
                                <p>{{$testimonial->user_name}}</p>
                            </td>
                            <td style="max-width: 900px; min-width:800px" >
                                <p class="text-truncate">{{$testimonial->user_comment}}</p>
                            </td>
                            <td>
                                <button class="btn btn-warning">Redakte et</button>
                                <button class="btn btn-danger" id="deleteTestimonial" data-testimonialId={{$testimonial->id}} data-bs-toggle="modal" data-bs-target="#deleteTestimonialModal">Sil</button>
                            </td>
                          </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Testimonials bottom-data end--}}

        {{-- News bottom-data  --}}
        <div class="bottom-data">
            <div class="orders">
                <div class="d-flex justify-content-start">
                    <i class='bx bx-info-circle'></i>
                    <p class="mx-3 font-weight-bold font-italic">Əlavə olunan xəbərlər</p>
                </div>
                <hr color="{{ Cache::get('darkMode') ? 'white' : 'black' }}">
                <table class="{{ Cache::get('darkMode') ? 'table-dark' : 'table-success' }} table-striped rounded">
                    @if (count($news))
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Şəkli</th>
                            <th>Başlığı</th>
                            <th>Məlumatı</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                    </thead>
                    @endif
                <tbody>
                    @php
                    $info = '<p class="mx-3 font-weight-bold font-italic" style="color:#e91e63">Hal hazırda web saytda heç bir xəbər yoxdur</p>';
                    if (!count($news)) {
                       echo $info;
                    }
                    @endphp
                    @foreach ($news as $key=>$n)
                    @php
                    if (count($n->languages)) {
                        $name = $n->languages[0]->name;
                        $info = $n->languages[0]->info;
                    } else {
                        $name = 'Tərcümə Tapılmadı';
                        $info = 'Tərcümə Tapılmadı.';
                    }
                @endphp
                    <tr>
                        <th>{{$key+1}}</th>
                        <td>
                            <div class="w-100 h-100">
                                <img src="{{asset("storage/uploads/news/$n->image")}}" alt="">
                            </div>
                        </td>
                        <td>
                            <p>{{$name}}</p>
                            </td>
                        <td style="max-width: 900px; min-width:900px" >
                            <p class="text-truncate">{{$info}}</p>
                        </td>
                        <td>
                            <button class="btn btn-warning"
                            @php
                                if(!count($n->languages)){
                                    echo 'style="pointer-events: none; opacity: 0.5;"';
                                 } @endphp
                            >Düzəliş et</button>
                            <button class="btn btn-success"  id="news_text" data-bs-toggle="modal"
                            data-bs-target="#addTextNewsModal" data-newsId={{$n->id}}
                            @php
                                if(isset($n->languages[0])){
                                   echo 'style="pointer-events: none; opacity: 0.5;"';
                                } @endphp
                            >
                            Yazı əlvə et
                            </button>
                            <button class="btn btn-danger" id="deleteNews" data-newsId={{$n->id}} data-bs-toggle="modal" data-bs-target="#deleteNewsModal">Sil</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr color="{{ Cache::get('darkMode') ? 'white' : 'black' }}">
            </div>
        </div>
        {{-- News bottom-data end  --}}
    </main>
@endsection



