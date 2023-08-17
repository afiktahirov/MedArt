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
                                src="{{asset("images/emergency-call.png")}}"> +34 586 778 8892</a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, cons ectetur adipiscing elit. Donec males uada lorem maximus
                        mauris sceler isque, at rutrum nulla.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-5 mt-5 mt-lg-0">
                <div class="appointment-box">
                    <h2 class="d-flex align-items-center">{{__("words.Make_an_Appointment")}}</h2>
                    <form class="d-flex flex-wrap justify-content-between">
                        <select class="select-department">
                            <option value="value1">Select Department</option>
                            <option value="value2">Select Department 1</option>
                            <option value="value3">Select Department 2</option>
                        </select>
                        <select class="select-doctor">
                            <option>Select Doctor</option>
                            <option>Select Doctor 1</option>
                            <option>Select Doctor 2</option>
                        </select>
                        <input type="text" placeholder="Name">
                        <input type="number" placeholder="Phone No">
                        <input class="button gradient-bg" type="submit" value="{{__("words.boom_appoitnmentt")}}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
