@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>All Questions</h2>
                        <div class="ml-auto">
                            <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">Ask Question</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <x-_messages></x-_messages>
                    @foreach ($questions as $question)
                        <div class="media">
                            <div class="d-flex flex-column counters mr-4 text-center">
                                <div class="vote mb-4">
                                    <p class="stat mb-1">{{ $question->votes }}</p> 
                                    <p>{{ Str::plural('vote', $question->votes) }}</p>
                                </div>
                                <div class="status {{ $question->status }}">
                                    <p class="stat mb-1">{{ $question->answers_count }}</p> {{ Str::plural('answer', $question->answers_count) }}
                                </div>
                                <div class="view mt-3">
                                    {{ $question->views . " " . Str::plural('view', $question->views) }}
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="d-flex align-intems center">
                                    <h3 class="mt-0"> <a href="{{ route('questions.show', $question) }}">{{ $question->title }}</a></h3>
                                    <div class="ml-auto">

                                        @if (!Auth::user())
                                            {{-- non può moficare e ne cancellare --}}
                                        @else
                                        
                                            @if (Auth::user()->can('update-question', $question))
                                            <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
                                            @endif

                                            @if (Auth::user()->can('delete-question', $question))
                                        
                                            <form class="d-inline" action="{{ route('questions.destroy', $question->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are tou sure?')">Delete</button>
                                            </form>

                                            @endif
                                            
                                        @endif
                                    </div>
                                </div>
                                <p class="lead"> 
                                    Asked by 
                                    <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                    <small class="text-muted">{{ $question->created_date }}</small>
                                </p>
                                {{ Str::limit($question->body, 25) }}
                            </div>
                        </div>
                        <hr>
                    @endforeach

                    {{ $questions->links('pagination::bootstrap-4') }} 

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
