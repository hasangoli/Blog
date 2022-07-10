<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $categories = Category::orderBy('id','desc')->get();
            return response()->json([
                'categories' => $categories,
                'success' => True
            ]);
        }catch (\Exception $exception) {
            return response()->json([
                'message' => 'دسته بندی یافت نشد',
                'success' => False
            ]);
        }
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
        $request->validate([
            'title' => 'required|string'
        ]);

        try{
            Category::create([
                'title' => $request->title,
                'user_id' => \Auth::user()->id
            ]);

            return response()->json([
                'message' => 'دسته بندی ذخیره شد',
                'success' => True
            ]);
        }catch (\Exception $exception) {
            return response()->json([
                'message' => 'دسته بندی ذخیره نشد',
                'success' => False
            ]);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'category_id' => 'required|numeric'
        ]);

        $user = \Auth::user();

        $category = Category::where('id',$request->category_id)->first();

        if (\Gate::forUser($user)->allows('update-category', $category)){
            
            $category->update([
                'title' => $request->title,
            ]);

            return response()->json([
                'message' => 'داداش دسته بندی شما آپدیت شد',
                'success' => True,
            ]);

        } else{
            return response()->json([
                'message' => 'شما به آپدیت این دسته بندی دسترسی ندارید',
                'success' => True,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $request->validate([
            'category_id' => 'required|numeric'
        ]);

        $user = \Auth::user();

        $category = Category::where('id',$request->category_id)->first();

        if (\Gate::forUser($user)->allows('update-category', $category)){
            
            $category->delete();

            return response()->json([
                'message' => ' دسته بندی حذف شد',
                'success' => True,
            ]);

        } else{
            return response()->json([
                'message' => 'شما به حذف این دسته بندی دسترسی ندارید',
                'success' => True,
            ]);
        }
    }
}
