@extends('dashboard')

@section('content')
<div class="container">
    <h1>Customer Detail</h1>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->customer_name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->address }}</td>
            </tr>
        </tbody>

        <a href="{{ route('customer.index') }}" class="btn btn-primary">Back</a>
</div>
@endsection