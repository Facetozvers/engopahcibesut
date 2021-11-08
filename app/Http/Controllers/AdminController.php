<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Ngopah;
use App\User;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function pending_ngopah(Request $request){
        if($request->sort =='tanggal_pengambilan'){
            $ngopah = Ngopah::where('status', 'pending')->orderBy($request->sort, 'asc')->paginate(10);
        }
        else{
            $ngopah = Ngopah::where('status', 'pending')->orderBy('created_at', 'asc')->paginate(10);
        }
        return view('workspace.ngopah.pending', ['pesanan' => $ngopah]);
    }

    public function proses_ngopah(Request $request){
        $ngopah = Ngopah::where('req_id',$request->req_id)->first();
        $ngopah->minyak_jelantah_liter = $request->minyak_jelantah_liter;
        $ngopah->botol_plastik_kg = $request->botol_plastik_kg;
        $ngopah->kardus_kg = $request->kardus_kg;
        $ngopah->status = "Selesai";

        if($ngopah->minyak_jelantah_liter == NULL){
            $ngopah->minyak_jelantah_liter = 0;
        }
        if($ngopah->botol_plastik_kg == NULL){
            $ngopah->botol_plastik_kg = 0;
        }
        if($ngopah->kardus_kg == NULL){
            $ngopah->kardus_kg = 0;
        }

        $ngopah->save();

        return redirect('/workspace/pending')->with(['success' => 'Pesanan Selesai di Proses!']);
    }

    public function batalkan_pesanan(Request $request){
        $ngopah = Ngopah::where('req_id',$request->req_id)->first();
        $ngopah->status = "Batal";
        $ngopah->save();

        return redirect('/workspace/pending')->with(['success' => 'Pesanan Selesai di Proses!']);
    }

    public function history(Request $request){
        if($request->sort == 'terdahulu'){
            $ngopah = Ngopah::where(function($status){
                $status->where('status','=','Selesai')->orWhere('status','=','Batal');
            })
            ->where(function ($query) use($request){
                $query->where('name','LIKE', "%{$request->q}%")->orWhere('req_id','LIKE', "%{$request->q}%");
            })->orderBy('created_at', 'asc')->paginate(10);
        }
        else if($request->sort == 'tanggal_pengambilan'){
            $ngopah = Ngopah::where(function($status){
                $status->where('status','=','Selesai')->orWhere('status','=','Batal');
            })
            ->where(function ($query) use($request){
                $query->where('name','LIKE', "%{$request->q}%")->orWhere('req_id','LIKE', "%{$request->q}%");
            })->orderBy('tanggal_pengambilan', 'desc')->paginate(10);
        }
        else{
            $ngopah = Ngopah::where(function($status){
                $status->where('status','=','Selesai')->orWhere('status','=','Batal');
            })
            ->where(function ($query) use($request){
                $query->where('name','LIKE', "%{$request->q}%")->orWhere('req_id','LIKE', "%{$request->q}%");
            })->orderBy('created_at', 'desc')->paginate(10);
        }

        if($request->start_date != NULL){
            $from = $request->start_date;
            $to = $request->end_date;

            if($from == $to){
                $ngopah = Ngopah::where(function($status){
                    $status->where('status','=','Selesai')->orWhere('status','=','Batal');
                })
                ->where(function ($query) use($from){
                    $query->where('created_at','=',$from);
                })->orderBy('created_at', 'asc')->paginate(10);
            }
            else{
                $ngopah = Ngopah::where(function($status){
                    $status->where('status','=','Selesai')->orWhere('status','=','Batal');
                })
                ->where(function ($query) use($from, $to){
                    $query->whereBetween('created_at',[$from, $to]);
                })->orderBy('created_at', 'asc')->paginate(10);
            }
        }
        return view('workspace.ngopah.history', ['pesanan' => $ngopah]);
    }

    public function data_bank(Request $request){
        $lastmonth = date('Y-m-d', strtotime('-1 months'));
        $lastweek = date('Y-m-d', strtotime('-1 weeks'));
        $now = date('Y-m-d');
        
        if($request->data == 'rt'){
            if($request->periode == '30_hari'){
                $ngopah = DB::table('ngopahs')->select(DB::raw("SUM(minyak_jelantah_liter) as minyak_jelantah_liter"),DB::raw("SUM(kardus_kg) as kardus_kg"), DB::raw("SUM(botol_plastik_kg) as botol_plastik_kg"),'rt', 'rw')->where('status','=','selesai')->where('rw','=',$request->rw)->whereBetween('created_at', [$lastmonth, $now])->groupBy('rt', 'rw')->orderBy('rt', 'asc')->get();
            }
            else if($request->periode == '7_hari'){
                $ngopah = DB::table('ngopahs')->select(DB::raw("SUM(minyak_jelantah_liter) as minyak_jelantah_liter"),DB::raw("SUM(kardus_kg) as kardus_kg"), DB::raw("SUM(botol_plastik_kg) as botol_plastik_kg"),'rt', 'rw')->where('status','=','selesai')->where('rw','=',$request->rw)->whereBetween('created_at', [$lastweek, $now])->groupBy('rt', 'rw')->orderBy('rt', 'asc')->get();
            }
            else{
                $ngopah = DB::table('ngopahs')->select(DB::raw("SUM(minyak_jelantah_liter) as minyak_jelantah_liter"),DB::raw("SUM(kardus_kg) as kardus_kg"), DB::raw("SUM(botol_plastik_kg) as botol_plastik_kg"),'rt', 'rw')->where('status','=','selesai')->where('rw','=',$request->rw)->groupBy('rt', 'rw')->orderBy('rt', 'asc')->get();
            }
            return view('workspace.bank-rt', ['ngopah' => $ngopah]);
        }
        else if($request->data == 'rw'){
            if($request->periode == '30_hari'){
                $ngopah = DB::table('ngopahs')->select(DB::raw("SUM(minyak_jelantah_liter) as minyak_jelantah_liter"),DB::raw("SUM(kardus_kg) as kardus_kg"), DB::raw("SUM(botol_plastik_kg) as botol_plastik_kg"), 'rw')->where('status','=','selesai')->whereBetween('created_at', [$lastmonth, $now])->groupBy('rw')->orderBy('rw', 'asc')->get();
            }
            else if($request->periode == '7_hari'){
                $ngopah = DB::table('ngopahs')->select(DB::raw("SUM(minyak_jelantah_liter) as minyak_jelantah_liter"),DB::raw("SUM(kardus_kg) as kardus_kg"), DB::raw("SUM(botol_plastik_kg) as botol_plastik_kg"), 'rw')->where('status','=','selesai')->whereBetween('created_at', [$lastweek, $now])->groupBy('rw')->orderBy('rw', 'asc')->get();
            }
            else{
                $ngopah = DB::table('ngopahs')->select(DB::raw("SUM(minyak_jelantah_liter) as minyak_jelantah_liter"),DB::raw("SUM(kardus_kg) as kardus_kg"), DB::raw("SUM(botol_plastik_kg) as botol_plastik_kg"), 'rw')->where('status','=','selesai')->groupBy('rw')->orderBy('rw', 'asc')->get();
            }
            return view('workspace.bank-rw', ['ngopah' => $ngopah]);
        }
        else{
            if($request->periode == '30_hari'){
                $ngopah = DB::table('ngopahs')->select(DB::raw("SUM(minyak_jelantah_liter) as minyak_jelantah_liter"),DB::raw("SUM(kardus_kg) as kardus_kg"), DB::raw("SUM(botol_plastik_kg) as botol_plastik_kg"),'name')->where('status','=','selesai')->whereBetween('created_at', [$lastmonth, $now])->groupBy('user_id', 'name')->orderBy('name', 'asc')->paginate(30);
            }
            else if($request->periode == '7_hari'){
                $ngopah = DB::table('ngopahs')->select(DB::raw("SUM(minyak_jelantah_liter) as minyak_jelantah_liter"),DB::raw("SUM(kardus_kg) as kardus_kg"), DB::raw("SUM(botol_plastik_kg) as botol_plastik_kg"),'name')->where('status','=','selesai')->whereBetween('created_at', [$lastweek, $now])->groupBy('user_id', 'name')->orderBy('name', 'asc')->paginate(30);
            }
            else{
                $ngopah = DB::table('ngopahs')->select(DB::raw("SUM(minyak_jelantah_liter) as minyak_jelantah_liter"),DB::raw("SUM(kardus_kg) as kardus_kg"), DB::raw("SUM(botol_plastik_kg) as botol_plastik_kg"),'name')->where('status','=','selesai')->groupBy('user_id', 'name')->orderBy('name', 'asc')->paginate(30);
            }
            
            return view('workspace.bank-individu', ['ngopah' => $ngopah]);
        }
    }

    public function ubah_profil(){
        $profil = User::where('user_id','=',Auth::user()->user_id)->select('name','phone_number')->first();
        return view('workspace.ubah_profil', ['profil' => $profil]);
    }

    public function store_profil(Request $request){
        $user = User::find(Auth::id());
        if($request->phone_number == $user->phone_number){
            $request->validate([
                'name' => ['required', 'string', 'max:30'],
                'current_password' => ['required', new MatchOldPassword],
            ]);
        }
        else{
            $request->validate([
                'name' => ['required', 'string', 'max:30'],
                'phone_number' => ['required', 'string', 'max:15', 'unique:users'],
                'current_password' => ['required', new MatchOldPassword],
            ],
            [
                'phone_number.unique' => 'Nomor Handphone sudah digunakan!',        
            ]);
        }

        $user->name = ucwords($request->name);
        $user->phone_number = $request->phone_number;

        $user->save();

        return redirect('/workspace/ubah-profil')->with(['success' => 'Profil Berhasil Diubah!']);
    }
}
