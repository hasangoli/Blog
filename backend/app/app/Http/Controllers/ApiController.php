<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\File;

class ApiController extends Controller
{
    public function search(Request $request){
        

        $request->validate([
            'categoryId' => 'nullable|numeric',
            'searchText' => 'nullable|string',
        ]);

        $filter = [];

        $filter=$request->categoryId ? array_merge($filter,[['category_id',$request->categoryId]]) : $filter ;
        $filterTitle=$request->searchText ? array_merge($filter,[['title','LIKE', '%' . $request->searchText . '%']]) : $filter ;
        $filterDescription=$request->searchText ? array_merge($filter,[['description','LIKE', '%' . $request->searchText . '%']]) : $filter ;
        
        $articles = Article::where($filterTitle)->orwhere($filterDescription)->latest()->paginate(3);

        return response()->json([
            'articles' => $articles,
            'success' => True
        ]);

    }
}
