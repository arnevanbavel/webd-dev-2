@extends('layouts.app')

@section('content')
    @include('inc.carousel')
 	<div class="content-wrapper clearfix">
        <div class="col-md-10 col-md-offset-1">
            @include('inc.message')
            <div class="info">
                <p>
                Welcome to our Kowloon website. You will find all the products you need right here on Kowloon and so on... Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore Duis aute irure dolor in reprehenderit in voluptate velit esse
                </p>
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
                    @foreach($hotItems as $hotItem)
                        <a href="{{ url('categories', [$hotItem->product->categorie->url, 'product' ,$hotItem->product->link]) }}">
                            <div class="col-md-3">
                                <div class="hot-item">
                                    <div class="photo">
                                        @if(count($hotItem->product->photos) > 1)
                                            <div class="product-count-photos"> {{ count($hotItem->product->photos) }} </div>
                                        @endif
                                        @if(count($hotItem->product->Photos) >= 1)<img src="{{ url('uploads/products', [$hotItem->product->Photos[0]->name]) }}"> @else <img src="{{ url('img/placeholder.jpg') }}"> @endif
                                    </div>
                                    <div class="hot-item-info clearfix">
                                        <div class="pull-left">
                                            {{$hotItem->Product->name}}
                                        </div>
                                        <div class="pull-right">
                                            {{$hotItem->Product->prijs}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            @include('inc.subscribe')

        </div>
    </div>
@endsection