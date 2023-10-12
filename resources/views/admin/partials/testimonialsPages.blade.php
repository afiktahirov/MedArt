@extends('admin.index')
@section('content')


{{-- @dd($news) --}}
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

    <main>
        <div class="header">
            <div class="left">
                <h1>Yeniliklər</h1>
                <ul class="breadcrumb">
                    <li><a href="#">
                            Ana Səhifə
                        </a></li>
                    /
                    <li><a href="#" class="active">Yeniliklər</a></li>
                </ul>
            </div>
        </div>
        <div class="buttons">
            <button class="btn btn-primary mt-2 mx-2" data-bs-toggle="modal" data-bs-target="#addNewsModal">Yenilik
            əlavə et</button>
            <button class="btn btn-primary mt-2 mx-2" data-bs-toggle="modal" data-bs-target="#addNewComment">Yeni
                Rəy</button>
        <div class="bottom-data">
            <div class="orders">
                <table class="table table-dark table-striped rounded">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Şəkli</th>
                            <th scope="col">Ad,Soyad</th>
                            <th scope="col">Rəy</th>
                            <th scope="col">Əməliyyatlar</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($testimonials as $key=>$testimonial )
                          <tr>
                            <th scope="row">{{$key +1}}</th>
                            <td><img src="{{asset("storage/uploads/testimonials/$testimonial->user_image")}}" alt=""></td>
                            <td>{{$testimonial->user_name}}</td>
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

        <div class="bottom-data">
            <div class="orders">
                <table class="table table-dark table-striped rounded">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Şəkli</th>
                            <th>Başlığı</th>
                            <th>Məlumatı</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                    </thead>
                </table>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </div>
        </div>
    </main>
@endsection



