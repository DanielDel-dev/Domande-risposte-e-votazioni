<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2>{{ $answersCount . " " . Str::plural('Answer', $answersCount) }}</h2>
                </div>
                <hr>
                <x-_messages></x-_messages>
                @foreach ($answers as $answer)
                    <dv class="media">
                        <div class="d-fex flex-column vote-controls">
                            <a title="This question is useful" class="vote-up">
                                <i class="material-icons">keyboard_arrow_up</i>
                            </a>
                            <span class="votes-count">1230</span>
                            <a title="This question is not useful" class="vote-down off">
                                <i class="material-icons">keyboard_arrow_down</i>
                            </a>
                            <a title="Best answer" class="vote-accepted mt-2">
                                <i class="material-icons">check</i>
                            </a>
                        </div>
                        <div class="media-body">
                            {{ $answer->body }}
                            <div class="container">
                                <div class="row">
                                    <div class="col-4 px-0 mt-4">
                                        @if (!Auth::user())
                                            {{-- non può moficare e ne cancellare --}}
                                        @else
                                        
                                            @if (Auth::user()->can('update-answer', $answer))
                                            <a href="{{ route('questions.answers.edit', [$question->id, $answer->id]) }}">Edit</a>
                                            @endif

                                            @if (Auth::user()->can('delete-answer', $answer))
                                        
                                            <form class="d-inline mx-3" action="{{ route('questions.answers.destroy', [$question, $answer]) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are tou sure?')">Delete</button>

                                            </form>

                                            @endif
                                            
                                        @endif
                                    </div>
                                    <div class="col 4">

                                    </div>
                                    <div class="col 4">
                                        <div class="float-right mt-4">
                                            <span class="text-muted small">
                                                Ansewered {{ $answer->created_date }}
                                            </span>
                                            <div class="media mt-2">
                                                <a href="{{ $answer->user->url }}" class="pr-2">
                                                <img src="{{ $answer->user->avatar }}" alt="">
                                                </a>
                                                <div class="media-body mt-1">
                                                    <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </dv>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>