@extends('litepost::admin')

@section('meta')
<meta name="turbolinks-visit-control" content="reload">
@endsection

@section('title', 'Edit Post')

@section('main')
    <section class="section breadcrumb">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('litepost.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('litepost.posts') }}">Posts</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
                    </ol>
                </div><!-- ./col -->
            </div><!-- ./row -->
        </div><!-- ./container-fluid -->
    </section><!-- ./section -->

    <section class="section" data-controller="post">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 pt-5">
                    <form class="edit-form" action="{{ route('litepost.posts.update', [ 'id' => $post->id ]) }}" method="POST">
                        {{ method_field('PUT') }}
                        @csrf
                        @include('litepost::pages.posts._form')
                    </form>

                    <!-- Delete Form -->
                    <form class="delete-form" action="{{ route('litepost.posts.destroy', ['id' => $post->id]) }}" method="POST" data-target="post.deleteForm">
                        {{ method_field('DELETE') }}
                        @csrf
                        <!-- Hidden Global Inputs -->
                        <input type="hidden" name="post_type_id" value="{{ $postType->id }}">
                    </form>
                </div><!-- ./col -->
            </div><!-- ./row -->
        </div><!-- ./container-fluid -->
    </section><!-- ./section -->


@endsection

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.8.4/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: "textarea",
        themes: "modern",
        plugins: ["paste", "lists"],
        menubar: false,
        branding: false,
        oninit : "setPlainText"
    });
</script>   
@endsection
