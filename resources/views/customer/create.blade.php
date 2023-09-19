@extends('dashboard')

@section('content')
<div class="container">
    <h1>Register New Customer</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('customer.store') }}">
        @csrf
        <div class="form-group">
            <label for="customer_name">Name:</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name"
                value="{{ old('customer_name') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
        </div>

        <div class="form-group">
            <label for="address">address:</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address')}}" required>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>

</div>

@endsection