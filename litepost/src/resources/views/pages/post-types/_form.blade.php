<div class="form-group">
    <label for="name_singular">Singular Name</label>
    <input type="text" class="form-control form-control--small {{ $errors->has('name_singular') ? ' is-invalid' : '' }}" id="name_singular" name="name_singular" value="{{ $postType->name_singular ?? '' }}">
    <small id="name_singular" class="form-text text-muted">The singular name of the post type</small>

    @if ($errors->has('name_singular'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name_singular') }}</strong>
        </span>
    @endif
</div><!-- ./form-group -->

<div class="form-group">
    <label for="name_plural">Plural Name</label>
    <input type="text" class="form-control form-control--small" id="name_plural" name="name_plural" value="{{ $postType->name_plural ?? '' }}">
    <small id="name_plural" class="form-text text-muted">The plural name of the post type</small>
</div><!-- ./form-group -->

@if($view == 'index')
<div class="form-group">
    <label for="slug">Slug</label>
    <input type="text" class="form-control form-control--small {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="slug" name="slug" value="{{ $postType->slug ?? '' }}">
    <small id="slug" class="form-text text-muted">The slug of the post type</small>

    @if ($errors->has('slug'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('slug') }}</strong>
        </span>
    @endif
</div><!-- ./form-group -->
@endif

<div class="form-group">
    <input type="submit" class="btn btn--purple w-100" value="Save">
</div><!-- ./form-group -->

@if($view == 'edit')
<div class="form-group">
    <a href="{{ route('litepost.fields.create', ['postType' => $postType->id]) }}" class="btn btn--purple w-100" data-action="">Add Field</a>
</div><!-- ./form-group -->
@endif