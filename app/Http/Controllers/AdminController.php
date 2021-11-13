<?php

namespace App\Http\Controllers;

use App\Models\DetailUser;
use App\Models\Layanan;
use App\Models\Menu;
use App\Models\OrderLayanan;
use App\Models\OrderMakanan;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Exports\MakananExport;
use App\Exports\UserMknExport;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

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
            OrderMakanan::sum('total_harga') + OrderLayanan::sum('total'),
            's',
            OrderLayanan::where('pembayaran', 'sudah')->sum('total') + OrderMakanan::sum('total_harga'),
            Layanan::all(),
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

    public function storeLayanan(Request $request)
    {
        // dd($request);

        $request->validate([
            'kategori' => 'required',
            'layanan' => 'required',
            'target' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
        ]);
        // dd($request);

        $pay = DetailUser::where('user_id', Auth::user()->id)->first();
        $saldo = $pay->saldo - $request->total;


        if ($pay->saldo < $request->total) {
            notify()->error("Opeasi Ilegal", "Error", "topRight");
            return redirect()->route('admin.index');
        } else {
            OrderLayanan::create([
                'kategori' => $request->kategori,
                'layanan' => $request->layanan,
                'target' => $request->target,
                'user_id' => Auth::user()->id,
                'jumlah' => $request->jumlah,
                'total' => $request->total,
                'status' => 'pending',
                'pembayaran' => 'sudah',
                'tgl' => date("Y-m-d"),
            ]);

            DetailUser::find($pay->id)->update([
                'saldo' => $saldo,
            ]);

            notify()->success("Pesanan berhasil dibuat", "Success", "topRight");
            return redirect()->route('admin.index');
        }
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

        // dd($nomor->id);

        $menus = '';
        $qty = 0;
        $totalharga = 0;
        $bktpb = $request->bukti;
        $namafile = time() . rand(100, 999) . "." . $bktpb->getClientOriginalExtension();
        // dd($request->varian);
        if ($request->plus == 'Nasi') {
            $menus .= $request->menu . ' + ' . $request->plus;
        } else if ($request->plus == 'Tidak Pakai') {
            if ($request->varian != 'Pilih satu') {
                $menus .= $request->menu . ' (' . $request->varian . ')';
            } else {
                $getm = $request->menu;
                foreach ($getm as $item) {
                    $menus .= $item . ',';
                }
                // $menus .= $request->menu;
            }
        }


        if (count($request->menu) > 1) {
            $qty = 1;
            $totalharga = $request->harga;
        } else {
            $totalharga = $request->total;
            $qty = $request->qty;
        }

        // dd($qty);
        // dd($menus);
        // dd([$request, $menus]);
        $nomor = OrderMakanan::select('*')->latest()->first();
        // dd($nomor);

        if ($nomor == Null) {
            $table_no =  0;
        } else {
            $table_no =  $nomor->id;
        }
        $tgl = substr(str_replace('-', '', Carbon::now()), 0, 8);

        $no = $tgl . $table_no;
        $auto = substr($no, 8);
        $auto = intval($auto) + 1;
        $auto_number = substr($no, 0, 8) . str_repeat(0, (4 - strlen($auto))) . $auto;


        OrderMakanan::create([
            'kode_transaksi' => $auto_number,
            'nama' => $request->nama,
            'customer' => $request->customer,
            'tlp' => '+62' . $request->tlp,
            'alamat' => $request->alamat,
            'email' => Null,
            'menu' => $menus,
            'qty' => $qty,
            'harga' => $request->harga,
            'total_harga' => $totalharga,
            'keterangan' => $request->keterangan,
            'bukti_pembayaran' => $namafile
        ]);
        // dd($a);
        $bktpb->move(public_path() . '/assets/img/bukti', $namafile);
        notify()->success("Pesanan berhasil dibuat", "Success", "topRight");
        return redirect()->route('admin.order');
    }

    public function getHarga(Request $request)
    {
        // dd($request->cid);
        if ($request->cid == 'plh') {
            $html = ' ';
            $html .=  '<span class="form-control">0</span>';
            $html .=  '<input class="d-none" id="harga" name="harga" value="0"></input>';
            return $html;
        } else {
            $cid = $request->post('cid');
            $menu = Menu::whereIn('Menu', [$cid])->get();
            // dd($menu);
            $harga = 0;
            $html = ' ';
            foreach ($menu as $item) {
                $harga += $item->harga;
                $html .=  '<span class="form-control">' . number_format($harga) . '</span>';
                $html .=  '<input class="d-none" id="harga" name="harga" value="' . $harga . '"></input>';
            }
        }
        return $request->cid;
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
        $orderlyn = OrderLayanan::all();
        $ordermkn = OrderMakanan::all();
        return view('admin.order.dataorder', compact('orderlyn', 'ordermkn'));
    }
    public function usdataorder()
    {
        $orderlyn = OrderLayanan::where('user_id', Auth::user()->id)->get();
        return view('admin.order.dataorder', compact('orderlyn'));
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
        $user = DetailUser::all();
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

        // User::create([
        //     'name' => $request->username,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'role' => 'user',
        // ]);

        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'user';
        $user->save();

        $insertedId = $user->id;

        $data = DetailUser::create([
            'nama' => $request->username,
            'email' => $request->email,
            'user_id' => $insertedId,
            'saldo' => 0,
        ]);
        // dd($insertedId);

        notify()->success("Berhasil registrasi", "Success", "bottomRight");
        return redirect()->route('admin.regis');
    }

    public function detailUser($id)
    {
        $data = DetailUser::where('user_id', $id)->first();
        // dd($data->user_id);
        return view('admin.regis.detail', compact('data'));
    }

    public function updateUser(Request $request, $id)
    {
        $ids = DetailUser::where('user_id', $id)->first();

        $request->validate([
            'nama' => 'required',
            // 'email' => 'required',
            'no_hp' => 'required',
            'saldo' => 'required',
            'alamat' => 'required',
            // 'password' => 'required',
        ]);

        // if ($request->no_hp != Null) {
        //     DetailUser::find($ids->id)->update([
        //         'nama' => $request->nama,
        //         'email' => $request->email,
        //         'no_hp' => $request->no_hp,
        //     ]);
        // } else if ($request->saldo != 0) {
        //     DetailUser::find($ids->id)->update([
        //         'nama' => $request->nama,
        //         'email' => $request->email,
        //         'saldo' => $request->saldo,
        //     ]);
        // } else if ($request->alamat != Null) {
        //     DetailUser::find($ids->id)->update([
        //         'nama' => $request->nama,
        //         'email' => $request->email,
        //         'alamat' => $request->alamat,
        //     ]);
        // } else if ($request->no_hp == Null or ) {
        //     # code...
        // }{
        //     notify()->error("Operasi Ilegal", "Error", "bottomRight");
        //     return back();
        // }

        DetailUser::find($ids->id)->update([
            'nama' => $request->nama,
            // 'email' => $request->email,
            'saldo' => $request->saldo,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        if ($request->password == Null) {
            User::find($ids->user_id)->update([
                'nama' => $request->nama,
                // 'email' => $request->email,
            ]);
        } else {
            User::find($ids->user_id)->update([
                'nama' => $request->nama,
                // 'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }
        notify()->success("Berhasil mengubah data", "Success", "bottomRight");
        return redirect()->route('admin.regis');
    }

    public function singular()
    {
        return view('admin.layanan.detail');
    }

    public function laporanmakanan()
    {
        // $ordermakanan = orderMakanan::select(
        //     DB::raw('count(id) as `jumlahsiswa`'),
        //     DB::raw('sum(qty) as `qty`'),
        //     DB::raw('sum(total_harga) as `total`'),
        //     DB::raw("DATE_FORMAT(tgl, '%Y-%m-%d') as tgl")
        // )
        //     ->groupBy('tgl')->orderBy('tgl')->get();
        // $siswa = orderMakanan::count('id');
        // $qty = OrderMakanan::sum('qty');    
        // $total = orderMakanan::sum('total_harga');
        $ordermakanan = OrderMakanan::all();
        return View('admin.laporan.makanan', compact('ordermakanan'));
    }

    public function sislprmkn()
    {
        $ordermakanan = OrderMakanan::where('nama', Auth::user()->name)->get();
        return View('admin.laporan.makanan', compact('ordermakanan'));
    }

    public function laporanfollowers()
    {
        $order = OrderLayanan::select(
            DB::raw('count(id) as `jumlah`'),
            DB::raw('sum(total) as `total`'),
            DB::raw("DATE_FORMAT(tgl, '%Y-%m-%d') as tgl")
        )
            ->groupBy('tgl')->orderBy('tgl')->get();

        return View('admin.laporan.followers', compact('order'));
    }

    public function detail($id)
    {
        $detail = OrderMakanan::where('id', $id)->first();

        return $detail;
    }
    public function exportExcel()
    {
        return Excel::download(new MakananExport, 'makanan.xlsx');
    }
    public function exportExcelUser()
    {
        return Excel::download(new UserMknExport, 'makanan.xlsx');
    }

    public function dataSiswa()
    {
        $siswa = User::where('role', 'siswa')->get();

        return view('admin.siswa.data-siswa', compact('siswa'));
    }
    public function addSiswa()
    {
        $siswa = User::where('role', 'siswa')->get();

        return view('admin.siswa.addsiswa', compact('siswa'));
    }
    public function storeSiswa(Request $request)
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
            'role' => 'siswa',
        ]);

        notify()->success("Berhasil registrasi", "Success", "bottomRight");
        return redirect()->route('admin.siswa.index');
    }
}
