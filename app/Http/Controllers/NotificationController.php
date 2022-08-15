<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $data = Notification::all()->paginate(10);
        return response()->json(['statusCode'=>200, 'message'=>'Get All Notification','data'=>$data], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['statusCode'=>401,'message'=>'Error','data'=>$validator->errors()], 200);
        }

        if ($request->type == 'bulk') {
            $data = [
                'title'=>$request->title,
                'content'=>$request->content,
                'from'=>$request->from,
                'for'=>'*',
                'is_read'=>false
            ];
            Notification::create($data);
        } else {
            $data = [];
            foreach ($request->specific_user_ids as $us) {
                $data[] = [
                    'title'=>$request->title,
                    'content'=>$request->content,
                    'from'=>$request->from,
                    'for'=>$us,
                    'is_read'=>false
                ];
                Notification::create($data);
            }
        }


        return response()->json(['statusCode'=>200,'message'=>'Notification Successfully Created !','data'=>$data], 200);
    }
}
