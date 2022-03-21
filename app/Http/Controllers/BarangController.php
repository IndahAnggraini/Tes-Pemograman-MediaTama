<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tb_barang;

class BarangController extends Controller
{
    //
    public function index() {
        return view('Tabel.barang');
    }

    public function tambah(Request $r) {
        $data = json_decode($r->list_form_to_php,true);

        $Tb_barang = Tb_barang::create([
            'nama_barang' => $data['nama_barang'],
            'jumlah' => $data['jumlah'],
            'harga' => $data['harga']
        ]);

        return "Berhasil tambahan data";
    }

    public function get() {
        return view('Tabel.semua_barang');
    }

    public function get_db() {
        return Tb_barang::get();
    }

    public function hapus($id) {
        Tb_barang::where('id_barang', $id)->delete();

        return "Berhasil hapus";
    }

    public function editt($id){
        return view('Tabel.edit_barang')->with(['id_barang' => $id]);
    }

    public function fetch($id) {
        return Tb_barang::where('id_barang', $id)->get();
    }

    public function submit(Request $r) {
        $data = json_decode($r->edit_form,true);

        Tb_barang::where('id_barang', $data[0]['id_barang'])->update([
            'nama_barang' => $data[0]['nama_barang'],
            'jumlah' => $data[0]['jumlah'],
            'harga' => $data[0]['harga']
        ]);

        return "berhasil";
    }
}
