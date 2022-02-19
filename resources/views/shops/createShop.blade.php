@extends('layouts.layout')
@section('content')
<div class="container">
    <h2 class="mt-3">Create New Shop</h2>
    <form action="{{ route('shops.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Shop Name</label>
            <input type="text" class="form-control" name="shopName" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" class="form-control" name="shopAddress" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="tel" class="form-control" name="shopContact" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Owner</label>
            <select class="form-select" aria-label="Default select example" name="sellerId" required>
                <option value>Select Owner</option>
                @foreach ($sellers as $seller)
                <option value="{{$seller->sellerId}}">{{$seller->sellerName}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection