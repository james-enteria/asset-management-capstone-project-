<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Category;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assets = Asset::all();
        return view('assets.index')->with('assets', $assets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('assets.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        
        $rules = array(
            "name" => "required",
            "description" => "required",
            "serialNo" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "category" => "required"
        );

        //$this->validate($request, $rules);

        $asset = new Asset();
        $asset->name = $request->input('name');
        $asset->description = $request->input('description');
        $asset->serialNo = $request->input('serialNo');
        $asset->category_id = $request->input('category');

        // handle image file upload
        $image = $request->file('image');

        // set the file name 
        $file_name = time() . "." . $image->getClientOriginalExtension();
        $destination = "images/";
        $image->move($destination, $file_name);

        $asset->img_path = $destination.$file_name;

        if ($asset->save()) {
            $request->session()->flash('status', 'Asset successfully added!');
            return redirect("/assets/create");
        } else {
            $request->session()->flash('status', 'Asset not added.');
            return redirect("/assets/create");
        }
    }*/

    public function store(Request $request)
    {
        $quantity = $request->input('quantity');
        $category = Category::where('id', $request->input('category'))->first();

        $rules = array(
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "category" => "required"
        );



        $this->validate($request, $rules);

        // handle image file upload
        $image = $request->file('image');

        // set the file name 
        $file_name = time() . "." . $image->getClientOriginalExtension();
        $destination = "images/";

        

        //  $file = $image->move($destination, $file_name);
        // dd($file);   
        $img_path = $destination.$file_name;
        

        $validate = false;
        // Setting of Serial No.s
        for($i=0;$i<$quantity;$i++) {

            $serialNo = '#'.time().'-'.Asset::all()->count();

            $asset = new Asset();
            $asset->name = $request->input('name');
        $asset->description = $request->input('description');
            $asset->serialNo = $serialNo;
            $asset->category_id = $request->input('category');
            $asset->img_path = $img_path;


            if(!$asset->save()){
                $validate = true;
            }

        }
        

        $image->move($destination, $file_name);

        if ($validate == false) {
            $request->session()->flash('status', 'Asset successfully added!');
            return redirect("/assets/create");
        } else {
            $request->session()->flash('status', 'Asset not added.');
            return redirect("/assets/create");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asset = Asset::find($id);

        $categories = Category::all();

        return view('assets.edit')->with('asset', $asset)->with('categories', $categories); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            "name" => "required",
            "description" => "required",
            "serialNo" => "required",
            "image" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "category" => "required"
        );

        //$this->validate($request, $rules);

        $asset = Asset::find($id);
        $asset->name = $request->input('name');
        $asset->description = $request->input('description');
        $asset->serialNo = $request->input('serialNo');
        $asset->category_id = $request->input('category');
        $asset->isActive = true;

        // handle image file upload
        
        if($request->file('image') != null) {

            //handle image file upload

            $image = $request->file('image');

            //set the file name

            $file_name = time(). "." . $image->getClientOriginalExtension();

            $destination = "images/";

            $image->move($destination, $file_name);

            unlink(public_path(). '/' .$asset->img_path);

            $asset->img_path = $destination.$file_name;

        }
        if($asset->save()){
            $request->session()->flash('status', 'Product successfully updated');
            return redirect("/assets");
        }else{

            $request->session()->flash('status', 'Product not updated');
            return redirect("/assets");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asset = Asset::find($id);

        //toggle isActive from true to false and back

        if($asset->isActive === 1){

            $asset->isActive = 0;//setting isActive to false

            session()->flash('status', 'Asset deactivated');

        } else {

            //reactivate if currently deactivated

            $asset->isActive = 1;

            session()->flash('status', 'Asset reactivated');

        }

        $asset->save();

        return redirect("/assets");
    }
}
