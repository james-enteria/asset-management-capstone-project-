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
        $catName = $request->input('category');
        //check if a category name was received asynchronously from assets.create
        if(isset($catName)){
            //check if data type is a string AND it is NOT empty
            if(gettype($catName) === "string" && $catName != ""){
                //find a duplicate entry
                $duplicate = Category::where('name', $catName)->first();
                //if no duplicates were found
                if($duplicate === null){
                    //sanitize the received form input
                    $cleanName = htmlspecialchars($catName);
                    //instantiate a new category object from the Category class
                    $category = new Category;
                    //set its name property to be the sanitized form input
                    $category->name = $cleanName;
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
                    'message' => "Category name cannot be an empty string"
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
    public function destroy(Category $category)
    {
        //
    }
}
