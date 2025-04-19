<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\books;
use App\Models\genres;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Middleware\IsAdmin;


class BooksController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware(['auth', IsAdmin::class], except: ['index', 'show']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Books = books::with('genre')->get(); 
        return view('books.view', ['books' => $Books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = genres::all();
        return view('books.create', ['genres' => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'genres_id' => [
                        'required',
                        'integer',
                        'exists:genres,id'
                       ],
            'title' => [
                        'required',
                        'string',
                        'max:255'
                       ],
            'summary' => [
                        'required',
                        'string'
                       ],
            'stok' => [
                        'required',
                        'integer',
                       ],
            'image' => [
                        'required',
                        'image',
                        'mimes:jpg,png,jpeg,gif,svg',
                        'dimensions:min_width=100,min_height=100',
                        'max:2048'
                       ],
        ]);
        
        $imageName = time().'.'.$request->image->extension();  
         
        $request->image->move(public_path('images'), $imageName);

        //insert database
        books::create([
            'genres_id' => $request->genres_id,
            'title' => $request->title,
            'summary' => $request->summary,
            'stok' => $request->stok,
            'image' => $imageName
        ]);
        return redirect('/books');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Books = books::find($id);
        
        $genres = genres::all();
        $recentpost = books::orderBy('updated_at', 'desc')->limit(10)->get(); 

        return view('books.detail', ['books' => $Books, 'genres' => $genres, 'recentpost' => $recentpost]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Books = books::find($id);
        $genres = genres::all();
        return view('books.edit', ['books' => $Books, 'genres' => $genres]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'genres_id' => [
                        'required',
                        'integer',
                        'exists:genres,id'
                       ],
            'title' => [
                        'required',
                        'string',
                        'max:255'
                       ],
            'summary' => [
                        'required',
                        'string'
                       ],
            'stok' => [
                        'required',
                        'integer',
                       ],
            'image' => [
                        'image',
                        'mimes:jpg,png,jpeg,gif,svg',
                        'dimensions:min_width=100,min_height=100',
                        'max:2048'
                       ],
        ]);

        $Books = books::find($id);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $Books->image = $imageName;
        }

        //update database
        $Books->genres_id = $request->genres_id;
        $Books->title = $request->title;
        $Books->summary = $request->summary;
        $Books->stok = $request->stok;
        $Books->save();

        return redirect()->route('books.show', $id)->with('success', 'Buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = books::find($id);
    
        if (!$book) {
            return redirect()->route('books.index')->with('error', 'Buku tidak ditemukan.');
        }
    
        // Hapus komentar terkait
        $book->comments()->delete();
    
        // Hapus buku
        $book->delete();
    
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}
