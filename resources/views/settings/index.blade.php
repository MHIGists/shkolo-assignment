<x-app-layout>
    <x-slot name="slot">
        <div class="container mx-auto p-6">
            <h1 class="text-2xl font-semibold mb-6 text-white">User Settings</h1>
            @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif

            <x-settings-form :settings="$settings" />
        </div>
    </x-slot>
</x-app-layout>
