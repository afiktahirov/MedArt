@extends('admin.index')
@section('content')
    <main>
        <div class="header">
            <div class="left">
                <h1>Məlumat Paneli</h1>
                <ul class="breadcrumb">
                    <li><a href="#">
                            Admin
                        </a></li>
                    /
                    <li><a href="#" class="active">Məlumat Paneli</a></li>
                </ul>
            </div>
            <a href="#" class="report">
                <i class='bx bx-cloud-download'></i>
                <span>Yüklə CSV</span>
            </a>
        </div>

        <!-- Insights -->
        <ul class="insights">
            <li id="dateInfo">
                <i class='bx bx-calendar-check'></i>
                <span class="info">
                    <h3>

                    </h3>
                    <p></p>
                </span>
            </li>
            <li><i class='bx bx-show-alt'></i>
                <span class="info">
                    <h3>
                        944
                    </h3>
                    <p>Ümumi baxış sayı</p>
                </span>
            </li>
            <li><i class='bx bx-line-chart'></i>
                <span class="info">
                    <h3>
                        721
                    </h3>
                    <p>Axtarışda görünmə sayı</p>
                </span>
            </li>
            <li><i class='bx bxs-no-entry'></i>
                <span class="info">
                    <h3>
                        42
                    </h3>
                    <p>Bloklanan istifadəçi sayı</p>
                </span>
            </li>
        </ul>
        <!-- End of Insights -->

        <div class="bottom-data">
            <div class="orders">
                <div class="header">
                    <i class='bx bx-receipt'></i>
                    <h3>Ən son gələn müraciətlər</h3>
                    <i class='bx bx-filter'></i>
                    <i class='bx bx-search'></i>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Pasiyent</th>
                            <th>Göndərilmə tarixi</th>
                            <th>Müraciət olunan şöbə</th>
                            <th>Müraciət olunan həkim</th>
                            <th>Pasiyentin nömrəsi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                            <tr>
                                <td>
                                    {{ $ticket->name_patient }}
                                </td>
                                <td>{{ $ticket->date }}</td>
                                <td>

                                    {{-- @dd($departments) --}}
                                    @foreach ($departments as $department)
                                        @php
                                            if (!count($department->languages)) {
                                                $departmentName = '';
                                            } else {
                                                $departmentName = $department->languages[0]->name;
                                            }
                                        @endphp
                                        {{$departmentName}}
                                    @endforeach
                                </td>
                                <td>
                                    @if (count($doctors))
                                        @foreach ($doctors as $doctor)
                                            @if ($doctor->id == $ticket->doctor)
                                                {{ $doctor->name }}
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>

                                    {{ $ticket->patient_phone }}
                                </td>
                                <td><span class="status completed">Baxılıb</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Reminders -->


            <!-- End of Reminders-->

        </div>
        <div class="bottom-data">
            <div class="orders">
                <div class="header">
                    <i class='bx bx-receipt'></i>
                    <h3>Ən son gələn ismarıclar</h3>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Göndərən</th>
                            <th>Mail adresi</th>
                            <th>Mövzu</th>
                            <th>İsmarıcı</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets_info as $ticket )

                        <tr>
                            <td>{{$ticket->username}}</td>
                            <td>{{$ticket->useremail}}</td>
                            <td>{{$ticket->usersubject}}</td>
                            <td style="max-width: 200px; min-width:200px" >
                                <p class="text-truncate">{{$ticket->usermessage}}</p>
                            </td>
                            <td><span class="status pending">Baxılır</span></td>

                        </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Reminders -->


            <!-- End of Reminders-->

        </div>

    </main>
    <script>
        function updateClock() {
            var now = new Date();
            var currentDate = now.getDate();
            var currentMonth = now.toLocaleString('default', {
                month: 'long'
            });
            var currentYear = now.getFullYear();
            var currentTime = now.toLocaleTimeString();

            var dateInfo = document.getElementById('dateInfo');
            dateInfo.querySelector('h3').textContent = currentDate + ' ' + currentMonth + ' ' + currentYear;
            dateInfo.querySelector('p').textContent = currentTime;
        }

        updateClock();

        setInterval(updateClock, 1000);
    </script>
@endsection
