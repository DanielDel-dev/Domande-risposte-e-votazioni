@csrf
<div class="form-group">
    <label for="question-title">Question Title</label>
    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="question-title" value="{{ old('title', $title) }}">
    @if ($errors->has('title'))
        <div class="invalid-feedback">
            <p>{{ $errors->first('title') }}</p>
        </div>
    @endif
</div>
<div class="form-group">
    <label for="question-body">Explain you question</label>
    <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body" id="question-body" rows="10">{{ old('body', $body) }}</textarea>
    @if ($errors->has('body'))
        <div class="invalid-feedback">
            <p>{{ $errors->first('body') }}</p>
        </div>
    @endif
</div>
<div class="form-group">
    <button class="btn btn-outline-primary btn-lg" type="submit">{{ $buttonText }}</button>
</div>