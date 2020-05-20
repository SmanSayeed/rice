<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use Illuminate\Support\Facades\DB;
use App\Dealer;
use App\Admin;
use App\Taker;
use App\User;
use App\Rice;
use App\Given;
use Illuminate\Support\Facades\Hash;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\File;
use Str;
use Auth;

class DealerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:dealer');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $r = new Rice();
        $d = new Dealer();
        $g = new Given();
        $id = auth()->user()->id;

        $dealer = $d->where('id',$id)->first();
        $rice = $r->where('dealer_id',$id)->first();
        $given = $g->where('dealer_id',$id)->get();


        // $data = DB::table('dealers')
        // ->join('rice', 'dealers.id', '=', 'rice.dealer_id')
        // ->join('givens', 'dealers.id', '=', 'givens.dealer_id')
        // ->join('takers', 'takers.id', '=', 'givens.taker_id')
        //  ->select('dealers.*', 'rice.*','givens.*','takers.*')

        //  ->where('dealers.id','=',$id)
        //   ->get();


        $data = DB::table('rice')

        ->join('takers', 'rice.area_id', '=', 'takers.area_id')

         ->select( 'rice.*','takers.*')

         ->where('rice.dealer_id','=',$id)
          ->get();

        //   echo '<pre>';
        //   print_r($data);
        //   echo '</pre>';die();

        return view('dealer.home',['dealer'=>$dealer,'rice'=>$rice,'given'=>$given,'data'=>$data]);
    }


    public function find_taker(){
        return view('dealer.t.find_taker');
    }
    public function action_find_taker(Request $request){
        $t = new Taker();
        $data = $t->where('card_id',$request->card_id)->first();
        //  echo $data;die();
        return view('dealer.t.dealer_giving_rice',['d'=>$data]);
    }
    public function show_dealer_giving_rice(){
        echo 'success';die();
        // $g = new Given();
        // $data = $g->get()->all();
        // return view('dealer.t.show',['d'=>$data]);
    }
    public function store_dealer_giving_rice(Request $request){
        $g = new Given();
        if($request->taker_key == 1){
            // echo '1'.die();
            $g->dealer_id =  $request->dealer_id;
            $g->taker_id =  $request->taker_id;
            $g->amount =  $request->amount;
             if($g->save()){
                $t = new Taker();
                $t->where('id', $request->taker_id)->update(['taker_key'=>2]);
                echo 'success';
               return  redirect('dealer/home')->with('success','Inserted successfully');
             }else{
                 echo 'not done';
             }

        }else{
            echo 'already given once';
            // return  view('dealer.t.show')->with('success','Already Givent Once');
        }

        // $data = $g->get()->all();
        // return view('dealer.t.show',['data'=>$data])->with('success', 'Inserted successfully');

    }

    public function check_dealer(){

        $r = new Rice();
        $d = new Dealer();
        $g = new Given();
        $id = $_GET['id'];

        $dealer = $d->where('id',$id)->first();
        $rice = $r->where('dealer_id',$id)->first();
        $given = $g->where('dealer_id',$id)->get();

        // echo $id;
        // echo ' <br> D='.$dealer;
        // echo '<br>  R='.$rice;
        // echo '<br>  G='.$given;
        return view('dealer.check_dealer',['dealer'=>$dealer,'rice'=>$rice,'given'=>$given]);


    }

}
