<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        if(Auth::user()->role == 'Branch Manager'){
            $employees = User::where('branch_id',Auth::user()->branch_id)->where('role','Employee')->get();
            $branches=Branch::get();
            // dd(Auth::user()->branch_id);
            return view('employee.index',['employees'=>$employees,'branches'=>$branches]);
        }
        
        else{
            $employees=User::where('role','Employee')->get();
            $branches=Branch::get();
            return view('employee.index',['employees'=>$employees,'branches'=>$branches]);
        }
        
        // dd($branches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employee.create')->with(['branches'=>Branch::get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        if(Auth::user()->role == 'Branch Manager'){
            // $branch_id = Auth::user()->branch_id;
            $request->validate([
                'name'=>"required|unique:users,name",
                'email'=>'required|unique:users,email',
            ]);
            User::insert([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make('123456'),
                'branch_id'=>$request->branch_id,
                'role'=>'Employee'
            ]);
            return redirect()->route('employee.index');
        }
        else{
            $request->validate([
                'name'=>"required|unique:users,name",
                'email'=>'required|unique:users,email',
            ]);
            User::insert([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make('123456'),
                'branch_id'=>$request->branch_id,
                'role'=>'Employee'
            ]);
            return redirect()->route('employee.index');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $employee = User::find($id);
        return view('employee.view',['employee'=>$employee,'branch'=>Branch::get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employee = User::find($id);
        // dd($employee);
        return view('employee.edit',['employee'=>$employee,'branch'=>Branch::get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if(Auth::user()->role == 'Branch Manager'){
            $request->validate([
                'name'=>'required',
                'email'=>'required'
            ]);
    
            $employees=User::find($id);
            $employees->name=$request->input('name');
            $employees->email=$request->input('email');
            $employees->save();
    
            return redirect()->route('employee.index')->with('update','Product has been updated successfully');
        }
        else{
            $request->validate([
                'name'=>'required',
                'email'=>'required'
            ]);
    
            $employees=User::find($id);
            $employees->name=$request->input('name');
            $employees->email=$request->input('email');
            $employees->branch_id=$request->input('branch_id');
            $employees->save();
    
            return redirect()->route('employee.index')->with('update','Product has been updated successfully');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $employees=User::find($id);
        $employees->delete();
        return redirect()->route('employee.index');
    }
}
