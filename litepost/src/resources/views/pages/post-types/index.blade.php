@extends('litepost::admin')

@section('title', 'Post Types')

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
                <div class="col-12 col-md-5 pt-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('litepost.post-types.store') }}" method="POST">
                                @csrf
                                @include('litepost::pages.post-types._form')
                            </form>
                        </div><!-- ./card-body -->
                    </div><!-- ./card -->
                </div><!-- ./col -->
                <div class="col-12 col-md-7 pt-5">
                    <div class="card">
                        <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($postTypes as $postType)
                                    <tr>
                                        <td>{{ $postType->id }}</td>
                                        <td>
                                            <a href="{{ route('litepost.post-types.edit', ['id' => $postType->id]) }}">
                                                {{ $postType->name_singular }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div><!-- ./card-body -->
                    </div><!-- ./card -->
                </div><!-- ./col -->
            </div><!-- ./row -->
        </div><!-- ./container-fluid -->
    </section><!-- ./section -->
@endsection