<?php

namespace App\Http\Controllers;

use App\Models\fssa_question;
use Illuminate\Http\Request;

class FssaQuestionController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $questions = fssa_question::all();
            return $questions;
        }catch (\Exception $e) {
            $e->getMessage();
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
            $question = new fssa_question();
            $question->title = $request->title;
            $question->questionnaire_id = $request->questionnaire_id;
            $question->save();
        }catch (\Exception $e) {
            $e->getMessage();
        }
    }


    public function get($title)
    {
        try{
            $question = fssa_question::where('title','=',$title)->get();
            return response() -> json(['status' => 200, 'posts' => $question]);
        }catch (\Exception $e) {
            $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($questionnaire_id)
    {
        try{
            $questions = fssa_question::where('questionnaire_id','=',$questionnaire_id)->orderBy('id')->get();
            return $questions;
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
        try{
            $questions = fssa_question::find($id);
            return $questions;
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
            $question = fssa_question::find($id);
            $question->title = $request->title;
        if($question -> save()){
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
