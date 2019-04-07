<div class="form-group" data-controller="gallery" data-fieldable="{{ $customField->fieldable->name }}">
    <label for="{{ $customField->fieldable->name }}">{{ $customField->fieldable->label }}</label>
    <input type="file" multiple class="form-control form-control--small" data-target="gallery.imagesInput" data-action="change->gallery#upload">

    <div class="row images__wrapper" data-target="gallery.imagesWrapper">
        @if(isset($post) || old('custom_fields.' . $customField->fieldable->name))
            @php
                $images = isset($post) ? old('custom_fields.' . $customField->fieldable->name, $post->field($customField->fieldable->name ))  : old('custom_fields.' . $customField->fieldable->name)
            @endphp

            @foreach($images as $image)
                <div class="image col-md-3">
                    <span class="image__action" data-action="click->gallery#deleteImage">&times;</span>
                    <img src="/uploads/images/{{ $image }}" class="img-thumbnail">
                    <input type="hidden" name="custom_fields[{{ $customField->fieldable->name }}][]" value="{{ $image }}">
                </div>
            @endforeach
        @endif
    </div>

    @if ($errors->has($customField->fieldable->name))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first($customField->fieldable->name) }}</strong>
        </span>
    @endif
</div><!-- ./form-group -->