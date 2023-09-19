@extends('dashboard')

@section('content')
<div class="container">
    <h1>Edit Customer</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('customer.update', $customer->id) }}">
        @csrf
        @method('PUT')
        <!-- Use method HTTP PUT to update the customer -->

        <div class="form-group">
            <label for="customer_name">Name:</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name"
                value="{{ $customer->customer_name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $customer->email }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $customer->phone }}" required>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $customer->address }}"
                required>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>

</div>

@endsection