@extends('layouts.app')

@section('title', $provider->name)

@section('content')
    <div class="container mx-auto px-4">
        <a href="{{ route('providers.index') }}" class="text-sm text-blue-500 hover:underline mb-4 inline-block">
            ← Back to list
        </a>

        <div class="bg-white p-6 rounded shadow-md">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/3">
                    <img
                        src="{{ $provider->logo }}"
                        alt="{{ $provider->name }} logo"
                        class="w-full h-48 object-contain rounded text-white text-center text-sm italic"
                        loading="lazy"
                    />
                </div>
                <div class="w-full md:w-2/3">
                    <h1 class="text-2xl font-bold mb-2">{{ $provider->name }}</h1>
                    <p class="text-gray-700 text-base mb-4">
                        {{ $provider->short_description }}
                    </p>
                    <p class="text-sm text-gray-500">
                        Category: <span class="font-semibold">{{ $provider->category?->name }}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
