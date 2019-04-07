@extends('litepost::admin')

@section('title', 'Edit Post Type')

@section('main')
    <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('litepost.dashboard') }}">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Post Types</li>
                    </ol>
                </div><!-- ./col -->
            </div><!-- ./row -->
        </div><!-- ./container-fluid -->
    </section><!-- ./section -->

    <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12 pt-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('litepost.post-types.update', ['id' => $postType->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                @include('litepost::pages.post-types._form')
                            </form>

                            <!-- Delete Form -->
                            <form action="{{ route('litepost.post-types.destroy', ['id' => $postType->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="form-group">
                                    <input type="submit" class="btn btn--danger w-100" value="Delete">
                                </div><!-- ./form-group -->
                            </form>
                        </div><!-- ./card-body -->
                    </div><!-- ./card -->
                </div><!-- ./col -->
            </div><!-- ./row -->
        </div><!-- ./container-fluid -->
    </section><!-- ./section -->
@endsection