@extends('layouts.admin')
@section('title','dashboard')

@section('content')
    <?php
        $link = $_SERVER['PHP_SELF'];
        $link_array = explode('/',$link);
        $page  = end($link_array);
    ?>
    <?php $i = 0; ?>

    @if(Session::has('message'))
        <p class="alert alert-info my-2">{{ Session::get('message') }}</p>
    @endif

    @if ($page === "color")
        <div class="p-2">
            <form action="{{url('/interface')}}" method="POST" id="color">
                @csrf
                <input type="hidden" class="form-control" name="interface" value="color">
                {{-- <input type="hidden" class="form-control" name="id" value="-1"> --}}
                <div class="form-group p-2 col-md-8">
                <label for="exampleInputEmail1">Add Colors</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Add color" required>
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
                        <th scope="col">Color name</th>
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
        
    @endif

    @if ($page === "size")
        <div class="p-2">
            <form action="{{url('/interface')}}" method="POST" id="size">
                @csrf
                <input type="hidden" class="form-control" name="interface" value="size">
                <div class="form-group p-2 col-md-8">
                <label for="exampleInputEmail1">Add Size</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Add size" required>
                </div>
                <button type="submit" class="btn btn-primary save-data" id="size">Submit</button>
            </form>
        </div>

        <div class="container">
            <div class="row mx-auto w-25">
                <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Size name</th>
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
    
    @endif

    @if ($page === "weight")
        <div class="p-2">
            <form action="{{url('/interface')}}" method="POST" id="weight">
                @csrf
                <input type="hidden" class="form-control" name="interface" value="weight">
                <div class="form-group p-2 col-md-8">
                <label for="exampleInputEmail1">Add Weights</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Add weight" required>
                </div>
                <button type="submit" class="btn btn-primary save-data" id="weight">Submit</button>
            </form>
        </div>

        <div class="container">
            <div class="row mx-auto w-25">
                <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kg or Litre</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                            @foreach($colors as $color)
                            <tr>
                                <th scope="row">{{++$i}}</th>
                                <td>{{ $color->KgorLiter }}</td>
                            </tr>
                            @endforeach                        
                      
                    </tbody>
                  </table>
            </div>
            
        </div>
    @endif

    @if ($page === "scale")
        <div class="p-2">
            <form action="{{url('/interface')}}" method="POST" id="scale">
                @csrf
                <input type="hidden" class="form-control" name="interface" value="scale">
                <div class="form-group p-2 col-md-8">
                <label for="exampleInputEmail1">Add Scale</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Add Scale" required>
                </div>
                <button type="submit" class="btn btn-primary save-data" id="scale">Submit</button>
            </form>
        </div>

        <div class="container">
            <div class="row mx-auto w-25">
                <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Scale</th>
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
    @endif

    @if ($page === "brand")
        <div class="p-2">
            <form action="{{url('/interface')}}" method="POST" id="scale">
                @csrf
                <input type="hidden" class="form-control" name="interface" value="brand">
                <div class="form-group p-2 col-md-8">
                    <label for="exampleInputEmail1">Add Brand</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Add Brand" required>
                </div>
                <div class="form-group p-2 col-md-8">
                    <label for="exampleInputEmail1">Add Country</label>
                    <input type="text" class="form-control" name="country" id="exampleInputEmail1" placeholder="Add Country" required>
                    </div>
                <button type="submit" class="btn btn-primary save-data" id="scale">Submit</button>
            </form>
        </div>

        <div class="container">
            <div class="row mx-auto w-25">
                <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Country</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                            @foreach($brand as $color)
                            <tr>
                                <th scope="row">{{++$i}}</th>
                                <td>{{ $color->name }}</td>
                                <td>{{ $color->country }}</td>
                            </tr>
                            @endforeach                        
                      
                    </tbody>
                  </table>
            </div>
            
        </div>
    @endif
@endsection