<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\Generics;
use App\Models\User;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;

class UserControllerHandler extends Controller
{
    //
    use Generics;
    function __construct(User $user){
        $this->middleware('auth', ['except' => ['deleteUsers']]);
        $this->user = $user;
    }

    function dashboardInterface(){
        return view('admin_dashboard.index');
    }

    function createAdminInterface(){
        return view('admin_dashboard.add_admins');
    }

    function adminLists(){
        $user = $this->user->getAllUsers([
            ['user_type', '=', 'admin'],
        ]);
        
        return view('admin_dashboard.view_admins', ['user'=>$user]);
    }

    function userLists(){
        $user = $this->user->getAllUsers([
            ['user_type', '=', 'user'],
        ]);
       
        return view('admin_dashboard.view_users', ['user'=>$user]);
    }

    protected function Validator($request){

        $this->validator = Validator::make($request->all(), [
            'admin_name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'phone' => 'required',
        ]);
    }

    public function createAdminAccount(Request $request){
        $data = $request->all();

        try {
            $this->Validator($request); //validate fields

            $unique_id = $this->createUniqueId('users', 'unique_id');

            $user = new User();
            $user->unique_id = $unique_id;
            $user->name = $data['admin_name'];
            $user->email = $data['email'];
            $user->user_name = $data['username'];
            $user->password = Hash::make($data['password']);
            $user->user_type = 'admin';
            $user->country = 'Nigeria'; 
            $user->phone = $data['phone']; 
            $user->user_name = $data['username']; 
            
            if ($user->save()) {
                return redirect()->back()->with('success', 'Admin Account Created Successfully');
            } else {
                return redirect()->back()->with('error', 'An Error occurred, Please try Again Later');
            }
        } catch (Exception $exception) {

            $errorsArray = $exception->getMessage();
            return  redirect()->back()->with('error', $errorsArray);
        }

    }

    function handleValidations(array $data)
    {

        $validator = Validator::make($data, [
            'dataArray' => 'required|string'
        ]);

        return $validator;
    }

    public function deleteUsers(Request $request){
        try {

            $validation = $this->handleValidations($request->all());
            if ($validation->fails()) {
                return response()->json(['error_code' => 1, 'error_message' => $validation->messages()]);
            }

            $dataArray = explode('|', $request->dataArray);

            foreach ($dataArray as $eachDataArray) {
                //update the ad status to confirmed
                $user = $this->user->selectSingleUser($eachDataArray);
                $user->delete();
            }
            return response()->json(['error_code' => 0, 'success_statement' => 'Was deleted successfully']);
        } catch (Exception $exception) {
            $error = $exception->getMessage();
            return response()->json(['error_code' => 1, 'error_message' => ['general_error' => [$error]]]);
        }
    }
}
