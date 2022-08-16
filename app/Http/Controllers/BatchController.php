<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Batch::paginate(10);
        return response()->json(['statusCode'=>'200','message'=>'Data batch has been obtained !','data'=>$data], 200);
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
            'name'=>$request->name,
            'max'=>$request->max,
            'start_from'=>$request->start_from,
            'end_from'=>$request->end_from,
        ];

        Batch::create($data);

        return response()->json(['statusCode'=>'200','message'=>'Batch data has been saved successfully !','data'=>$data], 200);
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
            'name'=>$request->name,
            'max'=>$request->max,
            'start_from'=>$request->start_from,
            'end_from'=>$request->end_from,
        ];

        Batch::where('id',$id)->update($data);


        return response()->json(['statusCode'=>'200','message'=>'Batch data has been saved successfully !','data'=>$data], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $plant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Batch::where('id',$id)->delete();

        return response()->json(['statusCode'=>'200','message'=>'Batch data deleted successfully !'], 200);
    }
}
