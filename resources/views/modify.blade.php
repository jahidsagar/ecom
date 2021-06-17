@extends('layouts.admin')
@section('title','dashboard')
@section('links')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
@endsection
@section('content')
<div class="container my-2">
    @if(Session::has('message'))
    <p class="alert alert-info my-2">{{ Session::get('message') }}</p>
    @endif
    <div class="row">
        <div class="col-md-3">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php $i = 1; ?>
                    @foreach ($img as $item)
                    <div class="carousel-item <?php if($i++ == 1) echo 'active'; ?>">
                        <img class="d-block w-100" src="{{ asset('images/'.$item) }}" alt="First slide">
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-8">
            <h3>{{$product->name}}</h3>
            <hr>
            <h5>Original Price : <b>{{$product->price}}</b></h5>
            <h5>Discount : <b>{{$product->discount}}%</b></h5>
            <h5>Price : <b>{{$product->price - ($product->price*($product->discount/100))}}</b></h5>
            <hr>
            
            <form action="{{url('/modify')}}" method="POST" id="product" >
                @csrf
                <input type="hidden" name="proid" value="{{$product->id}}">
                <div class="form-group p-2 col-md-8">
                    <label for="exampleInputEmail1">Add Size</label>
                    <select name="size" id="" class="form-control">
                        <option value=0>Not applicable</option>
                        @foreach ($size as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group p-2 col-md-8">
                    <label for="exampleInputEmail1">Add Color</label>
                    <select name="color" id="" class="form-control">
                        <option value=0>Not applicable</option>
                        @foreach ($color as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group p-2 col-md-8" >
                    <label for="exampleInputEmail1">Add Weight</label>
                    <select name="weight" id="" class="form-control">
                        <option value=0>Not applicable</option>
                        @foreach ($weight as $item)
                        <option value="{{ $item->id }}">{{ $item->KgorLiter }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group p-2 col-md-8">
                    <label for="exampleInputEmail1">Add Scale</label>
                    <select name="scale" id="" class="form-control">
                        <option value=0>Not applicable</option>
                        @foreach ($scale as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group p-2 col-md-8" >
                    <label for="exampleInputEmail1">Add Brand</label>
                    <select name="brand" id="" class="form-control">
                        <option value=0>Not applicable</option>
                        @foreach ($brand as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group p-2 col-md-8" >
                    <label for="exampleInputEmail1">Add Category</label>
                    <select name="category" id="" class="form-control">
                        <option value=0>Not applicable</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group p-2 col-md-8">
                    <label for="exampleInputEmail1">Add Quantity</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name="quantity" placeholder="Add quantity" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary save-data" id="">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection