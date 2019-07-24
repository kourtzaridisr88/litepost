@extends('litepost::admin')

@section('meta')
<meta name="turbolinks-visit-control" content="reload">
@endsection

@section('title', 'Create Post')

@section('main')
    <section class="section" style="background-color: #e9ecef;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('litepost.dashboard') }}">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('litepost.posts', ['postType' => $postType->id]) }}">Posts</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </div><!-- ./col -->
            </div><!-- ./row -->
        </div><!-- ./container-fluid -->
    </section><!-- ./section -->

    <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 pt-5">
                    <form action="{{ route('litepost.posts') }}" method="POST" class="create-form" enctype="multipart/form-data">
                        @csrf
                        @include('litepost::pages.posts._form')
                    </form>
                </div><!-- ./col -->
            </div><!-- ./row -->
        </div><!-- ./container-fluid -->
    </section><!-- ./section -->


@endsection

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.8.4/tinymce.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.8.4/jquery.tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: "textarea",
        themes: "modern",
        plugins: ["paste", "lists", "image", ],
        paste_data_images: true,
        image_advtab: true,
        menubar: false,
        branding: false,
        oninit : "setPlainText",
        images_upload_url: '/litepost/api/v1/images/storeImagesFromTiny',
        automatic_uploads: true
    });
</script>   
@endsection
