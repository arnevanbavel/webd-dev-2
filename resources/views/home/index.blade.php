@extends('layouts.app')

@section('content')
    @include('inc.carousel')
 	<div class="content-wrapper clearfix">
        <div class="col-md-10 col-md-offset-1">
            @include('inc.message')
            <div class="info">
                <p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque a leo ultrices leo faucibus vestibulum viverra eu ex. Proin a sapien augue. Maecenas id placerat libero. Pellentesque nulla quam, rutrum quis convallis sed, mattis eu neque. Integer hendrerit orci at augue dictum, ac aliquam erat vehicula. Vestibulum scelerisque, tellus in vehicula consequat, magna diam sollicitudin risus, nec dignissim enim risus ac orci. Donec ut lorem gravida, eleifend arcu ac, pretium nisi. Pellentesque quis metus iaculis, 
                </p>
            </div>

            <div class="categories clearfix">
                @foreach($categories as $categorie)
                    <div class="category col-md-2 divider-vertical cat">
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
                <div class="row">
                    <div class="col-md-12 text-right visitstore">
                    <a href="#"><u>Visit the store</u></a>
                    </div>
                </div>
            </div>

            @include('inc.subscribe')

        </div>
    </div>
@endsection