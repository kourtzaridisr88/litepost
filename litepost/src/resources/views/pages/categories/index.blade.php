@extends('litepost::admin')

@section('title', 'Categories')

@section('main')
    <section class="section breadcrumb">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('litepost.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Categories</li>
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
                            <form action="{{ route('litepost.categories.store') }}" method="POST">
                                @csrf
                                @include('litepost::pages.categories._form')
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
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>
                                            <a href="{{ route('litepost.categories.edit', ['id' => $category->id, 'postType' => $postTypeId]) }}">
                                                {{ $category->title }}
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

@section('js')
  
@endsection