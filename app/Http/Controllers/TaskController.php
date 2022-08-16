<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Task::paginate(10);
        return response()->json(['statusCode'=>'200','message'=>'Data Task has been obtained !','data'=>$data], 200);
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
            'nama'=>$request->nama,
            'objective'=>$request->objective,
        ];
        $task = Task::create($data);
        foreach ($request->questions as $key => $question) {
            $quest = Question::create([
                'questions'=>$request->questions,
                'is_active'=>true,
                'task_id'=>$task,
                'type'=>$question->type
            ])->id;

            if ($question->type == 'multiple_choice') {
                foreach ($request->choices as $key => $choice) {
                    Choice::create([
                        'question_id'=>$quest,
                        'is_right_choice'=>$choice->is_right_choice,
                        'choice'=>$choice->choice,
                    ]);
                }
            }
        }



        return response()->json(['statusCode'=>'200','message'=>'Task data has been saved successfully !','data'=>$data], 200);
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

        Task::where('id', $id)->update($data);


        return response()->json(['statusCode'=>'200','message'=>'Task data has been saved successfully !','data'=>$data], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $plant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::where('id', $id)->delete();

        return response()->json(['statusCode'=>'200','message'=>'Task data deleted successfully !'], 200);
    }


    public function createQuestion(Request $request)
    {
        Question::create([
            ''
        ]);
    }
}
