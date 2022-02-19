@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between mt-3">
        <h2>Shop</h1>
            <a href="{{ route('shops.create') }}"><button type="button" class="btn btn-success">Add New Shop</button></a>
    </div>
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
    @endif

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
            @foreach ($shops as $shop)
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
            @endforeach
        </tbody>
    </table>
</div>
@endsection