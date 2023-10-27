<div class="homepage-boxes">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="opening-hours">
                    <h2 class="d-flex align-items-center">{{__("words.Opening_Hours")}}</h2>
                    <ul class="p-0 m-0">
                        <li>{{__("words.monday")}} <span>8.00 - 19.00</span></li>
                        <li>{{__("words.thursday")}} <span>8.00 - 19.00</span></li>
                        <li>{{__("words.friday")}} <span>8.00 - 18.30</span></li>
                        <li>{{__("words.saturday")}} <span>9.30 - 17.00</span></li>
                        <li>{{__("words.sunday")}} <span>9.30 - 15.00</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mt-5 mt-md-0">
                <div class="emergency-box">
                    <h2 class="d-flex align-items-center">{{__("words.Emergency")}}</h2>
                    <div class="call-btn button gradient-bg">
                        <a class="d-flex justify-content-center align-items-center" href="#"><img
                                src="{{asset("images/emergency-call.png")}}"> +994773883238</a>
                    </div>
                    <div class="infoNowDiv d-flex align-items-center" style="width: 100%;height:105px;">

                        <p class="form-control" style="font-size: 16px;">{{__("words.infoNow")}}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-5 mt-5 mt-lg-0">
                <div class="appointment-box">
                    <h2 class="d-flex align-items-center">{{__("words.Make_an_Appointment")}}</h2>
                    <form class="d-flex flex-wrap justify-content-between" method="POST" action="{{route("ticket.add")}}">
                        @csrf
                        <select class="select-department" name="select-department">
                            <option value="value1">{{__("words.select_department")}}</option>
                            @foreach ($departments as $department)
                            @php
                                if(!count($department->languages)){
                                    $departmentName = "";
                                }
                                else {
                                    $departmentName = $department->languages[0]->name;
                                }
                            @endphp
                            <option value="{{$department->id}}">{{$departmentName}}</option>
                            @endforeach
                        </select>
                        <select class="select-doctor" name="select-doctor">
                            <option>{{__("words.select_doctor")}}</option>
                        </select>
                        <input type="text"  name="p_name" placeholder="{{__("words.yourname")}}">
                        <input type="number" name="p_phone" placeholder="{{__("words.phoneNo")}}">
                        <input class="button gradient-bg" type="submit" value="{{__("words.boom_appoitnmentt")}}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded",function(){
    //Department selected
    document.querySelector(".select-department").addEventListener('change',function(select){
        let departmentId = this.value;
        let doctorSelect = document.querySelector(".select-doctor");

        doctorSelect.innerHTML = '';

         fetch('api/getdoctors/'+ departmentId)
         .then(response=>response.json())
         .then(doctors=>{
            doctors.forEach(doctor =>{
               let option = document.createElement("option");
               option.value = doctor.id;
               option.text = doctor.name+" - "+doctor.position;
               doctorSelect.append(option);
            });
         })
         .catch(error=>console.error("Xeta",error));
    })
})

</script>
