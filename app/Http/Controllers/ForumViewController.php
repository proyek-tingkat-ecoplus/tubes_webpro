<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ForumViewController extends Controller
{
    public function index()
    {
        // Load forums with user relationship
        $forums = Forum::with(['user', 'comments'])->latest()->get();

        // Pass forums to view
        return view('form', compact('forums'));
    }

    public function create()
    {
        // Load forums with user relationship
        $forums = Forum::with(['user', 'comments'])->latest()->get();

        // Pass forums to view
        return view('tambahpesan', compact('forums'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    Forum::create([
        'name' => $request->name,
        'description' => $request->description,
        'slug' => Str::slug($request->name),
        'user_id' => null, // Pastikan user_id diisi dengan NULL jika tidak ada login
    ]);

    return redirect('/forum')->with('success', 'Forum berhasil ditambahkan!');
}

    public function destroy($id){
        $forums = Forum::find($id);
        if(!$forums){
            return redirect('/forum')->with('error', 'Forum Tidak Ditemukan');
        }
        $forums->delete();
        return redirect('/forum')->with('success', 'Forum Berhasil Dihapus');
    }

}
