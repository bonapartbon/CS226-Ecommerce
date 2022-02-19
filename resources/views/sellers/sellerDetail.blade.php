@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between mt-3">
        <h2>Sellers Detail</h1>
    </div>
    <div class="card text-dark bg-light mb-3 mt-2" style="max-width: 18rem;">

        <div class="card-body">
            <h5>{{$seller->sellerName}}</h5>
            <ul class="list-unstyled">
                <li>
                    ID: {{$seller->sellerId}}
                </li>
                <li>
                    Email: {{$seller->sellerEmail}}
                </li>
                <li>
                    Contact: {{$seller->sellerContact}}
                </li>
            </ul>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Shop Name</th>
                <th scope="col">Address</th>
                <th scope="col">Contact</th>
                <th scope="col">Owner</th>
                <th scope="col">Action</th>
        </thead>
        <tbody>
            @foreach ($shopOfSellers as $shop)
            @if ($seller->sellerId == $shop->sellerId)
            <tr>
                <th scope="row">{{$shop->shopId}}</th>
                <td>{{$shop->shopName}}</td>
                <td>{{$shop->shopAddress}}</td>
                <td>{{$shop->shopContact}}</td>
                <td>{{$shop->sellerName}}</td>
                <td class="d-flex"><a href="{{ route('shops.edit', $shop->shopId) }}" type="button" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('shops.destroy', $shop->shopId) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection