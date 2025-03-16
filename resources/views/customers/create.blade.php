@extends('layouts.app')

@section('content')
    <!-- component -->
    <div class="container center">

        <div class="min-h-screen flex items-center justify-center w-full dark:bg-gray-950">
            <div class="bg-white dark:bg-gray-900 shadow-md rounded-lg px-8 py-6 max-w-md">
                <h1 class="text-2xl font-bold text-center mb-4 dark:text-gray-200">Welcome Back!</h1>
                <form action="{{ route('customers.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Name
                        </label>
                        <input type="text" id="name" name="name"
                            class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="your name" required>
                        @error('name')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="phone"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Phone</label>
                        <input type="number" id="number" name="phone"
                            class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Enter your phone" required>
                        @error('phone')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="mb-4">
                        <label for="address"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Address</label>
                        <textarea type="address" id="addess" rows="3" cols="50" name="address"
                            class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Enter your address" required></textarea>
                        @error('address')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror

                    </div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
