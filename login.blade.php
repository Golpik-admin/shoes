
<?php


?>

<style>   
body header .nav_postion{
    position: relative;
}
@media(min-width:768px){
    body header .nav_postion{
        top: 390px !important;
    }
} 
@media(max-width:767px){
    body header .nav_postion{
    top: 143px !important;
    z-index: 99;
    }
}.modal-title {
    font-family: Verdana,Arial;
    font-size: 12pt;
    font-weight: 100;
    font-style: italic;
}</style>

@include('frontend.layout.header')
        <!-- <div class="col-md-12 bg_blue p-2">
            <h1 class="text-white text-center m-0">Career Boot Camp Registration</h1>
        </div> -->
        </div>
    </div>
</header>

<div class="container mt-3 pt-3 pl-0 pr-0 bannerImages" style="top: -80px;">
    <div class="row pt-4 pb-0 mt-4 m-0">
        <div class="col-md-12 text-center">            
            <img src="<?php echo asset('images/default_img.png') ?>" class="w-100 header-img-mobile" style="x   ">            
        </div>  
        <div class="col-md-12 text-center mt-5">
            <!-- <h5 class="text-blue mt-5"><b>Sign up below to receive your individual log-in information</b></h5> -->

          
                @if(session('status'))
                    {{ session('status') }}
                @endif

            <div class="container mt-1">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card font14">

                @if(session('message') !== null)
                 <div class="p-3">
                <h5 class="text-danger">{{ session('message')}}</h5>
                </div>
                @endif
                
                

                <div class="pt-4 mb-4"><b>{{ isset($url) ? $url : ""}}   {{ __('Members Only') }}</b></div>
                
                <p class="px-5 m-0"><b>Important:</b> Your membership email ID is the email address you used to sign up. If you have forgotten your password, click the “Reset Password” link and it will be emailed to you.</p>
                <hr>
                <div class="card-body">
                       @if(@isset($url))                       
                        <form id="loginForm" action='{{ url("login/$url") }}' method="POST">
                        @else
                        <form id="loginForm" method="POST" action="{{ url('login') }}" aria-label="{{ __('Login') }}">
                         @endif 
                    <!-- <form method="POST" action="{{ route('login') }}"> -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-3 offset-md-1 col-form-label text-left">{{ __('E-Mail Address') }} <span class="text-danger">*</span></label>

                            <div class="col-md-7">
                                <input id="email" name="email" type="email" class="rounded-0 form-control @error('email') is-invalid @enderror pl-2" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus required  placeholder="Email Address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert" >
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 offset-md-1 col-form-label text-left cus-font-query">{{ __('Password') }} <span class="text-danger">*</span></label>

                            <div class="col-md-7">
                                <input id="password" name="password" type="password" class="rounded-0 form-control @error('password') is-invalid @enderror pl-2" name="password" required autocomplete="current-password" required  placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <hr> -->

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4 text-left">
                                <!-- <div class="form-check"> -->
                                    <!-- <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> -->
                                     
                                    <!-- <div class="checkbox">
                                    <label><input type="checkbox" value="">Option 1</label>
                                    </div> -->

                                    <!-- <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label> -->

                                    <!-- Default unchecked -->
                                <!-- <div class="custom-control custom-checkbox p-0">
                                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label  for="remember">Remember Me</label>
                                </div> -->
                                <!-- </div> -->
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 col-lg-2 offset-lg-4 text-left align-self-center">
                                <button type="submit" class="rounded-0 btn btn-primary bg_blue border-0 font14 w-100">
                                    {{ __('Login') }}
                                </button>
                            </div>

                            @if (Route::has('password.request'))
                            <div class="col-md-6 text-left pt-2 px-3">
                                <a class="link" href="{{ route('forget.password.get') }}">
                                    {{ __('Reset Password') }}
                                </a>
                                | <a class="link" href="{{url('/registration') }}">
                                    Registration
                                </a>
                            </div>
                            @endif

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
        </div>
    </div>
</div>

@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            //Signup Form Validations
            $("#loginForm").validate({
                errorClass: "text-danger",
                rules: {
                    email: {
                        required: true,
                        email: true,
                        remote: {
                           data: {"_token": "{{ csrf_token() }}"},
                            url: "{{ route('check-email-login') }}",
                            type: "POST",
                        }
                    },
                    password: {
                        required: true,
                    }
                },
                messages: {
                    email: {
                        required: 'Please Enter Email',
                        remote: 'Email does not belong to any user'

                    },
                    password: {
                        required: 'Please Enter Password',
                    },
                    
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
@endpush
@include('frontend.layout.footer')




































