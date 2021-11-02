<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Ngopah;

class NgopahController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function pesananku(Request $request)
    {
        if(isset($request->status)){
            $pesanan = Ngopah::where('user_id','=', Auth::id())->where('status', '=', $request->status)->orderBy('created_at', 'desc')->paginate(10);
        }
        else{
            $pesanan = Ngopah::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
        }
        return view('user.pesananku', ['pesanan' => $pesanan]);
    }

    public function menabung()
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ngopah = new Ngopah;
        $ngopah->name = $request->name;
        $ngopah->phone_number = $request->phone_number;
        $ngopah->alamat = $request->alamat;
        $ngopah->rt = $request->rt;
        $ngopah->rw = $request->rw;
        $ngopah->user_id = Auth::id();
        $ngopah->tanggal_pengambilan = $request->tanggal;
        if(isset($request->minyak_jelantah) == 'on'){
            $ngopah->minyak_jelantah = 1;
        }
        else{
            $ngopah->minyak_jelantah = 0;
        }
        if(isset($request->kardus) == 'on'){
            $ngopah->kardus = 1;
        }
        else{
            $ngopah->kardus = 0;
        }
        if(isset($request->botol_plastik) == 'on'){
            $ngopah->botol_plastik = 1;
        }
        else{
            $ngopah->botol_plastik = 0;
        }

        $ngopah->minyak_jelantah_liter = 0;
        $ngopah->kardus_kg = 0;
        $ngopah->botol_plastik_kg = 0;
        $ngopah->status = 'Pending';
        
        
        $ngopah->save();

        return redirect('/pesananku')->with(['success' => 'Pesanan Berhasil Dibuat! Petugas Kami Akan Segera Menghubungi Anda']);
    }

    public function data_bank(Request $request){
        
        if($request->data == 'rt'){
            $ngopah = DB::table('ngopahs')->select(DB::raw("SUM(minyak_jelantah_liter) as minyak_jelantah_liter"),DB::raw("SUM(kardus_kg) as kardus_kg"), DB::raw("SUM(botol_plastik_kg) as botol_plastik_kg"),'rt', 'rw')->where('status','=','selesai')->where('rw','=',$request->rw)->groupBy('rt', 'rw')->orderBy('rt', 'asc')->get();
            return view('user.bank-rt', ['ngopah' => $ngopah]);
        }
        else if($request->data == 'rw'){
            $ngopah = DB::table('ngopahs')->select(DB::raw("SUM(minyak_jelantah_liter) as minyak_jelantah_liter"),DB::raw("SUM(kardus_kg) as kardus_kg"), DB::raw("SUM(botol_plastik_kg) as botol_plastik_kg"), 'rw')->where('status','=','selesai')->groupBy('rw')->orderBy('rw', 'asc')->get();
            return view('user.bank-rw', ['ngopah' => $ngopah]);
        }
        else{
            $ngopah = DB::table('ngopahs')->select(DB::raw("SUM(minyak_jelantah_liter) as minyak_jelantah_liter"),DB::raw("SUM(kardus_kg) as kardus_kg"), DB::raw("SUM(botol_plastik_kg) as botol_plastik_kg"),'name')->where('status','=','selesai')->groupBy('user_id', 'name')->orderBy('name', 'asc')->paginate(30);
            
            return view('user.bank-individu', ['ngopah' => $ngopah]);
        }
    }
}
