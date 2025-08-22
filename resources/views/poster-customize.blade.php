@extends('components.layout')

@section('content')
    <div class="flex justify-between">

        <form action="{{ route('poster.customize') }}" method="POST" enctype="multipart/form-data"
            class="w-full max-w-2xl mx-auto p-6 bg-white rounded-3xl shadow-2xl border-4 border-indigo-200">
            @csrf
            <label for="Poster" class="block text-lg font-semibold text-indigo-700">Add Your Image Here </label>
            <input type="file" name="customized_poster" required
                class="mt-4 block w-full px-6 py-5 border-2 border-indigo-300 rounded-xl shadow-lg focus:outline-none focus:ring-4 focus:ring-indigo-400 focus:border-indigo-500 bg-indigo-50 text-indigo-900 placeholder-indigo-400 text-lg aspect-[4/3]"
                value="{{ old('customized_poster') }}" placeholder="Enter your image">
            <label for="Size" class="block mt-6 text-lg font-semibold text-indigo-700">Which Size?</label>
            <select name="size" id="Size"
                class="mt-4 block w-full px-6 py-5 border-2 border-indigo-300 rounded-xl shadow-lg focus:outline-none focus:ring-4 focus:ring-indigo-400 focus:border-indigo-500 bg-indigo-50 text-indigo-900 placeholder-indigo-400 text-lg">
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
            </select>
            <button type="submit"
                class="mt-4 w-full inline-flex justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Add to Cart
            </button>
        </form>

    </div>
@endsection
