<?php

namespace App\Http\Controllers;

use App\Model\Question;
use Illuminate\Http\Request;
use App\Http\Resources\QuestionResource;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        return  QuestionResource::collection(Question::latest()->paginate(3));
    }

    public function store(Request $request)
    {
        $question = auth()->user()->question()->create($request->all());
        return response(new QuestionResource($question), Response::HTTP_CREATED);
    }

 
    public function show(Question $question)
    {
        return new QuestionResource($question);
    }


    public function update(Request $request, Question $question)
    {
        // dd($request->all());
        $question->update($request->all());
        return response('Updated', Response::HTTP_ACCEPTED);
    }
   

    public function destroy(Question $question)
    {
        $question->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
