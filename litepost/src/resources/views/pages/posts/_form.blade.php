<!-- Hidden Global Inputs -->
<input type="hidden" name="post_type_id" value="{{ $postType->id }}">
<!-- ./Hidden Global Inputs -->
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control form-control--small {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" value="{{ $val = isset($post->title) ? old('title', $post->title) : old('title') }}">

                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div><!-- ./form-group -->

                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control form-control--small {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="slug" name="slug" value="{{ $val = isset($post->slug) ? old('title', $post->slug) : old('slug') }}">

                    @if ($errors->has('slug'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('slug') }}</strong>
                        </span>
                    @endif
                </div><!-- ./form-group -->

                @foreach($postType->fields as $customField)
                    @if($customField->fieldable_type == 'Litepost\Models\ImageField')
                        @include('litepost::pages.posts.fields._image')
                    @elseif($customField->fieldable_type == 'Litepost\Models\RichText')
                        @include('litepost::pages.posts.fields._richtext')
                    @elseif($customField->fieldable_type == 'Litepost\Models\GalleryField')
                        @include('litepost::pages.posts.fields._gallery')
                    @elseif($customField->fieldable_type == 'Litepost\Models\FileField')
                        @include('litepost::pages.posts.fields._file')
                    @else
                        @include('litepost::pages.posts.fields._text')
                    @endif
                @endforeach

            </div><!-- ./card-body -->
        </div><!-- ./card -->
    </div><!-- ./col -->

    <div class="col-md-4">

        <div class="card mb-5">
            <div class="card-body">

                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control form-control--small" id="status" name="status">
                        <option value="draft">Draft</option>
                        <option value="published" selected>Published</option>
                    </select>
                </div><!-- ./form-group -->

            </div>
        </div>

        <div class="card mb-5">
            <div class="card-body">

                <div class="form-group">
                    <label for="order">Order</label>
                    <input class="form-control form-control--small {{ $errors->has('order') ? ' is-invalid' : '' }}" type="number" name="order" id="order" value="value="{{ $val = isset($post->order) ? old('order', $post->order) : old('order') }}">

                    @if ($errors->has('order'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('order') }}</strong>
                        </span>
                    @endif
                </div><!-- ./form-group -->
            </div>
        </div>

        <div class="card mb-5" data-controller="livesearch" data-endpoint="/litepost/api/v1/categories" data-posttype="{{ $postType->id }}" data-action="turbolinks:before-cache@window->livesearch#teardown">
            <div class="card-body">

                <div class="form-group">
                    <label for="categories">Categories</label>
                    @php
                        $categories = isset($post) ? old('categories', $post->categories) : old('categories')
                    @endphp

                    <select class="form-control form-control--small" multiple id="categories" name="categories[]" data-action="search->livesearch#search" data-target="livesearch.input">
                        
                        @if(isset($categories))
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" selected>{{ $category->title }}</option>
                            @endforeach
                        @endif
                    </select>
                </div><!-- ./form-group -->

            </div>
        </div>

        <div class="card mb-5">
            <div class="card-body">

                <div class="form-group">
                    <input type="submit" class="btn btn--purple w-100" value="Αποθήκευση">
                </div><!-- ./form-group -->

                @if($view != 'create' && isset($post))
                <div class="form-group">
                    <button class="btn btn--red w-100" data-action="click->post#deleteFormHandler">Διαγραφή</button>
                </div><!-- ./form-group -->
                @endif
            </div>
        </div><!-- ./card -->

    </div><!-- ./col -->
</div><!-- ./row -->

