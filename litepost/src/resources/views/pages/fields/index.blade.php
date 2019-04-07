@extends('litepost::admin')

@section('title', 'Fields')

@section('main')
    <section class="section breadcrumb">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('litepost.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Fields</li>
                    </ol>
                </div><!-- ./col -->
            </div><!-- ./row -->
        </div><!-- ./container-fluid -->
    </section><!-- ./section -->

    <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 pt-5">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Label</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fields as $field)
                                <tr>
                                    <td>{{ $field->id }}</td>
                                    <td>
                                        <a href="{{ route('litepost.fields.edit', ['id' => $field->id, 'postType' => $postTypeId]) }}">
                                            {{ $field->fieldable->label }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- ./col -->
            </div><!-- ./row -->
        </div><!-- ./container-fluid -->
    </section><!-- ./section -->


@endsection

@section('javascript')

@endsection
