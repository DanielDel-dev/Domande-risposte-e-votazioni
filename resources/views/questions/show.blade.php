@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h1>{{ $question->title }}</h1>
                            <div class="ml-auto">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to all questions</a>
                            </div>
                        </div>
                    </div>

                    <hr>
    
                    <div class="media">
                        <div class="d-fex flex-column vote-controls">
                            <a title="This question is useful" class="vote-up">
                                <i class="material-icons">keyboard_arrow_up</i>
                            </a>
                            <span class="votes-count">1230</span>
                            <a title="This question is not useful" class="vote-down off">
                                <i class="material-icons">keyboard_arrow_down</i>
                            </a>
                            <a title="Click to mark as favorite question (Click again to undo)" class="favorite mt-2 favorited">
                                <i class="material-icons">star</i>
                                <span class="favorites-count">123</span>
                            </a>
                        </div>
                        <div class="media-body">
                            {{ $question->body }}
                            <div class="float-right mt-4">
                                <span class="text-muted small">
                                    Ansewered {{ $question->created_date }}
                                </span>
                                <div class="media mt-2">
                                    <a href="{{ $question->user->url }}" class="pr-2">
                                    <img src="{{ $question->user->avatar }}" alt="">
                                    </a>
                                    <div class="media-body mt-1">
                                        <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.answers', [
        'answers' => $question->answers,
        'answersCount'=>$question->answers_count
    ])

    @include('components.createAnswers')
</div>
@endsection