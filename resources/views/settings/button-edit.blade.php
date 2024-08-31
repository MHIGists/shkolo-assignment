<x-app-layout>
    <x-slot name="slot">
        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('status') }}</span>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h1 class="text-2xl font-semibold mb-6 text-white">Button Settings</h1>
                            <x-settings-form :button="$button"/>
                    </div>
                </div>
            </div>
        </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    onPageLoad(document);
                });
            </script>
    </x-slot>
</x-app-layout>
