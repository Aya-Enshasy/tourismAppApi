<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Categories\newCategoryRequest;
use App\Http\Requests\Api\Categories\updateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
//        $categories = Category::select('id','name','is_cartable')->get();
        return response()->json($categories);
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
    public function store(newCategoryRequest $request)
    {
        Category::create($request->validated());
        return response()->json(['message'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function show($category){
        if($category) {
            return response()->json(['message'=>'success' , 'data'=> $category]);
        }else{
            return response()->json(['message' => 'this category does not exist']);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    public  function edit($category){
//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(updateCategoryRequest $request, $category)
    {
        if($category) {
            $category->update($request->validated());
            return response()->json(['message' => 'success' , 'data'=> $category]);
        }else{
            return response()->json(['message' => 'this category does not exist']);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function destroy($category)
    {
        if($category) {
            $category->delete();
            return response()->json(['message'=>'success']);
        }else{
            return response()->json(['message' => 'this category does not exist']);
        }
    }

}
