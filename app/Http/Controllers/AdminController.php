<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Dealer;
use App\Admin;
use App\Taker;
use App\GIven;
use App\User;
use App\Rice;
use App\Area;
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
     public function approve_dealer($id){
        $d = new Dealer();
        if($d->where('id', $id)->update(['approve_key' => '2',]))
            return back()->with('success', 'Approved successfully');


      }
      public function unapprove_dealer($id){
        $d = new Dealer();
        if($d->where('id', $id)->update(['approve_key' => '1',]))
            return back()->with('success', 'Unapproved successfully');


      }

      public function select_dealer_area(){

        $d = new Dealer();
        $data = $d->get();

        return view('admin.d.select_dealer_area',['data'=>$data]);

      }
      public function store_dealer_area(Request $request){

        // print $request->dealer_word_1;
        // echo '<br>';

        // print $request->dealer_word_2;
        // echo '<br>';

        // print $request->dealer_word_3;
        // echo '<br>';

        // print $request->dealer_word_4;
        // echo '<br>';

        // print $request->dealer_word_5;
        // echo '<br>';

        // print $request->dealer_word_6;
        // echo '<br>';

        // print $request->dealer_word_7;
        // echo '<br>';

        // print $request->dealer_word_8;
        // echo '<br>';

        // print $request->dealer_word_9;
        // echo '<br>';

        // echo $request->dealer; echo '<br>';
        // echo $request->dealer_area; echo '<br>';



        // die();



        $area_field_seperate = explode(",",$request->dealer_area);
        $area_id = $area_field_seperate[0];
        $area_name = $area_field_seperate[1];

        $dealer_field_seperate = explode(",",$request->dealer);
        $dealer_id = $dealer_field_seperate[0];
        $dealer_name = $dealer_field_seperate[1];

        $a = new Area();
        $d = new Dealer();

        $area_data =   $a->where('id',$area_id)->first();
        $dealer_data =   $d->where('id',$dealer_id)->first();

        if($dealer_data->approve_key ==2 && $dealer_data->dealer_area_id == '' and $dealer_data->dealer_word ==''  and $check_word_area_name == $area_name){
                if($request->dealer_word_1!='' && $area_data->word_1==''){
                    $a->word_1 = $request->dealer;

                    $d->dealer_area_id = $area_id;
                    $d->dealer_area_name = $area_name;
                    $d->dealer_word = $request->dealer_word_1;

                    $a->where('id',$area_id)->update( ['word_1'=>$a->word_1, ]);
                }
                if($request->dealer_word_2!='' && $area_data->word_2==''){
                    $a->word_2 = $request->dealer;

                    $d->dealer_area_id = $area_id;
                    $d->dealer_area_name = $area_name;
                    $d->dealer_word = $request->dealer_word_2;

                    $a->where('id',$area_id)->update( ['word_2'=>$a->word_2, ]);
                }
                if($request->dealer_word_3!='' && $area_data->word_3==''){
                    $a->word_3 = $request->dealer;

                    $d->dealer_area_id = $area_id;
                    $d->dealer_area_name = $area_name;
                    $d->dealer_word = $request->dealer_word_3;

                    $a->where('id',$area_id)->update( ['word_3'=>$a->word_3, ]);
                }
                if($request->dealer_word_4!='' && $area_data->word_4==''){
                    $a->word_4 = $request->dealer;

                    $d->dealer_area_id = $area_id;
                    $d->dealer_area_name = $area_name;
                    $d->dealer_word = $request->dealer_word_4;

                    $a->where('id',$area_id)->update( ['word_4'=>$a->word_4, ]);
                }
                if($request->dealer_word_5!='' && $area_data->word_5==''){
                    $a->word_5 = $request->dealer;

                    $d->dealer_area_id = $area_id;
                    $d->dealer_area_name = $area_name;
                    $d->dealer_word = $request->dealer_word_5;

                    $a->where('id',$area_id)->update( ['word_5'=>$a->word_5, ]);
                }
                if($request->dealer_word_6!='' && $area_data->word_6==''){
                    $a->word_6 = $request->dealer;

                    $d->dealer_area_id = $area_id;
                    $d->dealer_area_name = $area_name;
                    $d->dealer_word = $request->dealer_word_6;

                    $a->where('id',$area_id)->update( ['word_6'=>$a->word_6, ]);
                }
                if($request->dealer_word_7!='' && $area_data->word_7==''){
                    $a->word_7 = $request->dealer;

                    $d->dealer_area_id = $area_id;
                    $d->dealer_area_name = $area_name;
                    $d->dealer_word = $request->dealer_word_7;

                    $a->where('id',$area_id)->update( ['word_7'=>$a->word_7, ]);
                }
                if($request->dealer_word_8!='' && $area_data->word_8==''){
                    $a->word_8 = $request->dealer;

                    $d->dealer_area_id = $area_id;
                    $d->dealer_area_name = $area_name;
                    $d->dealer_word = $request->dealer_word_8;

                    $a->where('id',$area_id)->update( ['word_8'=>$a->word_8, ]);
                }
                if($request->dealer_word_9!='' && $area_data->word_9==''){
                    $a->word_9 = $request->dealer;

                    $d->dealer_area_id = $area_id;
                    $d->dealer_area_name = $area_name;
                    $d->dealer_word = $request->dealer_word_9;

                    $a->where('id',$area_id)->update( ['word_9'=>$a->word_9 , ]);
                }

                // $a->save();
                // $d->save();
            // echo  $d->dealer_area_id; echo '<br>';
            //     echo $d->dealer_area_name; echo '<br>';
            //     echo $d->dealer_word; echo '<br>';
            //     echo $a->word_1; echo '<br>';
            //     echo $a->word_2; echo '<br>';
            //     echo $a->word_3; echo '<br>';
            //     echo $a->word_4; echo '<br>';

            //     echo $a->word_5; echo '<br>';
            //     echo $a->word_6; echo '<br>';
            //     echo $a->word_7; echo '<br>';
            //     echo $a->word_8; echo '<br>';

            //     echo $a->word_9; echo '<br>';
            //     die();



            $d->where('id', $dealer_id)
            ->update([
                'dealer_area_id' => $d->dealer_area_id,
                'dealer_area_name'=>$d->dealer_area_name,
                'dealer_word'=>$d->dealer_word,
                ]);

                // $a->where('id',$area_id)
                // ->update( [

                //     'word_1'=>$a->word_1,
                //     'word_2'=>$a->word_2,
                //     'word_3'=>$a->word_3,
                //     'word_4'=>$a->word_4,

                //     'word_5'=>$a->word_5,
                //     'word_6'=>$a->word_6,
                //     'word_7'=>$a->word_7,
                //     'word_8'=>$a->word_8,

                //     'word_9'=>$a->word_9,

                // ]);


        return back()->with('success', ' Added successfully');

            }else{
                echo '<h1 style="color:red">May be you selected wrong Union or Something different problem occured</h1>';
            }


      }




    public function create_taker(){

        return view('admin.t.create');

    }

    public function store_taker(Request $request){


       $d = new Taker();

       $area_field_seperate = explode(",",$request->area_id);
    //    print_r($area_field_seperate) ;
    //    echo $area_field_seperate[1];
    //    echo $area_field_seperate[0];
    //    die();

       $d->area_id =  $area_field_seperate[0];
       $d->taker_area_id =  $area_field_seperate[0];
       $d->taker_area_name =  $area_field_seperate[1];

       $d->taker_name =  $request->taker_name;
       $d->father =  $request->father;
       $d->mother =  $request->mother;
       $d->village =  $request->village;
       $d->taker_word =  $request->taker_word;


       $d->husband =  $request->husband;

       $d->birthdate =  $request->birthdate;

       $d->gender =  $request->gender;

       $d->nid =  $request->nid;

       $d->bid =  $request->bid;

       $d->mid =  $request->mid;

       $digits = 5;
        // echo rand(pow(10, $digits-1), pow(10, $digits)-1).$request->birthdate; die();

       $d->card_id = rand(pow(10, $digits-1), pow(10, $digits)-1);

       $d->phone =  $request->phone;

       $d->card_start_date = date("Y/m/d h:i:sa");
       $d->card_end_date =  date('Y-m-d', strtotime(' + 1 week'));


        $file = $request->file('myimg');
        $destinationPath = public_path(). '/images/taker_image';
        $filename = $d->card_id."_".$file->getClientOriginalName();

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

    public function add_taker_rice_amount(){

        $d = new Taker();
        $data = $d->get();

        return view('admin.t.add_taker_rice_amount',['data'=>$data]);

    }

    public function store_taker_rice_amount(Request $request){

        $data = implode(',',$request->taker);
        // echo '<pre>'.$request->taker.'</pre>';
        print_r($data);
        die();

        $d = new Taker();
        $data = $d->get();

        return back();

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
        $r->dealer_rice_amount =  $request->dealer_rice_amount;
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


        if( $d->where('id', $request->id)->update(['dealer_rice_amount' => $request->dealer_rice_amount,'rice_giving_time'=>$request->rice_giving_time]))
               return back()->with('success', ' Updated successfully');



   }


    public function delete_rice_amount($id){

       if(DB::table('rice')->where('id', '=', $id)->delete())
           return back()->with('success', 'Record Deleted successfully');


     }

     public function final_report_list(){
        $r = new Rice();
        $d = new Dealer();

        $data = DB::table('dealers')
          ->get();
        //   echo '<pre>';
        //   print_r($data);
        //   echo '</pre>';die();

       return view('admin.report.final_report_list',['data'=>$data]);


    }




     public function final_report($id){
        //  echo $id; die();
        $r = new Rice();
        $d = new Dealer();

        $dealer = $d->where('id',$id)->first();

        $area = DB::table('rice')
        ->join('dealers', 'rice.dealer_id', '=', 'dealers.id')
        ->join('areas', 'rice.area_id', '=', 'areas.id')

         ->select('dealers.*', 'areas.*')

         ->where('dealers.id','=',$id)
          ->first();


        //   echo '<pre>';
        //   print_r($area);
        //   echo '</pre>';die();

        $data = DB::table('dealers')
        ->join('rice', 'dealers.id', '=', 'rice.dealer_id')
        ->join('givens', 'dealers.id', '=', 'givens.dealer_id')
        ->join('takers', 'takers.id', '=', 'givens.taker_id')
         ->select('dealers.*', 'rice.*','givens.*','takers.*')

         ->where('dealers.id','=',$id)
          ->get();


        //   echo '<pre>';
        //   print_r($data);
        //   echo '</pre>';die();

       return view('admin.report.show_final_report',['data'=>$data,'dealer'=>$dealer,'area'=>$area]);

    }

    public function daily_report_list(){
        $r = new Rice();
        $d = new Dealer();



        $data = DB::table('dealers')
          ->get();
        //   echo '<pre>';
        //   print_r($data);
        //   echo '</pre>';die();

       return view('admin.report.daily_report_list',['data'=>$data]);

    }




    public function daily_report($id){
        //  echo $id; die();
        $r = new Rice();
        $d = new Dealer();
        $dealer = $d->where('id',$id)->first();

        $area = DB::table('rice')
        ->join('dealers', 'rice.dealer_id', '=', 'dealers.id')
        ->join('areas', 'rice.area_id', '=', 'areas.id')

         ->select('dealers.*', 'areas.*')

         ->where('dealers.id','=',$id)
          ->first();

          $g = new Given();


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

        //  return view('dealer.home',['dealer'=>$dealer,'rice'=>$rice,'given'=>$given,'data'=>$data]);


        //   echo '<pre>';
        //   print_r($data);
        //   echo '</pre>';die();

       return view('admin.report.show_daily_report',['data'=>$data,'dealer'=>$dealer,'area'=>$area,'rice'=>$rice,'given'=>$given,]);

    }




}
