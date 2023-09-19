@extends('dashboard')

@section('title', 'Dashboard')

@section('content_header')
<h1>Customer Record</h1>
@stop

@section('content')
<div class="container">
    <h1>Customer Detail</h1>

    @if(session('success'))
    <div class="alert alert-info">
        {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('customer.create') }}" class="btn btn-danger">Register</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($customer as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->customer_name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->address }}</td>

                <td>
                    @if($item->status = '1')
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">Inactive</span>
                    @endif
                </td>

                <td>
                    <a href="{{ route('customer.show', $item->id) }}" class="btn btn-info">Show</a>
                    <a href="{{ route('customer.edit', $item->id) }}" class="btn btn-warning">Edit</a>

                    <!-- form to deactivate customers -->

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection