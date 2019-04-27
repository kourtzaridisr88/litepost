@extends('litepost::admin')

@section('title', 'Posts')

@section('main')
    <section class="section breadcrumb">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('litepost.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Subscribers</li>
                    </ol>
                </div><!-- ./col -->
            </div><!-- ./row -->
        </div><!-- ./container-fluid -->
    </section><!-- ./section -->

    <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 pt-5">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subscribers as $subscriber)
                                        <tr>
                                            <td>{{ $subscriber->id }}</td>
                                            <td>
                                                {{ $subscriber->email }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $subscribers->links() }}
                        </div><!-- ./card-body -->
                    </div><!-- ./card -->
                </div><!-- ./col -->
            </div><!-- ./row -->
        </div><!-- ./container-fluid -->
    </section><!-- ./section -->


@endsection

@section('js')
  
@endsection