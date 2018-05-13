<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmpController extends Controller
{
    //

    public function addEmp(Request $request){

        $user = new User;
        $emp = new Employee;

        //image
        $imgpath="";
        if($request->hasFile('photo')){
            $imgpath=$request->file('photo')->store('public');
        }


        $user->name = $request->username;
        $user->email =$request->email;
        $user->password =Hash::make($request->password);
        $user->save();


        $lastuser =  User::latest()->first();

        $emp->fName = $request->fName;
        $emp->lName = $request->lName;
        $emp->jobTitle = $request->jobtitle;
        $emp->status = $request->status;
        $emp->lang =$request->location;

        $emp->imge = $imgpath;

        $emp->user_id = $lastuser->id;


        $emp->save();
        return redirect('/home');









    }



    public function getdata(){
        $emp = Employee::all()->toArray();

        return response()->json($emp);

    }

    public function search(Request $request) {

        $name =$request->fName;

        $search_emps = Employee::where('fName', 'like', "%{$name}%")
            ->get();


        $arr = Array('employ'=>$search_emps);

        return response()->json($search_emps);

//        return view('list',$arr);

         }


    public function update($idemployee)
    {

        $emp = Employee::find($idemployee);

        $arr = Array('employ'=>$emp);



        return view('update',$arr);



    }

    public function edit(Request $request,$iduser,$idemployee)
    {

        $user =  User::find($iduser);
        $employees = Employee::find($idemployee);
        $imagePath = "";
        if($request->hasfile('photo')){
            $imagePath = $request->file('photo')->store('public');
        }

        $user->name = $request->user;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();


        $employees->fName = $request->firstname;
        $employees->lName = $request->lastname;
        $employees->jobTitle = $request->job;

        if(empty($imagePath)){

        }else{
            $employees->imge = $imagePath;

        }
        $employees->status = $request->status;
        $employees->lang = $request->location;



        $employees->save();

        return redirect('/home');



    }

    public function destroy($iduser,$idemp)
    {
        $emp = Employee::find($idemp);
        $user = Employee::find($iduser);
        $emp->delete();
        $user->delete();

        return back();
    }
}
