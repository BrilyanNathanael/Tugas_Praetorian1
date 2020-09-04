<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all();
        return view('dashboard', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gambar = $request->file('gambar');
        $name = time() . '.' . $gambar->getClientOriginalExtension();
        $gambar->move(public_path('storage/images'), $name);

        Article::create([
            'gambar' => $name,
            'judul' => $request->judul,
            'nama' => $request->nama,
            'description' => $request->description,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('view',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('edit',compact('article'));
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
        if($request->hasFile('gambar'))
        {
            $article = Article::where('id',$id)->first();
            Storage::delete('images/' . $article->gambar);

            $gambar = $request->file('gambar');
            $name = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('storage/images'), $name);

            Article::where('id', $id)
                ->update([
                    'judul' => $request->judul,
                    'nama' => $request->nama,
                    'description' => $request->description,
                    'gambar' => $name
            ]);
        }
        
        else
        {
            Article::where('id', $id)
                ->update([
                    'judul' => $request->judul,
                    'nama' => $request->nama,
                    'description' => $request->description,
            ]);
        }
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::where('id',$id)->first();
        Storage::delete('images/' . $article->gambar);
        
        Article::where('id',$id)->delete();
        return redirect('/');
    }
}
