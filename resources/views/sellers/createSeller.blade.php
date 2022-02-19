@extends('layouts.layout')
@section('content')
<div class="container">
    <h2 class="mt-3">Create New Seller</h2>
    <form action="{{ route('sellers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Seller Name</label>
            <input type="text" class="form-control" name="sellerName" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="sellerEmail" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="tel" class="form-control" name="sellerContact" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection