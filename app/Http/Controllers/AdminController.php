<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Dealer;
use App\Admin;
use App\Taker;
use App\User;
use App\Rice;
use Illuminate\Support\Facades\Hash;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\File;
use Str;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('admin.home');
    }

    public function create_dealer(){

        return view('admin.d.create');

    }

    public function store_dealer(Request $request){


       $d = new Dealer();

       $d->name =  $request->name;


       $d->email =  $request->email;
       $d->phone =  $request->phone;
       $d->address =  $request->address;
       $d->password = Hash::make($request->password);

        $file = $request->file('myimg');
        $destinationPath = public_path(). '/images/dealer_image';
        $filename = $file->getClientOriginalName();

        $request->file('myimg')->move($destinationPath, $filename);
        $d->image = $filename;

      $d->save();
       return back()->with('success', 'Record Saved successfully');
  }

    public function show_dealer(){

        $d = new Dealer();
        $data = $d->get();

        return view('admin.d.show',['data'=>$data]);

    }
    public function edit_dealer($id){

        $d = new Dealer();
        $data = $d->where('id',$id)->first();
        // echo $data;die();
        return view('admin.d.edit_dealer',['data'=>$data]);

    }


    public function update_dealer(Request $request){

        $d = new Dealer();
         if( $request->file('myimg')){

             $file = $request->file('myimg');
             $destinationPath = public_path(). '/images/dealer_image';
             $filename = $file->getClientOriginalName();

             $request->file('myimg')->move($destinationPath, $filename);
             $d->where('id', $request->id)
             ->update(
                 [
                     'name' => $request->name,
                     'email' => $request->email,
                     'phone' => $request->phone,
                     'address' => $request->address,
                     'image' => $filename
                ]
               );
          }else{
             $d->where('id', $request->id)
             ->update(
                 [
                     'name' => $request->name,
                     'email' => $request->email,
                     'phone' => $request->phone,
                     'address' => $request->address,

                ]
               );
          }



        return back()->with('success', 'Record Updated successfully');
     }


    public function edit_dealer_password($id){

        $d = new Dealer();
        $data = $d->where('id',$id)->first();
        // echo $data;die();
        return view('admin.d.edit_dealer_password',['data'=>$data]);

    }

    public function update_dealer_password(Request $request){

        $d = new Dealer();
        $password = Hash::make($request->password);

        if( $d->where('id', $request->id)->update(['password' => $password,]))
               return back()->with('success', 'Password Updated successfully');



   }


    public function delete_dealer($id){

       if(DB::table('dealers')->where('id', '=', $id)->delete())
           return back()->with('success', 'Record Deleted successfully');


     }

    public function create_taker(){

        return view('admin.t.create');

    }

    public function store_taker(Request $request){


       $d = new Taker();

       $d->name =  $request->name;
       $d->father =  $request->father;
       $d->mother =  $request->mother;
       $d->address1 =  $request->address1;
       $d->address2 =  $request->address2;
       $d->area_id =  $request->area_id;

       $d->nid =  $request->nid;

       $d->bid =  $request->bid;

       $d->mid =  $request->mid;

       $d->card_id = $request->nid.rand(1,2000);

       $d->phone =  $request->phone;

       $d->card_start_date = date("Y/m/d h:i:sa");
       $d->card_end_date =  date('Y-m-d', strtotime(' + 1 week'));


        $file = $request->file('myimg');
        $destinationPath = public_path(). '/images/taker_image';
        $filename = $file->getClientOriginalName();

        $request->file('myimg')->move($destinationPath, $filename);
        $d->image = $filename;

        $d->save();
       return back()->with('success', 'Inserted successfully');
  }

    public function show_taker(){

        $d = new Taker();
        $data = $d->get();

        return view('admin.t.show',['data'=>$data]);

    }

    public function delete_taker($id){

        if(DB::table('takers')->where('id', '=', $id)->delete())
            return back()->with('success', 'Record Deleted successfully');


      }

    public function create_rice_amount(){

        $d = new Dealer();
        $data = $d->get();

        return view('admin.rice.amount',['data'=>$data]);

    }

    // public function store_rice_select_ajax(Request $request){

    //     $d = new Dealer();
    //     if($request->ajax()){
    // 		$msg = DB::table('dealers')->where('id',$request->dealer_id)->get();
    // 		// $data = view('admin.rice.amount')->render();
    // 		return response()->json(array('msg'=> $msg), 200);
    // 	}

    // }
    public function store_rice_amount(Request $request){
        $r = new Rice();
        $r->dealer_id =  $request->dealer_id;

       $r->area_id =  $request->area_id;
       $r->taker_limit =  $request->taker_limit;
        $r->amount =  $request->amount;
        $r->rice_giving_time =  $request->rice_giving_time;

        $r->save();

        return back()->with('success', 'Inserted successfully');
    }

    public function show_rice_amount(Request $request){
        $r = new Rice();
        $d = new Dealer();

        $data = DB::table('dealers')
        ->join('rice', 'dealers.id', '=', 'rice.dealer_id')
        ->select('dealers.*', 'rice.*')
        ->get();

       return view('admin.rice.show_rice_amount',['data'=>$data]);

    }


    public function edit_rice_amount($id){
        $r = new Rice();
        $d = new Dealer();

        $data = DB::table('dealers')
        ->join('rice', 'dealers.id', '=', 'rice.dealer_id')
        ->select('*')->where('dealer_id','=',$id)
        ->first();
        // echo $data;die();
        $rid = $r->where('id',$id)->first();

        // echo $id;
        // echo '<br><br><br><br><br>'.$rid;
        // die();
        return view('admin.rice.edit_rice_amount',['data'=>$data,'rid'=>$rid]);

    }

    public function update_rice_amount(Request $request){

        $d = new Rice();


        if( $d->where('id', $request->id)->update(['amount' => $request->amount,'rice_giving_time'=>$request->rice_giving_time]))
               return back()->with('success', ' Updated successfully');



   }


    public function delete_rice_amount($id){

       if(DB::table('rice')->where('id', '=', $id)->delete())
           return back()->with('success', 'Record Deleted successfully');


     }



}
