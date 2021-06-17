@extends('layouts.admin')
@section('title','dashboard')

@section('content')

    @if(Session::has('message'))
        <p class="alert alert-info my-2">{{ Session::get('message') }}</p>
    @endif

    <div class="p-2">
        <form action="{{url('/product')}}" method="POST" id="product" enctype='multipart/form-data'>
            @csrf
            {{-- <input type="hidden" class="form-control" name="interface" value="color"> --}}
            {{-- <input type="hidden" class="form-control" name="id" value="-1"> --}}
            <div class="form-group p-2 col-md-8">
                <label for="exampleInputEmail1">Add Colors</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Add product name" required>
            </div>
            <div class="form-group p-2 col-md-8">
                <label for="exampleInputEmail1">Add Price</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="price" placeholder="Add product price" required>
            </div>
            <div class="form-group p-2 col-md-8">
                <label for="exampleInputEmail1">Add Discount</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="discount" placeholder="Add product dicount" required>
            </div>
            <div class="form-group p-2 col-md-8">
                <label for="exampleInputEmail1">Add Images</label>
                <input type="file" class="form-control" id="" name="image1" accept="image/*">
                <input type="file" class="form-control" id="" name="image2" accept="image/*">
                <input type="file" class="form-control" id="" name="image3" accept="image/*">
            </div>
            <div class="form-group p-2 col-md-8">
                <label for="exampleInputEmail1">Add Description</label>
                <textarea name="description" class="form-control" id="" cols="30" rows="10" placeholder="Add product description"></textarea>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary save-data" id="">Submit</button>
            </div>
        </form>
    </div>

@endsection