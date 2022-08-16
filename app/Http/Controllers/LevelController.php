<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
    public function index()
    {
        $data = Level::paginate(10);
        return response()->json(['statusCode'=>'200','message'=>'Data Level has been obtained !','data'=>$data], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validator

        $data = [
            'appointment_id'=>$request->appointment_id,
            'rate'=>$request->rate,
            'reason'=>$request->reason,
            'summary'=>$request->summary,
            'constrain'=>$request->constrain,
            'summary'=>$request->summary,
        ];

        Level::create($data);

        return response()->json(['statusCode'=>'200','message'=>'Level data has been saved successfully !','data'=>$data], 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $plant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'appointment_id'=>$request->appointment_id,
            'rate'=>$request->rate,
            'reason'=>$request->reason,
            'summary'=>$request->summary,
            'constrain'=>$request->constrain,
            'summary'=>$request->summary,
        ];

        Level::where('id', $id)->update($data);


        return response()->json(['statusCode'=>'200','message'=>'Level data has been saved successfully !','data'=>$data], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $plant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Level::where('id', $id)->delete();

        return response()->json(['statusCode'=>'200','message'=>'Level data deleted successfully !'], 200);
    }
}
