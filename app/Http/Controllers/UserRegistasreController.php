<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;
use Image;
class UserRegistasreController extends Controller
{
    public function UserShow(){
      
      if (Auth::user()->role=='admin') {
          
    	return view('backend/cuching_auth/register');
      }else{
         return redirect('/home');
      }
    	



    }


     public function UserSave(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        
        $data['user'] = user::get();

        return view('backend/users/user_list',$data);
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'numeric', 'min:11'],
            'role' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

       protected function create(array $data)
    {
        return User::create([
            'role' => $data['role'],
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function UserViewlist(){
       
        if (Auth::user()->role=='admin') {
            
      $data['user'] = user::get();
    	return view('backend/users/user_list',$data);
        }else{

            return redirect('/home');
        }

    }

    public function UserProfile(){

        $id = Auth::user()->id;

        $data['user'] = user::find($id);

        return view('backend/users/user_profile',$data);
    }

    public function UserProfileajax(){
     
      $id = Auth::user()->id;

        $data['user'] = user::find($id);

        return view('backend/users/profile_view_ajax',$data);

    }

    public function UserProfileajaxsave(Request $Request){

        if ($Request->ajax()) {
            

            $edite = user::find($Request->UserId);

            $edite->name = $Request->name;
            $edite->email = $Request->email;
            $edite->mobile = $Request->mobile;
            $edite->save();
        
        }

    }

    public function passwordChange(Request $Request){

        if ($Request->ajax()) {
            
            if (Auth::attempt(['id'=>$Request->UserId,'password'=>$Request->current_password])) {
                
                $user = User::find($Request->UserId);
                $user->password = Hash::make($Request->new_password);
                $user->save();


            }
        }
    }

    public function profileChange(Request $Request){

        $user = User::find($Request->UserId);

        if ($Request->hasFile('avater')) {
            
            $image = $Request->file('avater');

            $full_name = time().'.'.$image->getClientOriginalExtension();

            @unlink(public_path('backend/profile/'.$user->avater));

            Image::make($image)->resize(300,340)->save('public/backend/profile/'.$full_name);

            $user->avater = $full_name;

            $user->save();
        }

        if ($user->save()) {
            
            echo "success";

            $notification = array(
             'message'=>'image successfully uploaded',
             'alert-type'=>'success',
            );


           return redirect()->back()->with($notification); 
        }
    }
}
