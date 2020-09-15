<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\ArticleUser;
use App\ReplyUser;
use App\Jobs\ProcessMail;
use App\Mail\SubscriptionMail;

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
        $user = Auth::user();
        return view('dashboard', compact('article','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('create', compact('user'));
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
        $user = Auth::user();
        $article = Article::findOrFail($id);
        $artUsers = ArticleUser::all();
        return view('view',compact('article', 'user', 'artUsers'));
    }

    public function mail()
    {
        $this->dispatch(new ProcessMail());
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $article = Article::findOrFail($id);
        if($user->id !== $article->user_id){
            return redirect()->back();
        }
        return view('edit',compact('article', 'user'));
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
