<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\OrderMakanan;
use Illuminate\Http\Request;
// use phpDocumentor\Reflection\Types\Null_;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menu = Menu::whereIn('id', [1, 2, 3, 4, 5, 6, 7])->get();
        $nasi = Menu::where('menu', 'Nasi')->get();
        return view('home', compact('menu', 'nasi'));
    }
    public function store(Request $request)
    {
        $menus = '';
        if ($request->plus == 'Nasi') {
            $menus .= $request->menu . ' + ' . $request->plus;
        } else if ($request->plus == 'Tidak Pakai') {
            $menus .= $request->menu;
        }
        // dd($menus);
        // dd($menus);
        OrderMakanan::create([
            'nama' => $request->nama,
            'tlp' => '+62' . $request->tlp,
            'alamat' => $request->alamat,
            'email' => Null,
            'menu' => $menus,
            'qty' => $request->qty,
            'harga' => $request->harga,
            'total_harga' => $request->total,
            'bukti_pembayaran' => 'haihsih'
        ]);
        return redirect()->route('home');
    }

    public function getHarga(Request $request)
    {
        if ($request->cid == 'plh') {
            $html = ' ';
            $html .=  '<span class="form-control">0</span>';
            $html .=  '<input class="d-none" id="harga" name="harga" value="0"></input>';
            return $html;
        } else {
            $cid = $request->post('cid');
            $menu = Menu::where('menu', $cid)->get();
            $html = ' ';
            foreach ($menu as $list) {
                $html .=  '<span class="form-control">' . $list->harga . '</span>';
                $html .=  '<input class="d-none" id="harga" name="harga" value="' . $list->harga . '"></input>';
            }
            return $html;
        }
    }

    public function getPlus(Request $request)
    {
        // dd($request->cid);
        if ($request->cid == 'Nasi') {
            $cid = $request->post('cid');
            $menu = Menu::where('menu', $cid)->get();
            $html = ' ';
            foreach ($menu as $list) {
                $html .=  '<span class="form-control">20000</span>';
                $html .=  '<input class="d-none" id="harga" name="harga" value="20000"></input>';
            }
            return $html;
        } else {
            $html = ' ';
            $html .=  '<span class="form-control">15000</span>';
            $html .=  '<input class="d-none" id="harga" name="harga" value="15000"></input>';
            // dd($html);
            return $html;
        }
    }
}