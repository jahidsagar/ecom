@extends('layouts.admin')
@section('title','dashboard')

@section('content')
<?php $i = 0; ?>

@if(Session::has('message'))
    <p class="alert alert-info my-2">{{ Session::get('message') }}</p>
@endif

<div class="p-2">
    <form action="{{url('/category')}}" method="POST" id="category">
        @csrf
        {{-- <input type="hidden" class="form-control" name="interface" value="color"> --}}
        {{-- <input type="hidden" class="form-control" name="id" value="-1"> --}}
        <div class="form-group p-2 col-md-8">
        <label for="exampleInputEmail1">Add Category</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Add category" required>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary save-data" id="color">Submit</button>
        </div>
    </form>
</div>

<div class="container">
    <div class="row mx-auto w-25">
        <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Category</th>
              </tr>
            </thead>
            <tbody>
                
                    @foreach($colors as $color)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{ $color->name }}</td>
                    </tr>
                    @endforeach                        
              
            </tbody>
          </table>
    </div>
    
</div>


@endsection