@extends('layouts.front')
@section('title','welcome')

@section('content')

<div class="container">
    <div class="row my-1 auto">
        @foreach ($products as $item)
        <div class="col-md-3 col-sm mx-auto">
            <div class="card" style="width: 18rem;">
                {{-- <img src="./images/1.jpg" class="card-img-top" alt="..."> --}}
                @foreach ($item['img'] as $img)
                <img src="{{asset('./images/'.$img->link)}}" class="card-img-top" alt="..." style="height: 222px;">
                @break
                @endforeach
                <div class="card-body">
                    <h5 class="card-title">{{$item['name']}}</h5>
                    <p class="card-text">{{$item['desc']}}</p>
                    <p class="card-text">Original Price : {{$item['price']}}</p>
                    <p class="card-text">Discount : {{$item['discount']}}%</p>
                    <p class="card-text">Payble : {{$item['price'] - ($item['price']*($item['discount']/100))}}</p>
                    <a href="{{url('/details/'.$item['id'])}}" class="btn btn-primary">Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('script')
@endsection