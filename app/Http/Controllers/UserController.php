<?php

namespace App\Http\Controllers;

use App\Models\Annoucement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function annount(Request $request){
        $rules = [
            'title' => 'required|max:70|string',
            'description' => 'required',
            'deadline' => 'required',
            'solary' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            $errors = $validator->errors();

            return response($errors, 419);
        } else {

            Annoucement::create([
                'title' => $request->title,
                'description' => $request->description,
                'deadline' => $request->deadline,
                'solary' => $request->solary,
                'user_id' => auth()->user()->id
            ]);

            return response('success', 200);
        }

    }
    public function myannount(){
        $myannounts= Annoucement::all();

        return $myannounts;
    }
    public function delete($id){
         Annoucement::where("id", $id)->delete();

         return 'success';
    }
    public function update(Request $request, $id)
    {
             $item = Annoucement::find($id);
             $item->update([
                 'title' => $request->title,
                 'description' => $request->description,
                 'deadline' => $request->deadline,
                 'solary' => $request->solary,
                 'user_id' => auth()->user()->id
             ]);
//               $item->title = $request->title;
//                $item->description = $request->description;
//                $item->eadline = $request->deadline;
//                $item->solary = $request->solary;
//                $item->user_id = auth()->user()->id;

              return $item;

    }

}
