<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AnswersController extends Controller
{ 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question, Request $request)
    {

        $question->answers()->create(

            $request->validate([

                'body' => 'required'
                
            ]) + ['user_id' => Auth::id()]);

        return back()->with('success', 'Your answer has been submitted');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question, Answer $answer)
    {
        if (!Gate::allows('update-answer', $answer)) {
            abort(403,"Accesso negato");
        }
        return view('answers.edit', compact('question', 'answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question, Answer $answer)
    {
        if (!Gate::allows('update-answer', $answer)) {
            abort(403,"Accesso negato");
        }
        $answer->update($request->only('body'));

        return redirect()->route('questions.show', $question)->with('success', "Question has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, Answer $answer)
    {
        if (!Gate::allows('delete-answer', $answer)) {
            abort(403,"Accesso negato");
        }

        $answer->delete();

        return back()->with('success', "Answer has been deleted");


    }
}
