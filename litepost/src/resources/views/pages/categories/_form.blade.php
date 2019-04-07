<!-- Hidden Global Inputs -->
<input type="hidden" name="post_type_id" value="{{ $postTypeId }}">
<!-- ./Hidden Global Inputs -->
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control form-control--small {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" value="{{ $category->title ?? '' }}">
    <small id="title" class="form-text text-muted">The title of the category</small>

    @if ($errors->has('title'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif
</div><!-- ./form-group -->

<div class="form-group">
    <label for="slug">Slug</label>
    <input type="text" class="form-control form-control--small {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="slug" name="slug" value="{{ $category->slug ?? '' }}">
    <small id="slug" class="form-text text-muted">The slug of the category</small>

    @if ($errors->has('slug'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('slug') }}</strong>
        </span>
    @endif
</div><!-- ./form-group -->


<div class="form-group">
    <input type="submit" class="btn btn--purple w-100" value="Save">
</div><!-- ./form-group -->