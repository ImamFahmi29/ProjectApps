<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Session;
use File;
use App\Http\Requests\ArticleRequest;
class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
       
        $this->middleware('sentinel');
        $this->middleware('sentinel.role');
    }

    public function index(Request $request)
    {
        // if ($request->ajak()) {
        //     $articles = Article::where('title','like','%'.$request->keywords.'%')->orWhere('content','like','%'.$request->keywords.'%');
        //     if ($request->direction) {
        //         $articles=$articles->orderBy('id',$request->direction)
        //     }
        //     $articles = $articles->paginate(3);
        //     $request->direction == 'asc' ? $direction = 'desc' :$direction = 'asc';
        //     $request->keywords == '' ? $keywords = '' : $keywords = $request->keywords;
        //     $view =(string) view('articles.list')
        //     ->with('articles',$articles)
        //     ->render();
        //     return response()->json(['view' => $view, 'direction' => $direction, 'keywords'=> $keywords, 'status'=>'success']);
        // } else {
        //     $articles=Article::paginate(3);
        //     return view('articles.index')
        //     ->with('articles',$articles)
        // }
        // $articles = Article::paginate(3);
        $articles = Article::latest()->get();
        return view('articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest  $request)
    {
        $input['title'] = $request->title;
        $input['content'] = $request->content;
        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);
        Article::create($input);
        Session::flash("notice", "Article success created");
        return redirect()->route("articles.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $article = Article::find($id);
       $comments = Article::find($id)->comments->sortBy('Comment.created_at');
        return view('articles.show')
        ->with('article', $article)
        ->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit')->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hasil=Article::find($id);
        $input['title'] = $request->title;
        $input['content'] = $request->content;
        $input['image'] = $hasil->image;
        if ($request->image !=null) {
            $request->image->move(public_path('images'), $input['image']);
        }
        Article::find($id)->update($input);
        Session::flash("notice", "Article success updated");
        return redirect()->route("articles.show", $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hasil=Article::find($id);
        if(\File::exists(public_path('images/'.$hasil->image)))
        {
            \File::delete(public_path('images/'.$hasil->image));
        }
       $hasil = comment::findOrFail($id);
        $hasil->delete();
        return response()->json($hasil);
    }
}
