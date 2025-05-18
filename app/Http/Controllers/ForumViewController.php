<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Jorenvh\Share\Share;

class ForumViewController extends Controller
{
    public function index()
    {
        // Load forums with user relationship
        $forums = Forum::with(['user', 'comments'])->latest()->paginate(2);
        $mostCommented = Forum::withCount('comments')->orderBy('comments_count',"DESC")->limit(5)->get();
        // Pass forums to view
        return view('user.forum.index', compact('forums','mostCommented'));
    }

    public function create()
    {
        // Load forums with user relationship
        $forums = Forum::with(['user', 'comments'])->latest()->get();

        // Pass forums to view
        return view('user.forum.add', compact('forums'));
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content__' => 'required|string',
        'author' => 'required|string',
    ]);

    $user = null;
    if($request->user){
        $user = User::where('id', $request->user)->first();
    }

    Forum::create([
        'guest_author' => $request->author,
        'name' => $request->title,
        'description' => $request->content__,
        'slug' => Str::slug($request->title),
        'user_id' => $user->id ?? null, // Pastikan user_id diisi dengan NULL jika tidak ada login

    ]);
    return redirect()->route('forums.index')->with('success', 'Forum berhasil ditambahkan!');
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|string|max:255',
            'content__' => 'required|string',
            'author' => 'required|string',
        ]);

        $forum = Forum::find($id);
        $forum->name = $request->title;
        $forum->description = $request->content;
        $forum->save();
        return redirect()->route('forums.index')->with('success','Forum berhasil di update');
    }

    public function comment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string',
            'user_id' => 'required|integer',
        ]);
        $forum = Forum::find($id);
        $forum->comments()->create([
            'user_id' => $request->user_id, // Pastikan user_id diisi dengan NULL jika tidak ada login
            'content__' => $request->comment,
        ]);
        return redirect()->route('forums.index')->with('success', 'Komentar berhasil ditambahkan!');
    }

    public function edit(Request $request, $id){
        $forum = Forum::find($id);
        return view('user.forum.edit', compact('forum'));
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
