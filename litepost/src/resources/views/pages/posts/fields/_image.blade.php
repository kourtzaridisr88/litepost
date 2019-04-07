<div class="form-group">
    <label for="{{ $customField->fieldable->name }}">{{ $customField->fieldable->label }}</label>
    <input type="text" class="form-control form-control--small {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="{{ $customField->fieldable->name }}" name="custom_fields[{{ $customField->fieldable->name }}]">

    @if ($errors->has($customField->fieldable->name))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first($customField->fieldable->name) }}</strong>
        </span>
    @endif
</div><!-- ./form-group -->