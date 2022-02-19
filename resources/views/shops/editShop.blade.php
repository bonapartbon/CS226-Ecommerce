@extends('layouts.layout')
@section('content')
<div class="container">
    <h2 class="mt-3">Edit </h1>
        <form action="{{ route('shops.update', $shop->shopId) }}" method="POST">
            @csrf
            @method('PUT')
            <?php echo ("<script>console.log('sellers: " . $sellers . "');</script>"); ?>

            <div class="mb-3">
                <label class="form-label">Shop Name</label>
                <input type="text" class="form-control" name="shopName" value="{{ $shop->shopName }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="shopAddress" value="{{ $shop->shopAddress }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="tel" class="form-control" name="shopContact" value="{{ $shop->shopContact }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Owner</label>
                <select class="form-select" aria-label="Default select example" name="sellerId" required>
                    <option value="{{$shop->sellerId}}">@foreach ($sellerName as $name) {{$name->sellerName}} @endforeach</option>
                    @foreach ($sellers as $seller)
                    <option value="{{$seller->sellerId}}">{{$seller->sellerName}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
</div>
@endsection