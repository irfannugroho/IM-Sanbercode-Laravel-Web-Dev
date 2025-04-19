<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Comment;


class CommentsController extends Controller
{
    public function storeComment(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        // Simpan komentar ke database
        Comment::create([
            'content' => $request->input('content'),
            'user_id' => Auth::user()->id, 
            'book_id' => $id,
        ]);

        // Redirect kembali ke halaman detail buku
        return redirect()->route('books.show', $id)->with('success', 'Komentar berhasil ditambahkan!');
    }
}
