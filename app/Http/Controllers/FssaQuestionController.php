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
        // $questionnaires = Questionnaire::orderBy('updated_at', 'DESC')->get();
        // return response() -> json(['status' => 200, 'posts' => $questionnaires]);
        $questions = fssa_question::all();
        return $questions;
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
        $question = new fssa_question();
        $question->title = $request->title;
        $question->questionnaire_id = $request->questionnaire_id;
        $question->save();
    }


    public function get($title)
    {
        $question = fssa_question::where('title','=',$title)->get();
        return response() -> json(['status' => 200, 'posts' => $question]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($questionnaire_id)
    {
        $questions = fssa_question::where('questionnaire_id','=',$questionnaire_id)->orderBy('id')->get();
        // return response() -> json(['status' => 200, 'posts' => $questions]);
        return $questions;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questions = fssa_question::find($id);
        return $questions;
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
        $question = fssa_question::find($id);
        $question->title = $request->title;
        if($question -> save()){
            return response()->json(["status" => 200]);
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
