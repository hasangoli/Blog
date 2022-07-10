<?php

namespace App\Http\Controllers\Backend;

use App\Helper\File;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Country;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\Response;
use Exception;

class ArticleController extends Controller
{

    public $file;

    public function __construct()
    {

        $this->file = new File();;
    }

    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->get();
        return view('admin.articles.index', compact('articles'));
    }


    public function create()
    {
        $categories = Category::query()->where('modelType', 'article')->get();
        $countries = Country::query()->get();
        return view('admin.articles.create', compact(['categories', 'countries']));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'slug' => 'nullable|string',
            'description' => 'required|string',
            'image' => 'required|mimes:jpeg,png',
            'category_id' => 'required|int',
            'country_id' => 'required|int',
        ]);

        try {

            $imageUrl = $this->file->UploadFile('articles', $request->file('image'));

            $slug = $request->slug ? str_replace(' ', '-', $request->slug) : str_replace(' ', '-', $request->title);

            $article = Article::create([
                'title' => $request->title,
                'description' => $request->description,
                'slug' => $slug,
                'type' => $request->type,
                'category_id' => $request->category_id,
                'country_id' => $request->country_id,
            ]);

            $article->image()->create([
                'title' => $imageUrl
            ]);



            Toastr::success('message', 'article created successfully');
            return redirect(route('admin.articles.index'));
        } catch (\Exception $exception) {
            Toastr::error('message', 'article created failed');
            return back();
        }
    }


    public function show($id)
    {
        //
    }


    public function edit(Article $article)
    {
        $categories = Category::query()->where([
            'modelType' => 'article',
            'type' => $article->type,
        ])->get();
        $countries = Country::query()->get();
        return view('admin.articles.edit', compact(['article', 'categories', 'countries']));
    }


    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string',
            'slug' => 'nullable|string',
            'description' => 'required|string',
            'image' => 'mimes:jpeg,png',
        ]);

        try {

            $slug = $request->slug ? str_replace(' ', '-', $request->slug) : str_replace(' ', '-', $request->title);

            if ($request->image) {
                $oldImage = $article->image()->first();

                $imageUrl = $this->file->UpdateFile('articles', $oldImage->title, 'articles', $request->file('image'));
                $article->image()->update([
                    'title' => $imageUrl
                ]);
            }
            $article->update([
                'title' => $request->title,
                'slug' => $slug,
                'type' => $request->type,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'country_id' => $request->country_id,
            ]);

            Toastr::success('message', 'article updated successfully');
            return redirect(route('admin.articles.index'));
        } catch (\Exception $exception) {
            Toastr::error('message', 'article updated failed');
            return back();
        }
    }


    public function destroy(Article $article)
    {
        try {
            $image = $article->image()->first();
            $article->image()->delete();
            $this->file->DeleteFile('articles', $image->title);
            $article->delete();
            Toastr::success('message', 'article deleted successfully');
            return redirect(route('admin.articles.index'));
        } catch (\Exception $exception) {
            Toastr::error('message', 'article deleted failed');
            return back();
        }
    }

    public function getCategories(Request $request)
    {
        $categories = Category::where([
            'type' => $request->type,
            'modelType' => 'article'
        ])->get();
        return \response()->json($categories);
    }
}
