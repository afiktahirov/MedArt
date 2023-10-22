@extends('admin.index')
@section("content")
<div class="modal fade" id="addNewDoctor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Yeni Həkim</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route("testimonial.add")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="col-form-label">Həkim ad/soyad:</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Maaş <span style="color:red;">(Manatla)</span>:</label>
                        <input type="number" class="form-control" name="wage">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">İşləyəcəyi Şöbə</label>
                        <select name="lang" id="" class="form-control">
                            @foreach ($departments as $department)
                            @if (empty($department->languages[0]->name))
                                <option value="false">Bu şöbə azərbaycan dilində adlandırılmayıb</option>
                            @else
                            <option id="lang" value="{{$department->id}}">{{$department->languages[0]->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Vəzifə:</label>
                        <input type="text" class="form-control" name="position">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Təcrübəsi <span style="color:red;">(Ay)</span>:</label>
                        <input type="text" class="form-control" name="position">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Həkim şəkli:</label>
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
            <h1>Hospital Həkimləri</h1>
            <ul class="breadcrumb">
                <li><a href="#">
                        Ana Səhifə
                    </a></li>
                /
                <li><a href="#" class="active">Həkim İdarə Paneli</a></li>
            </ul>
        </div>
    </div>
    <div class="buttons">
        <button class="btn btn-primary mt-2 mx-2" data-bs-toggle="modal" data-bs-target="#addNewDoctor">Yeni Həkim
        əlavə et</button>
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
    <div class="bottom-data">
        <div class="orders">

        </div>
    </div>
</main>





@endsection
