@extends('layouts.layout')
@section('content')
<div class="container">
    <h2 class="mt-3">Edit Seller</h1>
        <form action="{{ route('sellers.update', $seller->sellerId) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Seller Name</label>
                <input type="text" class="form-control" name="sellerName" value="{{ $seller->sellerName }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="sellerEmail" value="{{ $seller->sellerEmail }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="tel" class="form-control" name="sellerContact" value="{{ $seller->sellerContact }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
</div>
@endsection