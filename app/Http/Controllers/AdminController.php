<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Menu;
use App\Models\OrderLayanan;
use App\Models\OrderMakanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function index()
    {
        $pesanan = [
            OrderLayanan::where('status', 'pending')->count(),
            OrderLayanan::where('status', 'proses')->count(),
            OrderLayanan::where('status', 'selesai')->count(),
            OrderLayanan::select('*')->count() + OrderMakanan::select('*')->count(),
            OrderLayanan::select('*')->count(),
            OrderMakanan::select('*')->count(),
            OrderMakanan::sum('total_harga') - OrderLayanan::sum('total'),
            OrderMakanan::sum('total_harga') / OrderMakanan::sum('qty'),
            OrderLayanan::where('pembayaran', 'sudah')->sum('total'),
        ];

        return view('admin.dashboard', compact('pesanan'));
    }

    public function order()
    {
        $menu = Menu::whereIn('id', [1, 2, 3, 4, 5, 6, 7])->get();
        $satdim = Menu::whereIn('id', [1, 2, 3, 4, 5, 6, 7, 8])->get();
        $nasi = Menu::where('menu', 'Nasi')->get();

        return view('admin.order.index', compact('menu', 'nasi', 'satdim'));
    }

    public function store(Request $request)
    {
        // dd($request);
        // $request->validate([
        //     'nama' => 'required',
        //     'tlp' => 'required',
        //     'alamat' => 'required',
        //     // 'email' => 'required',
        //     // 'menu' => 'required',
        //     'qty' => 'required',
        //     'harga' => 'required',
        //     'total_harga' => 'required',
        //     // 'bukti_pembayaran' => 'required'
        // ]);

        $menus = '';
        $bktpb = $request->bukti;
        $namafile = time() . rand(100, 999) . "." . $bktpb->getClientOriginalExtension();
        // dd($request->varian);
        if ($request->plus == 'Nasi') {
            $menus .= $request->menu . ' + ' . $request->plus;
        } else if ($request->plus == 'Tidak Pakai') {
            if ($request->varian != 'Pilih satu') {
                $menus .= $request->menu . ' (' . $request->varian . ')';
            } else {
                $menus .= $request->menu;
            }
        }
        // dd($menus);
        // dd([$request, $menus]);
        $a = OrderMakanan::create([
            'nama' => $request->nama,
            'tlp' => '+62' . $request->tlp,
            'alamat' => $request->alamat,
            'email' => Null,
            'menu' => $menus,
            'qty' => $request->qty,
            'harga' => $request->harga,
            'total_harga' => $request->total,
            'bukti_pembayaran' => $namafile
        ]);
        // dd($a);
        $bktpb->move(public_path() . '/assets/img/bukti', $namafile);
        notify()->success("Pesanan berhasil dibuat", "Success", "topRight");
        return redirect()->route('admin.order');
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
                $html .=  '<span class="form-control">' . number_format($list->harga) . '</span>';
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
                $html .=  '<span class="form-control">' . number_format(20000) . '</span>';
                $html .=  '<input class="d-none" id="harga" name="harga" value="20000"></input>';
            }
            return $html;
        } else {
            $html = ' ';
            $html .=  '<span class="form-control">' . number_format(15000) . '</span>';
            $html .=  '<input class="d-none" id="harga" name="harga" value="15000"></input>';
            // dd($html);
            return $html;
        }
    }

    public function layanan()
    {
        $data = Layanan::all();
        return view('admin.layanan.index', compact('data'));
    }

    public function addLayanan()
    {
        return view('admin.layanan.addlayanan');
    }

    public function dataorder()
    {
        $data = [
            OrderLayanan::all(),
            OrderMakanan::all()
        ];
        return view('admin.order.dataorder', compact('data'));
    }

    public function getStatus(Request $request)
    {
        $id = $request->post('cid');
        if ($request->post('cud') == 'pending') {
            OrderLayanan::find($id)->update([
                'status' => 'proses'
            ]);
        } else if ($request->post('cud') == 'proses') {
            OrderLayanan::find($id)->update([
                'status' => 'selesai'
            ]);
        }

        $data = OrderLayanan::where('id', $id)->get();
        $html = ' ';

        foreach ($data as $item) {
            if ($item->status == 'selesai') {
                $html .= '<div id="' . $item->id . 'status" class="badge bg-success text-capitalize text-white" data-id="' . $item->id . '">' . $item->status . '</div>';
                $html .= '<input type="hidden" name="" id="' . $item->id . 'hides" value="' . $item->status . '">';
            } else {
                $html .= '<div id="' . $item->id . 'status" class="badge bg-primary text-capitalize text-white" data-id="' . $item->id . '">' . $item->status . '</div>';
                $html .= '<input type="hidden" name="" id="' . $item->id . 'hides" value="' . $item->status . '">';
            }
        }

        return $html;
    }

    public function regisUser()
    {
        $user = User::where('role', 'user')->get();
        // dd($user);
        return view('admin.regis.regisuser', compact('user'));
    }

    public function addUSer()
    {
        return view('admin.regis.adduser');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);
        notify()->success("Berhasil registrasi", "Success", "bottomRight");
        return redirect()->route('admin.regis');
    }

    public function singular($singular)
    {
        return view('admin.layanan.detail');
    }
}
