@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Ask Question</h2>
                        <div class="ml-auto">
                            <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to all questions</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('questions.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="question-title">Question Title</label>
                            <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="question-title" value="{{ old('title') }}">
                            @if ($errors->has('title'))
                                <div class="invalid-feedback">
                                    <p>{{ $errors->first('title') }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="question-body">Explain you question</label>
                            <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body" id="question-body" rows="10">{{ old('body') }}</textarea>
                            @if ($errors->has('body'))
                                <div class="invalid-feedback">
                                    <p>{{ $errors->first('body') }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-outline-primary btn-lg" type="submit">Ask this question</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection