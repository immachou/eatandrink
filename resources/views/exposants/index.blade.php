@extends('layouts.app')

@section('content')
    <h1>Nos Exposants</h1>
    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">{{ session('success') }}</div>
    @endif
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($stands as $stand)
            <div class="border p-4 rounded shadow">
                <h2 class="text-xl font-bold">{{ $stand->name }}</h2>
                <p>{{ $stand->description }}</p>
                <a href="{{ route('stands.show', $stand->id) }}" class="text-blue-500 underline">Voir le stand</a>
            </div>
        @endforeach
    </div>
@endsection 