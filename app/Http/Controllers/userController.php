<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\OrderLayanan;
use Illuminate\Http\Request;

class userController extends Controller
{
    //

    public function index()
    {
        $data = Layanan::all();
        return view('user.index', compact('data'));
    }

    public function getLayanan(Request $request)
    {
        $cid = $request->post('cid');
        $layanan = Layanan::where('kategori', $cid)->get();
        $html = '<option value="">--Pilih satu--</option>';
        foreach ($layanan as $item) {
            $html .= '<option value="' . $item->layanan . '">' . $item->layanan . '</option>';
        }
        return $html;
    }

    public function getDesk(Request $request)
    {
        $cid = $request->post('cid');
        $cud = $request->cud;
        $layanan = Layanan::where('kategori', $cud)
            ->where('layanan', $cid)
            ->get();
        $html = '';
        foreach ($layanan as $item) {
            $html .= '<span class="form-control" id="b" style="height:auto">' . $item->desklay . '</>';
            // $html .= '<input type="number" class="d-none" id="" name="">';
        }
        return $html;
    }
    public function getHarga(Request $request)
    {
        $cid = $request->post('cid');
        $cud = $request->cud;
        $layanan = Layanan::where('kategori', $cud)
            ->where('layanan', $cid)
            ->get();
        $html = ' ';
        foreach ($layanan as $item) {
            $html .= '<span class="form-control" id="a">' . number_format($item->hargaperk) . '</span>';
            $html .= '<input type="number" class="d-none" id="ab" name="hargaperk" value="' . $item->hargaperk . '">';
            $html .= '<input type="number" class="d-none" id="realpr" value="' . $item->harga . '">';
        }
        return $html;
    }
    public function getMin(Request $request)
    {
        $cid = $request->post('cid');
        $cud = $request->cud;
        $layanan = Layanan::where('kategori', $cud)
            ->where('layanan', $cid)
            ->get();
        $html = ' ';
        foreach ($layanan as $item) {
            $html .= '<span class="form-control" id="c">' . number_format($item->minimal) . '</span>';
            $html .= '<input type="number" class="d-none" id="cd" name="min" value="' . $item->minimal . '">';
        }
        return $html;
    }
    public function getMax(Request $request)
    {
        $cid = $request->post('cid');
        $cud = $request->cud;
        $layanan = Layanan::where('kategori', $cud)
            ->where('layanan', $cid)
            ->get();
        $html = ' ';
        foreach ($layanan as $item) {
            $html .= '<span class="form-control" id="d">' . number_format($item->maks) . '</span>';
            $html .= '<input type="number" class="d-none" id="de" name="max" value="' . $item->maks . '">';
        }
        return $html;
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'layanan' => 'required',
            'target' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
        ]);
        // dd($request);

        OrderLayanan::create([
            'kategori' => $request->kategori,
            'layanan' => $request->layanan,
            'target' => $request->target,
            'jumlah' => $request->jumlah,
            'total' => $request->total,
            'status' => 'pending',
        ]);

        return redirect()->route('user.index');
    }
}
