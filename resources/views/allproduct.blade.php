@extends('layouts.admin')
@section('title','dashboard')

@section('content')

@if(Session::has('message'))
    <p class="alert alert-info my-2">{{ Session::get('message') }}</p>
@endif
    <div class="container my-2">
        <div class="row">
            @foreach ($products as $item)
            <div class="col-md-3 mx-auto">
                <div class="card">
                    @foreach ($item['img'] as $img)
                    <img src="{{ asset('images/'.$img->link) }}" class="card-img-top img-fluid" alt="product image" style="height: 222px;width:222px">
                    @break
                    @endforeach
                    <div class="card-body">
                        <h5 class="card-title">{{$item['name']}}</h5>
                        <p class="card-text">{{$item['desc']}}</p>
                        <p class="card-text">Original Price : {{$item['price']}}</p>
                        <p class="card-text">Discount : {{$item['discount']}}%</p>
                        <p class="card-text">Payble : {{$item['price'] - ($item['price']*($item['discount']/100))}}</p>
                        
                        <a href="{{url('/modify/'.$item['id'])}}" class="btn btn-outline-danger">Modify</a>
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection