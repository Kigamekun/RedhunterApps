<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
    public function index()
    {
        $data = Consultation::paginate(10);
        return response()->json(['statusCode'=>'200','message'=>'Data Consultation has been obtained !','data'=>$data], 200);
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
            'title'=>$request->title,
            'body'=>$request->body,
            'status'=>0,
        ];

        Consultation::create($data);

        return response()->json(['statusCode'=>'200','message'=>'Consultation data has been saved successfully !','data'=>$data], 200);
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
            'title'=>$request->title,
            'body'=>$request->body,
            'status'=>0,
        ];

        Consultation::where('id', $id)->update($data);


        return response()->json(['statusCode'=>'200','message'=>'Consultation data has been saved successfully !','data'=>$data], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $plant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Consultation::where('id', $id)->delete();

        return response()->json(['statusCode'=>'200','message'=>'Consultation data deleted successfully !'], 200);
    }
}
