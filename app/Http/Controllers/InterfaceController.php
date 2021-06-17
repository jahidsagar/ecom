<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Size;
use App\Models\Scale;
use App\Models\Weight;
use App\Models\Category;
use App\Models\Brandname;
use App\Models\Product;
use App\Models\Image;
use App\Models\Prodetail;
use App\Models\Carts;
use App\Models\User;

class InterfaceController extends Controller
{
    //
    public function store(Request $request)
    {
        $base = $request->interface;
        $val = $request->name;
        if($base === "color"){
            $obj = new Color;
            $obj->name = $request->name;
            $obj->save();
            
            return redirect('/color')->with('message', 'Successfully stored !');
        }
        if($base === "size"){
            $obj = new Size;
            $obj->name = $request->name;
            $obj->save();
            return redirect('/size')->with('message', 'Successfully stored !');
        }
        if($base === "weight"){
            $obj = new Weight;
            $obj->KgorLiter = $request->name;
            $obj->save();
            return redirect()->to('/weight')->with('message', 'Successfully stored !');
        }
        if($base === "scale"){
            $obj = new Scale;
            $obj->name = $request->name;
            $obj->save();
            return redirect()->to('/scale')->with('message', 'Successfully stored !');
        }
        if($base === "brand"){
            $obj = new Brandname;
            $obj->name = $request->name;
            $obj->country = $request->country;
            $obj->save();
            return redirect()->to('/brand')->with('message', 'Successfully stored !');
        }
        return redirect()->to('/interface')->with('message', 'Try again later !!!!');
        // return response()->json(['success'=>'Ajax request submitted successfully']);
    }

    public function store_category(Request $request)
    {
        $obj = new Category;
        $obj->name = $request->name;
        $obj->save();
        return redirect()->to('/category')->with('message', 'Successfully stored !');
    }

    public function colors(){
        return view('interface',['colors'=> Color::all()]);
    }
    public function sizes(){
        return view('interface',['colors'=> Size::all()]);
    }
    public function weights(){
        return view('interface',['colors'=> Weight::all()]);
    }
    public function scales(){
        return view('interface',['colors'=> Scale::all()]);
    }
    public function brands()
    {
        return view('interface',['brand'=> Brandname::all()]);
    }
    
    public function categories(Type $var = null)
    {
        return view('category',['colors'=> Category::all()]);
    }

    public function products()
    {
        return view('product');
    }
    public function store_product(Request $request)
    {
        $obj = new Product;
        $obj->name = $request->name;
        $obj->price =  $request->price;
        $obj->discount =  $request->discount;
        $obj->description =  $request->description;
        $obj->save();

        if($request->hasFile('image1')){
            $imageName = uniqid().'.'.$request->image1->extension();
            $request->image1->move(public_path('images'), $imageName);
            $img = new Image;
            $img->product_id = $obj->id;
            $img->link = $imageName;
            $img->save();
        }
        if($request->hasFile('image2')){
            $imageName = uniqid().'.'.$request->image2->extension();
            $request->image2->move(public_path('images'), $imageName);

            $img = new Image;
            $img->product_id = $obj->id;
            $img->link = $imageName;
            $img->save();
        }
        if($request->hasFile('image3')){
            $imageName = uniqid().'.'.$request->image3->extension();
            $request->image3->move(public_path('images'), $imageName);


            $img = new Image;
            $img->product_id = $obj->id;
            $img->link = $imageName;
            $img->save();
        }
        if($obj->id){
            return redirect()->to('/modify/'.$obj->id)->with('message', 'Successfully stored !');
        }
        return redirect()->to('/product')->with('message', '<b class="text-danger"> Some error occured !!!</b>');
        
    }

    public function modify($id)
    {
        $img = DB::table('images')->where('product_id', $id)->pluck('link');
        $prod = DB::table('products')->where('id', $id)->first();
        return view('modify',
            [
                'product'=>Product::find($id),
                'img'=>$img,
                'color'=>Color::all(),
                'size'=> Size::all(),
                'scale'=>Scale::all(),
                'weight'=>Weight::all(),
                'category'=>Category::all(),
                'brand'=>Brandname::all()

            ]
        );
    }
    public function productDetails($id)
    {
        $img = DB::table('images')->where('product_id', $id)->pluck('link');
        $prod = DB::table('products')->where('id', $id)->first();
        return ([
                'product'=>Product::find($id),
                'img'=>$img,
                'color'=>Color::all(),
                'size'=> Size::all(),
                'scale'=>Scale::all(),
                'weight'=>Weight::all(),
                'category'=>Category::all(),
                'brand'=>Brandname::all()

            ]);
    }
    public function store_product_details(Request $request)
    {							

        $obj = new Prodetail;
        $obj->product_id = $request->proid ;
        $obj->color_id = $request->color ;
        $obj->size_id = $request->size ;
        $obj->scale_id = $request->scale ;
        $obj->brand_id = $request->brand ;
        $obj->weight_id = $request->weight ;
        $obj->category_id = $request->category ;
        $obj->quantity = $request->quantity ;
        if($obj->save()){
            return redirect()->to('/product')->with('message', 'Successfully stored !');
        }
        return redirect()->to('/product')->with('message', 'Try again later !!!');
    }
    public function allproduct()
    {
        $allval = Product::all();
        foreach($allval as $single){
            $img = DB::table('images')
                    ->where('product_id',$single->id)
                    ->get();
            $temp[] = [
                'id'=>$single->id,
                'name'=>$single->name,
                'price'=>$single->price,
                'discount'=>$single->discount,
                'desc'=>$single->description,
                'img'=>$img
            ];
        }
        return view('allproduct',['products'=>$temp]);
    }

    public function viewproduct()
    {
        $allval = Product::all();
        foreach($allval as $single){
            $img = DB::table('images')
                    ->where('product_id',$single->id)
                    ->get();
            $temp[] = [
                'id'=>$single->id,
                'name'=>$single->name,
                'price'=>$single->price,
                'discount'=>$single->discount,
                'desc'=>$single->description,
                'img'=>$img
            ];
        }
        // return $temp;
        return view('index',['products'=>$temp,'cat'=>Category::all(),'total'=>$this->total_cart()]);
    }
    public function detailsPage($id)
    {
        $allval = Product::where('id',$id)->first();
         $img = DB::table('images')
                    ->where('product_id',$id)
                    ->get();
        $users = DB::table('prodetails')
                ->where('product_id',$id)
                ->get();
                
        
        foreach($users as $pro){
            $color = Color::find($pro->color_id);
            $c[] = ['id'=>$color->id,'name'=> $color->name];
        }
        // return $c;
        return view('details',['product'=>$allval,'img'=>$img,'color'=>$c,'cat'=>Category::all(),'total'=>$this->total_cart()]);
    }

    public function size_api($pid,$cid)
    {
        $pdetails = DB::table('prodetails')
                ->where('product_id',$pid)
                ->where('color_id',$cid)
                ->get();

        foreach($pdetails as $pro){
            $size = Size::find($pro->size_id);
            $c[] = ['id'=>$size->id,'name'=> $size->name];
        }
        return $c;
    }
    public function quantity_api($sid,$pid,$cid)
    {
        $pdetails = DB::table('prodetails')
                ->where('product_id',$pid)
                ->where('size_id',$sid)
                ->where('color_id',$cid)
                ->get();
        return $pdetails;
    }
    public function cart($pid,$cid,$sid,$quan)
    {
        $pdetails = DB::table('prodetails')
                ->where('product_id',$pid)
                ->where('size_id',$sid)
                ->where('color_id',$cid)
                ->get();
        $obj = new Carts;
        $obj->ip = \Request::ip();
        $obj->prodetails_id = $pdetails[0]->id;
        $obj->quantity = $quan;
        if($obj->save()){
            return "added successfully !";
        }

        return "Try again later !!!";
    }

    public function total_cart()
    {
        $pdetails = DB::table('carts')
                ->where('ip',\Request::ip())
                ->get();
        return count($pdetails);
    }

    public function cart_details()
    {
        $pdetails = DB::table('carts')
                ->where('ip',\Request::ip())
                ->get();
        foreach ($pdetails as $key) {
            $t = Prodetail::find($key->prodetails_id);
            $u = Product::find($t->product_id);

            $bag[] = [
                'name'=>$u->name,
                'price'=>$u->price - $u->price*($u->discount/100),
                'quan'=>$key->quantity
            ];
        }
        // return $bag;
        return view('cart',['cat'=>Category::all(),'bag'=>$bag]);
    }

    public function signinUser(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        }
        return redirect('/');
    }
    public function registration(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|min:5',
        //     'email' => 'required|unique:users',
        //     'password' => 'required|confirmed|min:8',
        //     'birthday' => 'required',
        //     'gender' => 'required',
        //     'latitude' => 'required',
        //     'longitude' => 'required'
        // ]);
        // validation successfull and redirect to signin
        $user = new User();
        $user->saveUser($request);
        return redirect('/signin');
    }
}
