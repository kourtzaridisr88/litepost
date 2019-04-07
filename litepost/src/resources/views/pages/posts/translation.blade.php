@extends('admin.layouts.master')

@section('title', 'Μετάφραση συνταγής')

@section('main')
    <section class="section breadcrumb">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('lucia.dashboard') }}">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('lucia.recipes') }}">Συνταγές</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Μετάφραση</li>
                    </ol>
                </div><!-- ./col -->
            </div><!-- ./row -->
        </div><!-- ./container-fluid -->
    </section><!-- ./section -->

    <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 pt-5">
                    <form class="translation-form" action="{{ route('lucia.recipes.edit-translation', [ 'id' => $recipe->id ]) }}" method="POST">
                        {{ method_field('PUT') }}
                        @csrf
                        @include('admin.pages.recipes._form')
                    </form>

                    <!-- Delete Form -->
                    <form class="delete-form" action="{{ route('lucia.recipes.destroy-translation', ['id' => $recipe->id]) }}" method="POST">
                        {{ method_field('DELETE') }}
                        @csrf
                    </form>
                </div><!-- ./col -->
            </div><!-- ./row -->
        </div><!-- ./container-fluid -->
    </section><!-- ./section -->


@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.8.4/tinymce.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.8.4/jquery.tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: "textarea",
        themes: "modern",
        menubar: false,
        branding: false
    });
</script>    
@endsection