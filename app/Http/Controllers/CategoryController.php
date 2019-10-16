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
        //
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
        /*$request->validate([
            'category' => 'bail|required|alpha_num|unique:categories,name'
        ]);*/
        $catName = $request->input('category');
        if(isset($catName)){
            if(gettype($catName) === "string" && $catName != ""){
                $cleanName = htmlspecialchars($catName);
                $category = new Category;
                $category->name = $cleanName;
                if($category->save()){
                    return response()->json([
                        'message' => "Category added successfully",
                        'data' => "<option value=\"$category->id\">$category->name</option>"
                    ], 201);
                }else{
                    return response()->json([
                        'message' => "Failed to save new category."
                    ]);
                }
            }else{
                return response()->json([
                    'message' => "Category name cannot be an empty string"
                ]);
            }
        }else{
            return response()->json([
                'message' => "Failed to submit new category."
            ]);
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
