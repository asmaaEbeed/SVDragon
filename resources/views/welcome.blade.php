@extends('layouts.home')
@section('title', config('app.name', 'ultimatePOS'))

@section('content')
    <style type="text/css">
        .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                margin-top: 10%;
            }
        .title {
                font-size: 84px;
            }
        .tagline {
                font-size:25px;
                font-weight: 300;
                text-align: center;
            }

        @media only screen and (max-width: 600px) {
            .title{
                font-size: 38px;
            }
            .tagline {
                font-size:18px;
            }
        }
    </style>
    <div class="title welcome-title" style="font-weight: 600 !important;">
        {{ config('app.name', 'ultimatePOS') }}
    </div>
    <p class="tagline welcome-slogan">
        {{ env('APP_TITLE', '') }}
    </p>
    <!--use Login & Register part from home_header.blade.php by Asmaa-->
    <ul class="welcome-login-list text-center">
        @if (Route::has('login'))
            @if(!Auth::check())
                <li><a href="{{ route('login') }}" class="btn btn-outline-light btn-lg">@lang('lang_v1.login')</a></li>
                @if(config('constants.allow_registration'))
                    <li><a href="{{ route('business.getRegister') }}" class="welcome-register">@lang('lang_v1.register')</a></li>
                @endif
            @endif
        @endif
    </ul>
@endsection
            