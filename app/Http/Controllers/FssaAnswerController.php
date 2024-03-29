<?php

namespace App\Http\Controllers;

use App\Models\fssa_answer;
use Illuminate\Http\Request;

class FssaAnswerController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $answers = fssa_answer::all();
            return $answers;
        }catch (\Exception $e) {
      
            return $e->getMessage();
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $answer = new fssa_answer();
            $answer->title = $request->title;
            $answer->question_id = $request->question_id;
            $answer->save();
        }catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($question_id)
    {   
        try{
            $answers = fssa_answer::where('question_id','=',$question_id)->get();
            return response() -> json(['status' => 200, 'posts' => $answers]);
        }catch (\Exception $e) {
            $e->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        try{$answer = fssa_answer::find($id);
            return $answer;
        }catch (\Exception $e) {
            $e->getMessage();
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        try{
            $answer = fssa_answer::find($id);
            $answer->title = $request->title;
            if($answer -> save()){
                return response()->json(["status" => 200]);
            }
        }catch (\Exception $e) {
            $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        //
    }
}
