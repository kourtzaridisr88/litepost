@extends('litepost::admin')

@section('title', 'Edit Category')

@section('main')
    <section class="section breadcrumb">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('litepost.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('litepost.categories', [ 'postType' => $postTypeId ]) }}">Categories</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Επεξεργασία</li>
                    </ol>
                </div><!-- ./col -->
            </div><!-- ./row -->
        </div><!-- ./container-fluid -->
    </section><!-- ./section -->

    <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('litepost.categories.update', ['id' => $category->id]) }}" method="POST">
                                {{ method_field('PUT') }}
                                @csrf
                                @include('litepost::pages.categories._form')
                            </form>

                            <!-- Delete Form -->
                            <form action="{{ route('litepost.categories.destroy', ['id' => $category->id]) }}" method="POST">
                                {{ method_field('DELETE') }}
                                @csrf
                                <input type="hidden" name="post_type_id" id="post_type_id" value="{{ $postTypeId }}">
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

@section('js')
  
@endsection