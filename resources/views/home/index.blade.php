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
                @foreach($categories as $categorie)
                    <div class="category col-md-2 divider-vertical">
                        <a href="{{ url('categories', $categorie->url) }}">
                            <img src="img/menu/{{$categorie->photo}}">
                            <p>{{ $categorie->name }}</p>
                        </a>
                    </div>
                @endforeach 
            </div>

            <div class="hot-items-wrapper clearfix">
                <h1>HOT ITEMS</h1>

                <div class="hot-items">

                    <!--hot items-->
                    <!--hot items-->
                    <!--hot items-->
                    
                </div>
            </div>

            @include('inc.subscribe')

        </div>
    </div>
@endsection