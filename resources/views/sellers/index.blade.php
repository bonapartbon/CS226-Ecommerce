@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between mt-3">
        <h2>Seller</h1>
            <a href="{{ route('sellers.create') }}"><button type="button" class="btn btn-success">Add New Seller</button></a>
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
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact</th>
                <th scope="col">Action</th>
                <th scope="col">View</th>

        </thead>
        <tbody>
            @foreach ($sellers as $seller)
            <tr>
                <th scope="row">{{$seller->sellerId}}</th>
                <td>{{$seller->sellerName}}</td>
                <td>{{$seller->sellerEmail}}</td>
                <td>{{$seller->sellerContact}}</td>
                <td class="d-flex"><a href="{{ route('sellers.edit', $seller->sellerId) }}" type="button" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('sellers.destroy', $seller->sellerId) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                <td>
                    <a href="{{ route('sellers.show', $seller->sellerId) }}"><button type="button" class="btn btn-success">View</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection