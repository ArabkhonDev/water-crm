@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Buyurtmalar</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-primary">Buyurtma qo‘shish</a>
    <table class="table table-bordered mt-3">
        <tr>
            <th>ID</th>
            <th>Mijoz</th>
            <th>Miqdor</th>
            <th>Narx</th>
            <th>To‘lov</th>
        </tr>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->customer->name }}</td>
            <td>{{ $order->quantity }} Litr</td>
            <td>{{ $order->price }} so‘m</td>
            <td>{{ $order->is_paid ? 'To‘langan' : 'Qarzdor' }}</td>
        </tr>
        @endforeach
    </table>
    {{ $orders->links() }}
</div>
@endsection
