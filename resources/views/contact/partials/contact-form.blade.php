<div class="contact-form">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>{{ __('words.getInfo') }}</h2>
            </div>
            <form action="{{route("ticket_info.add")}}" method="POST" class="row">
                @csrf
                <div class="col-12  col-md-4">
                    <input type="text"  name="username" placeholder="{{ __('words.name') }}">
                </div>
                <div class="col-12 col-md-4">
                    <input type="email" name="useremail" placeholder="{{ __('words.email') }}">
                </div>
                <div class="col-12 col-md-4">
                    <input type="text" name="usersubject" placeholder="{{ __('words.subject') }}">
                </div>
                <div class="col-12">
                    <textarea name="usermessage" rows="12" cols="80" placeholder="{{ __('words.message') }}"></textarea>
                </div>
                <div class="col-12">
                    @if (session('success'))
                    <p style="color: green; background-color:bisque; padding:10px;">{{session("success")}}</p>
                @endif
                </div>
                <div class="col-12">
                    <input type="submit" name="" value="{{ __('words.sendmessage') }}"
                        class="button gradient-bg">
                </div>
            </form>
        </div>
    </div>
</div>
