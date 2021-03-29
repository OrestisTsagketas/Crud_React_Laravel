<?php

namespace App\Http\Controllers;

use App\Models\fssa_questionnaire;
use App\Models\fssa_question;
use App\Models\fssa_answer;
use Illuminate\Http\Request;

class FssaQuestionnaireController extends Controller
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
        $questionnaires = fssa_questionnaire::all();
        return $questionnaires;
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
        $questionnaire = new fssa_questionnaire();
        $questionnaire->title = $request->title;
        if($questionnaire -> save()){
            return response()->json(["status" => 200]);
        }
    }

    public function get($title)
    {
        $questionnaire = fssa_questionnaire::where('title','=',$title)->get();
        return response() -> json(['status' => 200, 'posts' => $questionnaire]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questionnaire = fssa_questionnaire::find($id);
        return response() -> json(['status' => 200, 'posts' => $questionnaire]);
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
        $questionnaire = fssa_questionnaire::find($id);
        $questionnaire->title = $request->title;
        if($questionnaire -> save()){
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
        $questionnaire = fssa_questionnaire::find($id);
        if($questionnaire -> delete()){
        return response()->json(["status" => 200]);
        }
    }
}
