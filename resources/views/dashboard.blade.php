<style> .alert-success { color: #155724; background-color: #d4edda; border-color: #c3e6cb; padding: .75rem 1.25rem; margin-bottom: 1rem; border: 1px solid transparent; border-radius: .25rem; } </style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
                @endif
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h3 class="text-xl font-bold mb-4">Request a Permit</h3>
                        <form action="{{ route('permits.store') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="permit_type" class="block text-sm font-medium text-gray-700">Permit Type:</label>
                                    <select name="permit_type" id="permit_type" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        <option value="new">New Business Permit</option>
                                        <option value="renewal">Renewal</option>
                                        <option value="change_info">Change of Information</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="business_name" class="block text-sm font-medium text-gray-700">Business Name:</label>
                                    <input type="text" name="business_name" id="business_name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="business_address" class="block text-sm font-medium text-gray-700">Business Address:</label>
                                <textarea name="business_address" id="business_address" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                            </div>
                            <div class="mt-4">
                                <label for="owner_name" class="block text-sm font-medium text-gray-700">Owner Name:</label>
                                <input type="text" name="owner_name" id="owner_name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            <div class="mt-6">
                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Submit Request
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>