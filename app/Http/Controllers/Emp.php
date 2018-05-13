<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
class Emp extends Controller
{
    //

    public function Add(Request $request )
    {
        $user = new User;
        $employees = new Employee;
        $imagePath = "";
        if($request->hasfile('photo')){
            $imagePath = $request->file('photo')->store('public');
        }

        /*        if(
                    )){

                    $error =array("err"=>"please input not be empty") ;
                    return view('/addpost',$error);
                }else{*/
        $user->name = $request->user;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();


        $lastuser =  User::latest()->first();
        $employees->firstName = $request->fName;
        $employees->lastName = $request->lName;
        $employees->jobTitle = $request->job;
        $employees->image = $imagePath;
        $employees->status = $request->status;
        $employees->lang = $request->location;
        $employees->lout = $request->location;

        $employees->user_id = $lastuser->id;
        //           $user->password = $imagePath;

        $employees->save();

        return response()->json($user);

        //      }

    }


    public function getAll(){
        $user= Employee::all()->toArray();

        return response()->json($user);
    }

    public function index($id){
        $user= Employee::find($id)->toArray();
        return response()->json($user);
    }

  /*  public function search(){
        $user= Employee::all()->toArray();
//response()->json($user);
        return $user;
    }*/

    public function search(Request $request) {

//       $data = $request->get('data');

    $name =$request->firstname;

        $search_emps = Employee::where('firstName', 'like', "%{$name}%")
            ->get();

  //          print_r($name);

        $arr = Array('employ'=>$search_emps);

        return view('list',$arr);
            /*   return response()->json([
            'name' => $search_drivers
        ]);*/
    }


    public function destroy(Request $request)
    {
        $user = User::find($request->userid);

        $emp = Employee::find($request->id);

        $user->delete();
        $emp->delete();

    }
    public function active(Request $request){
        $user = Employee::find($request->id);
        $user->status = 0;
        $user->save();
        return response()->json($user);

    }

    public function disactive(Request $request){
        $user = Employee::find($request->id);
        $user->status = 1;
        $user->save();
        return response()->json($user);

    }

    public function getuser(Request $request)
    {
        $emp= Employee::find($request->id)->toArray();
       $user= User::find($request->userid)->toArray();
       $arr=Array($emp,$user);
       return response()->json($arr);

    }
    public function edit(Request $request)
    {

        $user =  User::find($request->userid);
        $employees = Employee::find($request->id);
        $imagePath = "";
        if($request->hasfile('photo')){
            $imagePath = $request->file('photo')->store('public');
        }

        /*        if(
                    )){

                    $error =array("err"=>"please input not be empty") ;
                    return view('/addpost',$error);
                }else{*/
        $user->name = $request->user;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();


        $employees->firstName = $request->fName;
        $employees->lastName = $request->lName;
        $employees->jobTitle = $request->job;

        if(empty($imagePath)){

        }else{
            $employees->image = $imagePath;

        }
        $employees->status = $request->status;
        $employees->lang = $request->location;
        $employees->lout = $request->location;



        $employees->save();

        return response()->json($employees);



    }

}
