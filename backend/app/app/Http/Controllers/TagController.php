<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        try{
            $tags = Tag::orderBy('id','desc')->get();
            return response()->json([
                'tags' => $tags,
                'success' => True
            ]);
        }catch (\Exception $exception) {
            return response()->json([
                'message' => 'تگی یافت نشد',
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
            Tag::create([
                'title' => $request->title,
                'user_id' => \Auth::user()->id
            ]);

            return response()->json([
                'message' => 'تگ ذخیره شد',
                'success' => True
            ]);
        }catch (\Exception $exception) {
            return response()->json([
                'message' => 'تگ ذخیره نشد',
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
            'tag_id' => 'required|numeric'
        ]);

        $Tag = Tag::where('id',$request->tag_id)->first();

        $user = \Auth::user();

        if (\Gate::forUser($user)->allows('update-Tag', $Tag)){
            
            $Tag->update([
                'title' => $request->title,
            ]);

            return response()->json([
                'message' => 'تگ شما آپدیت شد',
                'success' => True,
            ]);

        } else{
            return response()->json([
                'message' => 'شما به آپدیت این تگ دسترسی ندارید',
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
            'tag_id' => 'required|numeric'
        ]);

        $user = \Auth::user();

        $Tag = Tag::where('id',$request->tag_id)->first();

        if (\Gate::forUser($user)->allows('update-Tag', $Tag)){
            
            $Tag->delete();

            return response()->json([
                'message' => ' تگ شما حذف شد',
                'success' => True,
            ]);

        } else{
            return response()->json([
                'message' => 'شما به حذف این تگ دسترسی ندارید',
                'success' => True,
            ]);
        }
    }
}
