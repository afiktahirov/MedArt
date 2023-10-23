@extends('admin.index')
@section('content')
{{-- @dd($departmentName) --}}
    {{-- Add New Doctor Modal --}}
    <div class="modal fade" id="addNewDoctor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Yeni Həkim</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('doctor.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="info">
                                <label for="" class="form-label  mt-5">
                                    <span style="font-size: 24px; color:black; font-weight:200;">Həkim məlumatları</span>
                                </label>
                                <hr color="black">
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="col-form-label">Həkim ad/soyad:</label>
                                <input type="text" class="form-control" name="namesurname">
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label">Cinsi:</label>
                                <select class="form-control" name="gender" id="">
                                    <option value="1">Kişi</option>
                                    <option value="2">Qadın</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label">Yaşı:</label>
                                <input type="number" class="form-control" name="age">
                            </div>
                        </div>
                        <div class="row">
                            <div class="info">
                                <label for="" class="form-label  mt-5">
                                    <span style="font-size: 24px; color:black; font-weight:200;">İş məlumatları</span>
                                </label>
                                <hr color="black">
                            </div>
                            <div class="col-md-4">
                                <label for="recipient-name" class="col-form-label">İşləyəcəyi Şöbə</label>
                                <select name="department" id="" class="form-control">
                                    @foreach ($departments as $department)
                                        @if (empty($department->languages[0]->name))
                                            <option value="false">Bu şöbə azərbaycan dilində adlandırılmayıb</option>
                                        @else
                                            <option id="lang" value="{{ $department->id }}">
                                                {{ $department->languages[0]->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label">Vəzifə:</label>
                                <input type="text" class="form-control" name="position">
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="col-form-label">Maaş <span style="color:red;">(Manatla)</span>:</label>
                                <input type="number" class="form-control" name="wage">
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label">Təcrübəsi <span style="color:red;">(Ay)</span>:</label>
                                <input type="number" class="form-control" name="experience">
                            </div>
                        </div>
                        <hr color="black">

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
    {{-- Delete Doctor Modal --}}
    <div class="modal fade" id="deleteDoctorModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content text-center">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title font-weight-normal" id="deleteModalLabel">Əminsinizmi ?</h5>
                </div>
                <div class="modal-body">
                    <strong class="text-danger">
                        Həkim məlumatları silinəcək və geri alına bilməz
                        !</strong>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn bg-secondary text-white" data-bs-dismiss="modal">Bağla</button>
                    <form action="{{ route('doctor.destroy') }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" id="delete__item__id" value="doctor_id">
                        <button type="submit" class="btn bg-gradient-danger">Bəli, silinsin</button>
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
                <div class="header">
                    <i class='bx bx-receipt'></i>
                    <h3>Hospitalda işləyən həkimlər</h3>
                    <i class='bx bx-filter'></i>
                    <i class='bx bx-search'></i>
                </div>
                <table class="doctorTable">
                    <thead>
                        <tr>
                            <th>Həkim</th>
                            <th>Cins</th>
                            <th>Maaş</th>
                            <th>Yaş</th>
                            <th>Şöbəsi</th>
                            <th>Vəzifəsi</th>
                            <th>İş Təcrübəsi</th>
                            <th>Status</th>
                            <th id="th_options">Əməliyatlar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctors as $doctor)
                            <tr>
                                <td id="user">
                                    <img src="{{ asset("storage/uploads/doctors/$doctor->photo") }}">
                                    <p>{{ $doctor->name }}</p>
                                </td>
                                <td id="gender">
                                    <p>{{ $doctor->gender }}</p>
                                </td>
                                <td id="payment">
                                    <p>{{ $doctor->wage }}</p>
                                </td>
                                <td id="age">
                                    <p>{{ $doctor->age }}</p>
                                </td>
                                <td id="department">
                                    <p>
                                        @foreach ($departmentName as $department )
                                             @if ($doctor->department_id==$department->id)
                                                   {{$department->name}}
                                             @endif
                                        @endforeach
                                    </p>
                                </td>
                                <td id="position">
                                    <p>{{ $doctor->position }}</p>
                                </td>
                                <td id="exp">
                                    <p>{{ $doctor->experience }}<span>ay</span></p>
                                </td>
                                <td id="status">
                                    <p>
                                        <span class="status completed">İşləyir</span>
                                    </p>
                                </td>
                                <td id="options">
                                    <div class="buttons">
                                        <button class="btn btn-info">Tənzimlə</button>
                                        {{-- <button class="btn btn-warning">Redakte et</button> --}}
                                        <button class="btn btn-danger" id="deleteDoctor" data-bs-toggle="modal"
                                            data-bs-target="#deleteDoctorModal"
                                            data-id="{{ $doctor->id }}">Sil</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                    @php
                    $info = '<p class="mx-3 font-weight-bold font-italic" style="color:#e91e63">Hal hazırda web saytda heç bir həkim məlumatı yoxdurg</p>';

                    if (!count($doctors)) {
                        echo $info;
                    }
                   @endphp
            </div>
        </div>
    </main>





@endsection
