<?php

namespace App\Http\Controllers;

use App\Helper\File;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class ArticleController extends Controller
{
    public $file;

    public function __construct()
    {
        $this->file = new File();;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $articles = Article::orderBy('id', 'desc')->paginate(3);

            foreach ($articles as $article){
                $article->image = 'storage/articles/'.$article->image;
            }

            return \response()->json([
                'articles' => $articles,
                'success' => True,
            ]);
        }catch(\Exception $exception){
            return \response()->json([
                'message' => 'مقاله ای وجود ندارد',
                'success' => False,
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
            'title' => 'required|string',
            'slug' => 'nullable|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'required|numeric',
            'tags' => 'required|array',
            'image' => 'required|mimes:jpeg,png',
        ]);

        try {

            $imageUrl = $this->file->UploadFile('articles', $request->file('image'));

            $slug = $request->slug ? str_replace(' ', '-', $request->slug) : str_replace(' ', '-', $request->title);

            $article = Article::create([
                'title' => $request->title,
                'description' => $request->description,
                'slug' => $slug,
                'content' => $request->content,
                'category_id' => $request->category_id,
                'image' => $imageUrl,
                'user_id' => \Auth::user()->id,
            ]);
            // dd($request->tags);
            $article->tags()->attach($request->tags);

            return response()->json([
                'message' => 'مقاله ذخیره شد',
                'success' => True,
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'مقاله ذخیره نشد',
                'success' => False,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        try{

            $request->validate([
                'article_id' => 'required|numeric'
            ]);

            $article = Article::where('id',$request->article_id)->first();

            $article->image = 'storage/articles/'.$article->image;
            $article->category = $article->category;
            $article->tags = $article->tags;
            $article->comments = $article->comments;

            return response()->json([
                'article' => $article,
                'success' =>True,
            ]);
        }catch(\Exception $exception){
            return response()->json([
                'message' => 'مقاله وجود ندارد',
                'success' =>False,
            ]);
        }
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
            'slug' => 'nullable|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|mimes:jpeg,png',
            'tags' => 'required|array',
            'category_id' => 'required|numeric',
            'article_id' =>'required|numeric'
        ]);

        try {
            
            $user = \Auth::user();

            $article = Article::where('id',$request->article_id)->first();

            if (\Gate::forUser($user)->allows('update-article', $article)){

                $slug = $request->slug ? str_replace(' ', '-', $request->slug) : $article->slug;

                if ($request->image) {
                    $oldImage = $article->image;
                    
                    $imageUrl = $this->file->UpdateFile('articles', $oldImage, 'articles', $request->file('image'));
                }else{
                    $imageUrl = $article->image;
                }
                $article->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'slug' => $slug,
                    'content' => $request->content,
                    'category_id' => $request->category_id,
                    'image' => $imageUrl,
                ]);

                $article->tags()->sync($request->tags);

                return response()->json([
                    'message' => 'داداش مقاله شما آپدیت شد',
                    'success' => True,
                ]);
            } else{
                return response()->json([
                    'message' => 'شما به آپدیت این مقاله دسترسی ندارید',
                    'success' => True,
                ]);
            }

        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'داداش یه جای کار میلنگه',
                'success' => False,
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
            'article_id' => 'required|numeric'
        ]);

        try {

            $article = Article::where('id',$request->article_id)->first();

            $user = \Auth::user();

            if (\Gate::forUser($user)->allows('update-article', $article)){ 
                $this->file->DeleteFile('articles', $article->image);
                $article->delete();

                return response()->json([
                    'message' => 'مقاله شما حذف شد',
                    'success' => True,
                ]);
            } else{
                return response()->json([
                    'message' => 'شما به حذف این مقاله دسترسی ندارید',
                    'success' => True,
                ]);
            }

        } catch (\Exception $exception) {

            return response()->json([
                'message' => 'مقاله حذف نشد',
                'success' => False,
            ]);

        }
    }

    public function comments(Request $request)
    {

        $request->validate([
            'message' => 'required|string',
            'article_id' => 'required|numeric'
        ]);

        try{
            Comment::create([
                'message' => $request->message,
                'article_id' => $request->article_id,
                'user_id' => \Auth::user()->id
            ]);

            return response()->json([
                'message' => 'کامنت شما ثبت شد',
                'success' => True,
            ]);
        }catch (\Exception $exception) {
            return response()->json([
                'message' => 'کامنت شما ثبت نشد',
                'success' => False
            ]);
        }


    }
}
