@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mijozlar</h1>
    <a href="{{ route('customers.create') }}" class="btn btn-primary">Mijoz qo‘shish</a>
    <table class="table table-bordered mt-3">
        <tr>
            <th>ID</th>
            <th>Ism</th>
            <th>Telefon</th>
            <th>Manzil</th>
        </tr>
        @foreach ($customers as $customer)
        <tr>
            <td>{{ $customer->id }}</td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->address }}</td>
        </tr>
        @endforeach
    </table>
    {{ $customers->links() }}
</div>
@endsection
