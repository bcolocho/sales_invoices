@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Customer List</h1>

    <a href="{{ route('customers.create') }}" class="btn btn-primary">New Customer</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->customer_name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>
                        <!-- Add links to view, edit, and delete customers -->
                        <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

