@extends('litepost::emails.layouts.master')

@section('main')

<div class="container">
    <div class="row">
        <div class="col-12">
            <p style="padding-bottom: 20px;">Έχετε ένα νέο email επικοινωνίας.</p>

            <h4 style="padding: 20px 0;">Στοιχεία χρήστη</h4>
            <p><strong>Όνομα: </strong> {{ $data['name'] }}</p>
            <p><strong>Email: </strong> {{ $data['email'] }}</p>

            <h4 style="padding: 20px 0;">Mήνυμα: </h4>
            <p>{{ $data['message'] }}</p>
        </div>
    </div>
</div>

@endsection