@extends('layouts.front')
@section('title', 'Products details')

@section('content')

    <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bag as $item)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['quan']}}</td>
                        <td>{{$item['price']}}</td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

@endsection
