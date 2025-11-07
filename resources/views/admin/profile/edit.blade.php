@extends('admin.layout.main')

@section('page_heading', 'Edit Profil')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow">
    <h2 class="text-2xl font-semibold text-gray-700 mb-6">Profil</h2>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label class="block text-gray-600 font-medium mb-1">Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-600 font-medium mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="flex justify-end space-x-3">
            <a href="/" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md">Batal</a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-black rounded-md">Simpan</button>
        </div>
    </form>
</div>
@endsection
