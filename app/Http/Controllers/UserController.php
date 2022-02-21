<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $role = Role::orderBy('id','DESC')->where('name', '!=', 'superadmin')->get();
        $user = DB::table('users')
                    ->leftJoin('model_has_roles','users.id','model_has_roles.model_id')
                    ->leftJoin('roles','model_has_roles.role_id','roles.id')
                    ->select('users.*','roles.name as role','roles.display_name as role_name')
                    ->orderBy('id','DESC')
                    ->get();
        return view('backend.Setup.user_role',compact('user','role'));
    }

    public function add(Request $request)
    {
        /*$request->validate([
             'role' => 'required',
             'name' => 'required|string|max:255',
             'email' => 'required|email|max:255|unique:users',
             'password' => 'required|string|min:6|max:255|confirmed'
        ]);*/
        $validation = Validator::make(
            $request->all(),
            [
                'role'      => 'required',
                'name'      => 'required|string|max:255',
                'email'     => 'required|email|max:255|unique:users',
                'password'  => 'required|string|min:6|max:255|confirmed'
            ],
        );
        if($validation->passes()) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->assignRole($request->role);
            return response()->json([
                'message'  => 'User added successfully.',
                'type' => 'success'
            ]);
        } else {
            return response()->json([
                'message'  => $validation->errors()->all(),
                'type' => 'error'
            ]);
        }
    }

    public function edit(Request $request)
    {
        // $user = User::find($id);
        // $roles = Role::pluck('name','name')->all();
        // $userRole = $user->roles->pluck('name','name')->all();
        // $id = $request->id;
        // $user = User::find($id);
        // $name = $user->name;
        // $rol = DB::table('model_has_roles')->where('model_id', $id)->get();
        // $roles = DB::table('roles')->where('id', $rol->role_id)->get();
        // $roles = DB::table('model_has_roles')
        //             ->leftJoin('roles','model_has_roles.role_id','roles.id')
        //             ->where('model_has_roles.model_id', $id)
        //             ->select('roles.name')
        //             ->first();
        // $role = $roles->name;
        $id = $request->id;
        $user = DB::table('users')
                    ->leftJoin('model_has_roles','users.id','model_has_roles.model_id')
                    ->leftJoin('roles','model_has_roles.role_id','roles.id')
                    ->select('users.*','roles.name as role')
                    ->where('users.id', $id)
                    ->first();
        $name = $user->name;
        $role = $user->role;
        return response()->json([
                            'id'    => $id,
                            'name'  => $name,
                            'role'  => $role,
                        ]);
    }

    public function update(Request $request)
    {
        // $this->validate($request, [
        //     'roles' => 'required'
        // ]);
        $id = $request->id;
        $user = User::find($id);
        $user->update([ 'name'  =>  $request->name  ]);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->role);
        return response()->json('good');
    }

    public function change_password(Request $request)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'old_password'  => 'required|string|min:6|max:255',
                'password'      => 'required|string|min:6|max:255|confirmed'
            ],
            [
                'old_password.required'=>'Old password is required.',
                'old_password.string'=>'Old password must be characters',
                'old_password.min'=>'Old password minimum 6 characters needed',
                'old_password.max'=>'Old password maximum 255 characters needed',
                'password.required'=>'Password is required.',
                'password.string'=>'Password must be characters',
                'password.min'=>'Password minimum 6 characters needed',
                'password.max'=>'Password maximum 255 characters needed',
                'password.confirmed'=>'Confirm Password must be matched',
            ]
        );
        if($validation->passes()) {
            $user = User::where($request->id)->first();
            if(!empty($user)) {
                $user->update([
                    'password' => Hash::make($request->password)
                ]);
                return response()->json([
                    'message' => 'Password changed successfully.',
                    'type' => 'success'
                ]);
            } else {
                return response()->json([
                    'message'  => 'Password not changed',
                    'type' => 'error'
                ]);
            }
        } else {
            return response()->json([
                'message'  => $validation->errors()->all(),
                'type' => 'error'
            ]);
        }
    }

    public function image_upload(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // $extension = $file->getClientOriginalExtension();
            // $file_name = $file->getClientOriginalName();
            // $origin_name = Auth::user()->name;
            // $origin_name = str_replace(' ', '_', $origin_name);
            $file_name = uniqid().$file->getClientOriginalName();
            $uploadPath = 'public/uploads/';
            $file->move($uploadPath,$file_name);
            return $uploadPath.$file_name;
        }
        return '';
        // if (!empty($request->file('file_name'))) {
        //     foreach ($request->file('file_name') AS $key => $files) {
        //         $extension = $files->getClientOriginalExtension();
        //         $origin_name = pathinfo($files->getClientOriginalName(), PATHINFO_FILENAME);
        //         $origin_name = str_replace(' ', '_', $origin_name);
        //         $origin_name = substr($origin_name, 0,20);
        //         $fileName = $origin_name."_attach_nX_".round(microtime(true) * 10)."_".($key+1).'.'. $extension;
        //         $attachment = new Attachment();
        //         $attachment->file_name = $fileName;
        //         $attachment->reference_number = $reference_number;
        //         $attachment->attachment_date = date('Y-m-d');
        //         $attachment->uploaded_by = Auth::user()->id;
        //         $attachment->save();
        //         //$files->move($docDestPath, $fileName);

        //         $fileContent = File::get($files->getRealPath());
        //         Storage::disk('custom_storage')->put($fileName, $fileContent);

        //         /*$image                   =       $files;
        //         $img                     =       ImageResizer::make($image->path());

        //         // --------- [ Resize Image ] ---------------
        //         $imgInfo = $img->resize(150, 100, function ($constraint) {
        //             $constraint->aspectRatio();
        //         })->save($docDestPath.'/'.$fileName);*/
        //     }
        // }
    }

    public function profile_image(Request $request)
    {
        // $validation = Validator::make(
        //     $request->all(),
        //     [
        //         'image' => 'required',
        //     ],
        //     [
        //         'image.required' => 'Profile Image is required.',
        //     ]
        // );
        // if($validation->passes()) {
        //     User::where('id', Auth::user()->id)->update([
        //         'image' =>  $request->image,
        //     ]);
        //     return response()->json([   
        //         'type'  =>  'success',
        //         'data'  =>  'Profile Image Uploaded Successfully'  
        //     ]);
        // } else {
        //     return response()->json([   
        //         'type'  =>  'error',
        //         'data'  =>  'Profile Image Not Uploaded' 
        //     ]);
        // }
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $file_name = uniqid().$file->getClientOriginalName();
            $uploadPath = 'public/profile/';
            $file->move($uploadPath,$file_name);
            $image = $uploadPath.$file_name;
            User::where('id', Auth::user()->id)->update([  'image' =>  $image  ]);
            return $image;
        }
        return '';
    }

}
