@extends('admin.layouts.master')

@section('title', 'Μετάφραση Κατηγορίας')

@section('main')
    <section class="section breadcrumb">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('lucia.dashboard') }}">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('lucia.categories', [ 'postType' => $postType ]) }}">Κατηγορίες</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Μετάφραση</li>
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
                            <form action="{{ route('lucia.categories.edit-translation', ['id' => $category->id]) }}" method="POST">
                                {{ method_field('PUT') }}
                                @csrf   

                                @include('admin.pages.categories._form')

                                <input type="hidden" name="postType" id="post_type" value="{{ $postType }}">
                            </form>

                            <!-- Delete Form -->
                            <form action="{{ route('lucia.categories.destroy-translation', ['id' => $category->id]) }}" method="POST">
                                {{ method_field('DELETE') }}
                                @csrf
                                <input type="hidden" name="postType" id="post_type" value="{{ $postType }}">
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