<?php

namespace App\Http\Controllers;

use App\Models\DanusanModel;
use App\Models\PenjualanModel;
use App\Models\TipePenjualanModel;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    private $tipe_penjualan;
    public function index()
    {
        $tipe_penjualan = TipePenjualanModel::all();
        $penjualan = PenjualanModel::paginate(31);
        return view('Admin.Penjualan.index', compact('tipe_penjualan', 'penjualan'));
    }
    public function create()
    {
        $tipe_penjualan = TipePenjualanModel::all();
        return view('Admin.Penjualan.create', compact('tipe_penjualan'));
    }
    public function store(Request $request)
    {
        $this->tipe_penjualan = $request->input('tipe_penjualan');

        $data = $request->validate([
            'tanggal_pembelian' => 'required|date',
            'tipe_penjualan' => 'required|exists:tipe_penjualan,id',
            'jumlah_bomboloni' => 'integer',
            'hpp' => 'numeric',
            'omzet' => 'numeric',
            'discounted_price' => 'nullable|numeric',
            'diskon' => 'nullable|exists:diskon,id',
            'status' => 'required|in:Belum Lunas,Lunas,Belum Dibayar,Reimburse',
            'net_profit' => 'numeric',
            'keterangan' => 'nullable|string',
        ]);

        if ($this->tipe_penjualan == 1) {
            PenjualanModel::create($data);
        } else {
            DanusanModel::create($data);
        }   

        return redirect()->route('penjualan.index')->with('success', 'Penjualan Berhasil Ditambahkan');
    }
    public function edit()
    {
    }
    public function update()
    {
    }
    public function delete()
    {
    }
}
