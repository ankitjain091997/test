<?php

namespace App\Http\Controllers;
use App\Models\Register;
use Illuminate\Http\Request;
use Hash;
use App\Models\Todo;
class RegistrationController extends Controller
{

    public function index()
    {
       return view('register');
    }
    public function store(Request $request)
    {
        // dd($request);
        if(@$request->id)
        {
            $request->validate([
                'name'=>'required',
                
                'email'=>'required|email',
                
               
                'hobbies'=>'required',
                
                  
    
            ]);

            $input = $request->except('_token');
             if ($image = $request->file('file')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['file'] = "$profileImage";

        }
            
            Register::where('id',$request->id)->update($input);
            return redirect()->route('list');
        }
        else{
            // dd($request);
             $input = $request->all();
        //    dd($request);
            if ($image = $request->file('file')) {
                

            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['file'] = "$profileImage";
            $request['file'] = $profileImage;
            $request->validate([
                'name'=>'required',
                // 'image' => 'required|image|mimes:png,jpg,jpeg|max:300',
                'email'=>'required|email|unique:registrations',
                'password' => 'required|min:8|max:16|regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d][A-Za-z\d!@#$%^&*()_+]{4,}$/',
               
                'hobbies'=>'required',
                
                  
    
            ]);


            
           
        
        }
        
            $input['password'] = Hash::make($request->password);
            
            // dd($request);
            // dd($input);
            Register::create($input);
            return redirect()->route('list');
        }
        
       
    }
    public function list(){
       $register =  Register::all();
        return view('list',compact('register'));
    }
    public function edit($id){
        $register =  Register::where('id',$id)->first();
         return view('register',compact('register'));
     }
    public function destroy($id){
       
        $register =  Register::where('id',$id)->delete();
         return redirect()->back();
     }

     public function webrinvent(){

        return view('webreinvent');
     }
    public function savetask(Request $request){
        
        $todo = new Todo;
        $todo->task = $request->task;
        $todo->save();
        
        $data = Todo::all();
        return response()->json(['data'=>$data]);
        
     }
}
