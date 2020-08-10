<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PertanyaanController extends Controller
{
    public function create() {
        return view('pertanyaan.create');
    }

    public function store(Request $request) {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $query = DB::table('pertanyaan')->insert([
            "judul" => $request["title"],
            "isi" => $request["body"],
        ]);

        return redirect('/pertanyaan')->with('success', 'pertanyaan berhasil ditambahkan');
    }

    public function index() {
        $pertanyaan = DB::table('pertanyaan')->get();
        // dd($pertanyaan);
        return view('pertanyaan.index', compact('pertanyaan'));
    }

    public function show($id) {
        $post = DB::table('pertanyaan')->where('id', $id)->first();
        // dd($post);
        return view('pertanyaan.show', compact('post'));
    }

    public function edit($id) {
        $post = DB::table('pertanyaan')->where('id', $id)->first();

        return view('pertanyaan.edit', compact('post'));
    }

    public function update($id, Request $request) {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $query = DB::table('pertanyaan')
                    ->where('id', $id)
                    ->update([
                        'judul' => $request['title'],
                        'isi' => $request['body']
                    ]);

        return redirect('pertanyaan')->with('success', 'Berhasil update pertanyaan');
    }

    public function destroy($id){
        $query = DB::table('pertanyaan')->where('id', $id)->delete();
        return redirect('pertanyaan')->with('success', 'Pertanyaan berhasil dihapus');
    }
}
