@extends('admin.index')
@section('content')

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
            <button class="btn btn-primary mt-2 mx-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Yenilik
            əlavə et</button>
            <button class="btn btn-primary mt-2 mx-2" data-bs-toggle="modal" data-bs-target="#addNewComment">Yeni
                Rəy</button>
        <div class="bottom-data">
            <div class="orders">

            </div>
        </div>
        <div class="div"></div>
    </main>
@endsection



