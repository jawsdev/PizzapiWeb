<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use Illuminate\Support\Facades\Auth;
use App\User;
use Intervention\Image\ImageManagerStatic as Image;
use Laracasts\Flash\Flash;

class CurrentProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()    {
        $userId = Auth::id();
        $user_info = User::find($userId);

        $products = Product::all();
        return view('staff.current-products', ['user_info' => $user_info]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreateProduct()
    {
        $userId = Auth::id();
        $user_info = User::find($userId);


        return view('staff.products.create', ['user_info' => $user_info]);
    }
    public function getFilterProducts(Request $request)
    {
        $type = $request->type;

            $products = Product::where('type', $type)
            ->get();

        $htmlCode = view('staff.products.products_filtered', compact('products'))->render();

        return  $htmlCode;
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreateProduct(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'price' => 'required|digits_between:1,3',
            'description' => 'required',
            'type' => 'required|max:255',
            'code' => 'required|max:10',
            'product_image' => 'required',

        ]);

        $product = new Product;

        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->type = $request->input('type');
        $product->code = $request->input('code');

        try{

            if($request->hasFile('product_image')){
                $image = $request->file('product_image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('img/products/' . $filename);
                Image::make($image)->resize(400,null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($location);
                $product->imagePath = $filename;
            }
            $product->save();

            Flash::message('Product Created!');
            return redirect()->route('staff.products.create');

        } catch(\Exception $e){
            return redirect()->route('staff.products.create')->with('error', $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function postEditProduct(Request $request)
    {

        $userId = Auth::id();
        $user_info = User::find($userId);

        $id = $request->input('product_id');
        $product = Product::findOrFail($id);

        return view('staff.products.edit', ['product' => $product, 'user_info' => $user_info]);
    }

    public function getEditProduct(Request $request)
    {
        $userId = Auth::id();
        $user_info = User::find($userId);

        $id = $this->product($id);
        $product = Product::findOrFail($id);

        return view('staff.products.edit', ['user_info' => $user_info]);
    }



    public function getEditProductItem(Request $request)
    {
        $userId = Auth::id();
        $user_info = User::find($userId);

        return view('staff.products.edit', ['user_info' => $user_info]);
    }


    public function postEditProductItem(Request $request)
    {
        $userId = Auth::id();
        $user_info = User::find($userId);

        $this->validate($request, [
            'title' => 'required|max:255',
            'price' => 'required|digits_between:1,3',
            'description' => 'required',
            'type' => 'required|max:255',
            'code' => 'required|max:10',

        ]);
        $id = $request->input('product_id');
        $request->session()->put('id', $id);
        $product = Product::find($id);

        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->type = $request->input('type');
        $product->code = $request->input('code');

        try{

            if($request->hasFile('product_image')){
                $image = $request->file('product_image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('img/products/' . $filename);
                Image::make($image)->resize(400,null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($location);
                $product->imagePath = $filename;
                $product->save();
            } else {
                $product->imagePath = $request->input('stored_imagePath');
                $product->save();
            }

            Flash::message('Product Edited!');
            return redirect()->route('staff.current-products');

        } catch(\Exception $e){
            return View::make('staff.product.edits')
                ->with('id', Product::find($id));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postDeleteProduct(Request $request)
    {
        $id = $request->input('product_id');
        $product = Product::find($id);

        $product->delete();

        Flash::message('Product Deleted!');
        return redirect()->route('staff.current-products');
    }
}
