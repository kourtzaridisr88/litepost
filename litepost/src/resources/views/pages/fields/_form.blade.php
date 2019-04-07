<!-- Hidden Global Inputs -->
<input type="hidden" name="post_type_id" value="{{ $postTypeId }}">
<!-- ./Hidden Global Inputs -->
<div class="form-group">
    <label for="label">Label</label>
    <input type="text" class="form-control form-control--small {{ $errors->has('label') ? ' is-invalid' : '' }}" id="label" name="label" value="{{ $field->label ?? '' }}">
    <small id="label" class="form-text text-muted">The label of the field</small>
    @if ($errors->any())
    {{ dd($errors) }}
    @endif
    @if ($errors->has('label'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('label') }}</strong>
        </span>
    @endif
</div><!-- ./form-group -->

<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control form-control--small {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" value="{{ $field->name ?? '' }}">
    <small id="name" class="form-text text-muted">The name of the field</small>

    @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div><!-- ./form-group -->

<div class="form-group">
    <label for="type">Type</label>
    <select class="form-control form-control--small" id="type" name="type">
        <option value="text">Text</option>
        <option value="richtext">RichText</option>
        <option value="image">Image</option>
        <option value="gallery">Gallery</option>
        <option value="select">Select (Not supported)</option>
        <option value="checkbox">CheckBox (Not supported)</option>
        <option value="relation">Relation (Not supported)</option>
    </select>
</div><!-- ./form-group -->


<div class="form-group">
    <input type="submit" class="btn btn--purple w-100" value="Save">
</div><!-- ./form-group -->