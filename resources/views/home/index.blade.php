@extends('layouts.app')

@section('content')
    <div class="carousel-wrapper">

        <div class="slider-wrapper" id="slick1">
            <div class="header-photos">
                <div class="img-carousel"></div>
                <div class="img-carousel2"></div>
                <div class="img-carousel3"></div>
            </div>
        </div>
        <div class="slider-progress">
            <div class="progress"></div>
        </div>
    </div>
 	<div class="content-wrapper clearfix">
        <div class="col-md-10 col-md-offset-1">
            @include('inc.message')
            <div class="info">
                <p>{{ Lang::get('info.intro') }}</p>
            </div>

            <div class="categories clearfix">
				<!--categories-->
				<!--categories-->
				<!--categories-->  
            </div>

            <div class="hot-items-wrapper clearfix">
                <h1>HOT ITEMS</h1>

                <div class="hot-items">

                    <!--hot items-->
                    <!--hot items-->
                    <!--hot items-->
                    
                </div>
            </div>

            <div class="subscribe-wrapper">

                <div class="subscribe-info col-md-8">
                    <h1><strong>{{ Lang::get('subscribe.deals') }}</strong></h1>
                    <h4>{{ Lang::get('subscribe.only') }}</h4>
                </div>

                <div class="subscribe-form-wrapper col-md-4">
                    <div class="susbcribe-form">
                        <h4>{{ Lang::get('subscribe.subscribe') }}</h4>
                        Lorum ipsum dolor sit amet...
                        <form method="POST" action="{{ url('/subscribe') }}" class="subscribe">
                            {{ csrf_field() }}
                            <input type="text" name="email" value="{{old('email')}}"><button class="btn-primary btn-subscribe">OK</button>
                            <br>
                            @if ($errors->has('email'))
                                <span class="form-validation"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection