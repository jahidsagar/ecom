@extends('layouts.front')
@section('title','Products details')

@section('content')
<div class="container mt-2">
    <div class="alert alert-primary" id="alert" role="alert"></div>
    <div class="row">
        <div class="col-md-3">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php $i = 1; ?>
                    @foreach ($img as $item)
                    <div class="carousel-item <?php if($i++ == 1) echo 'active'; ?>">
                        <img class="d-block w-100" src="{{asset('/images/'.$item->link)}}" alt="First slide">
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
            <h3>{{ $product->name}}</h3>
            <hr>
            <h5>Original Price : <b>{{ $product->price}}</b></h5>
            <h5>Discount : <b>{{ $product->discount}}%</b></h5>
            <h5>Price : <b>{{ $product->price - $product->price*($product->discount/100)}}</b></h5>
            <hr>
            <form id="custom">
                <div class="form-group">
                  <label for="color">Available Color</label>
                  <select name="color" id="color" class="form-control">
                        <option value="null" disabled selected>select color</option>
                      @foreach ($color as $item)
                            <option value="{{$item['id']}}">{{$item['name']}}</option>
                      @endforeach
                  </select>
                </div>
                {{-- <button type="button" class="btn btn-primary">Submit</button> --}}
              </form>
            <hr>
            <input type="submit" id="acart" class="btn btn-primary" onclick="AddtoCart();" value="Add to cart">
        </div>
    </div>

</div>
@endsection

@section('script')
    <script>
        $form = $("#custom ");
        $pid = {{$product->id}};
        $cid = -1;
        $('#acart').hide();
        $('#alert').hide();

        $( "#color" ).change(function() {
            $('#psize').remove();
            $('#quantity').remove();
            $('#acart').hide();
            $cid = this.value;
            $.ajax({
            url: "/api/size/"+$pid+"/" + $cid + "",
            type: 'GET',
            success: function(res) {
                    $form.append('<select name="size" id="psize" class="form-control" onchange="getval(this);" ><option value="null" disabled selected>select size</option></select>')
                    
                    $.each(res, function(key, value) {
                        $('#psize')
                            .append($('<option>', { value : value.id })
                            .text(value.name));
                    });
                }
            });
        });
        $sid = -1;
        function getval(sel)
        {
            $sid = sel.value;
            $('#quantity').remove();
            $.ajax({
            url: "/api/quantity/"+$sid+"/" + $pid + "/"+$cid,
            type: 'GET',
            success: function(res) {
                console.log(res);
                    $form.append('<select name="quantity" id="quantity" class="form-control my-2" onchange="addCart(this);" ><option value="null" disabled selected>select quantity</option></select>')
                    // console.log(res[0].quantity);
                    for($i = 1;$i <= res[0].quantity;$i++){
                        $('#quantity')
                            .append($('<option>', { value : $i })
                            .text($i));
                    }
                    // $('#acart').show();
                }
            });

        }
        $quan = -1;
        function addCart(val){
            $quan = val.value;
            $('#acart').show();
        }
        
        function AddtoCart(){
            $.ajax({
            url: "/api/cart/"+$pid+"/"+$cid+"/"+$sid+"/"+$quan,
            type: 'GET',
            success: function(res) {
                $('#alert').show();
                $('#alert').text(res);
                }
            });
            $.ajax({
                url: "/api/total",
                type: 'GET',
                success: function(res) {
                    console.log(res);
                    $('#cc').text(res);
                }
            });
        }
    </script>
@endsection