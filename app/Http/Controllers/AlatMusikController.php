<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlatMusik;
use Illuminate\Support\Facades\Storage;
use PDF;

class AlatMusikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $alat_musiks = AlatMusik::where([
            ['name','!=',Null],
            [function($query)use($request){
                if (($term = $request->term)) {
                    $query->orWhere('name','LIKE','%'.$term.'%')
                          ->orWhere('description','LIKE','%'.$term.'%')
                          ->orWhere('price','LIKE','%'.$term.'%')->get();
                }
            }]
        ])
        ->orderBy('id','asc')
        ->simplePaginate(5);
        
        return view('produk.index' , compact('alat_musiks'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'file|image|mimes:jpeg,png,jpg',
            'price' => 'required',
        ]);
        if ($request->file('image')) 
        {
            $image_name = $request->file('image')->store('images', 'public');
            AlatMusik::create([
                'name'          => $request->name,
                'description'   => $request->description,
                'image'         => $image_name,
                'price'         => $request->price,
    
    
            ]);
        }

        

        // Fungsi eloquent untuk menambah data
        //AlatMusik::create($request->all());

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('produk.index')
            ->with('success', 'Produk Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Menampilkan detail data dengan menemukan/berdasarkan id_barang
        $alat_musiks = AlatMusik::find($id);
        return view('produk.detail', compact('alat_musiks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $alat_musiks = AlatMusik::find($id);
        return view('produk.edit', compact('alat_musiks'));
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
        // Melakukan validasi data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',

        ]);
        if ($request->image && file_exists(storage_path('app/public/' . $request->image)))
        {
            Storage::delete(['public/' .$request->image]);
        }
        $image_name = $request->file('image')->store('images', 'public');
        // Fungsi eloquent untuk mengupdate data inputan kita
        $update = AlatMusik::find($id);
        $update->name = $request->get('name');
        $update->description = $request->get('description');
        $update->image = $image_name;
        $update->price = $request->get('price');
        $update->save();

        // Jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('produk.index')
            ->with('success', 'Produk Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Fungsi eloquent untuk menghapus data
        AlatMusik::find($id)->delete();
        return redirect()->route('produk.index')
            -> with('success', 'Produk Berhasil Dihapus');
    }

    public function cetak_pdf(){
        $alat_musiks = AlatMusik::all();
        $pdf = PDF::loadview('produk.produk_pdf', ['alat_musiks'=>$alat_musiks]);
        return $pdf->stream();
    }

    public function tampil(Request $request){
        $alat_musiks = AlatMusik::where([
            ['name','!=',Null],
            [function($query)use($request){
                if (($term = $request->term)) {
                    $query->orWhere('name','LIKE','%'.$term.'%')
                          ->orWhere('description','LIKE','%'.$term.'%')
                          ->orWhere('price','LIKE','%'.$term.'%')->get();
                }
            }]
        ])
        ->orderBy('id','asc')
        ->simplePaginate(5);
        
        return view('users.index' , compact('alat_musiks'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

}
