<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');


        
        
        /*return response()->json([
            'data' => $request->hasFile('image')
        ]);*/
        //check if all expected category information were received asynchronously from assets.create
        if(isset($name) && isset($description) && $request->hasFile('image')){
            //declare $image variable
            $image = $request->file('image');
            //check if data types are correct and none are empty strings
            if((gettype($name) === "string" && $name != "") && (gettype($description) === "string" && $description != "")  && (strtolower($image->getClientOriginalExtension()) === "jpeg" || strtolower($image->getClientOriginalExtension()) === "jpg" || strtolower($image->getClientOriginalExtension()) === "png")){
                //find a duplicate entry
                $duplicate = Category::where(strtolower('name'), strtolower($name))->first();
                //if no duplicates were found
                if($duplicate === null){
                    //sanitize the received form input
                    $cleanName = htmlspecialchars($name);
                    $cleanDescription = htmlspecialchars($description);
                    //instantiate a new category object from the Category class
                    $category = new Category;
                    //set its name property to be the sanitized form input
                    $category->name = $cleanName;
                    $category->description = $cleanDescription;

                    //handle image file upload
                    $file_name = time() . "." . $image->getClientOriginalExtension();
                    $destination = "images/";
                    $image->move($destination, $file_name);

                    $category->img_path = $destination.$file_name;

                    //if successfully saved
                    if($category->save()){
                        //return a json response with HTTP status code 201
                        return response()->json([
                            //the json response will have a message property
                            'message' => "Category added successfully",
                            //and a data property containing the HTML <option> element that will be appended to the <select> element on the create page
                            'data' => "<option value=\"$category->id\">$category->name</option>"
                        ], 201);
                    }else{//failed to save, return json response with HTTP status code 500
                        return response()->json([
                            'message' => "Failed to save new category."
                        ], 500);
                    }
                }else{//duplicate found, return json response with HTTP status code 403
                    return response()->json([
                        'message' => "Category already exists."
                    ], 403);
                }
            }else{//empty string submitted, return json response with HTTP status code 403
                return response()->json([
                    'message' => "Category name, description, and code name cannot be empty strings. Also, image file type nhas to be jpeg, jpg, or png."
                ], 403);
            }
        }else{//no category received from view, return json response with HTTP status code 500
            return response()->json([
                'message' => "Failed to submit new category."
            ], 500);
        }
        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        //toggle isActive from true to false and back

        if($category->isActive === 1){

            $category->isActive = 0;//setting isActive to false

            session()->flash('status', 'Category deactivated');

        } else {

            //reactivate if currently deactivated

            $category->isActive = 1;

            session()->flash('status', 'Category reactivated');

        }

        $category->save();

        return redirect("/categories");
    
    }
}
