@extends('layouts.app')

@section('content')
    <!-- component -->
    <div class="container center">

        <div class="min-h-screen flex items-center justify-center w-full dark:bg-gray-950">
            <div class="bg-white dark:bg-gray-900 shadow-md rounded-lg px-8 py-6 max-w-md">
                <h1 class="text-2xl font-bold text-center mb-4 dark:text-gray-200">Welcome Back!</h1>
                <form action="{{ route('orders.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <select name="customer_id" id="">
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                    <div class="mb-4">
                        <label for="quantity"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Quantity
                            <input type="number" id="quantity" name="quantity"
                                class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="Enter your need kg or litr" required>
                        </label>
                        @error('quantity')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for=price"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Price</label>
                        <input type="number" id="price" name="price"
                            class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="price" required>
                            @error('price')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="mb-4">
                        <label for="is_paid" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Is
                            Paid?</label>
                        <input type="checkbox" name="is_paid" id="is_paid" value="1">
                        @error('is_paid')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror

                    </div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Order
                        Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
