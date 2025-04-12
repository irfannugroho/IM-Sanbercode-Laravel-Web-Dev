<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class GenresController extends Controller
{
    public function create()
    {
        return view('genres.create');
    }

    public function store (Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'min:5' , 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ],
        [
            'name.required' => 'Nama genre wajib diisi.',
            'name.min' => 'Nama genre harus memiliki setidaknya 5 karakter.',
            'name.max' => 'Nama genre tidak boleh lebih dari 255 karakter.',
            'description.required' => 'Deskripsi genre wajib diisi.',
            'description.max' => 'Deskripsi genre tidak boleh lebih dari 255 karakter.',
        ]
    );
        $now = Carbon::now();


        DB::table('genres')->insert([
            'name'=> $request->input('name'),
            'description' => $request->input('description'),
            'created_at' => $now,
            'updated_at' => $now
        ]);

        return redirect('/genres');


    }

    public function index()
    {
        $genres = DB::table('genres')->get();
        return view('genres.view', ['genres' => $genres]);
    }

    public function show($id)
    {
        $genre = DB::table('genres')->where('id', $id)->first();
        return view('genres.detail', ['genre' => $genre]);
    }


    public function edit($id)
    {
        $genre = DB::table('genres')->where('id', $id)->first();
        return view('genres.edit', ['genre' => $genre]);

    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:5' , 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ],
        [
            'name.required' => 'Nama genre wajib diisi.',
            'name.min' => 'Nama genre harus memiliki setidaknya 5 karakter.',
            'name.max' => 'Nama genre tidak boleh lebih dari 255 karakter.',
            'description.required' => 'Deskripsi genre wajib diisi.',
            'description.max' => 'Deskripsi genre tidak boleh lebih dari 255 karakter.',
        ]
    );

        DB::table('genres')->where('id', $id)->update([
            'name'=> $request->input('name'),
            'description' => $request->input('description'),
            'updated_at' => Carbon::now()
        ]);

        return redirect('/genres');
    }

    public function destroy($id)
    {
        DB::table('genres')->where('id', $id)->delete();
        return redirect('/genres');
    }
    
}
