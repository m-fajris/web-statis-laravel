<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Pertanyaan;

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

        // $query = DB::table('pertanyaan')->insert([
        //     "judul" => $request["title"],
        //     "isi" => $request["body"],
        // ]);

        // $pertanyaan = new Pertanyaan;
        // $pertanyaan->judul = $request["title"];
        // $pertanyaan->isi = $request["body"];
        // $pertanyaan->save(); //insert into pertanyaan (judul, isi)

        $pertanyaan = Pertanyaan::create([
            "judul" => $request["title"],
            "isi" => $request["body"]
        ]);
        
        return redirect('/pertanyaan')->with('success', 'pertanyaan berhasil ditambahkan');
    }

    public function index() {
        // $pertanyaan = DB::table('pertanyaan')->get();
        // dd($pertanyaan);
        $pertanyaan = Pertanyaan::all();

        return view('pertanyaan.index', compact('pertanyaan'));
    }

    public function show($id) {
        // $post = DB::table('pertanyaan')->where('id', $id)->first();
        // dd($post);
        $post = Pertanyaan::find($id);

        return view('pertanyaan.show', compact('post'));
    }

    public function edit($id) {
        // $post = DB::table('pertanyaan')->where('id', $id)->first();
        $post = Pertanyaan::find($id);

        return view('pertanyaan.edit', compact('post'));
    }

    public function update($id, Request $request) {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        // $query = DB::table('pertanyaan')
        //             ->where('id', $id)
        //             ->update([
        //                 'judul' => $request['title'],
        //                 'isi' => $request['body']
        //             ]);
        $update = Pertanyaan::where('id', $id)->update([
            "judul" => $request["title"],
            "isi" => $request["body"]
        ]);

        return redirect('pertanyaan')->with('success', 'Berhasil update pertanyaan');
    }

    public function destroy($id){
        // $query = DB::table('pertanyaan')->where('id', $id)->delete();
        Pertanyaan::destroy($id);
        return redirect('pertanyaan')->with('success', 'Pertanyaan berhasil dihapus');
    }
}
