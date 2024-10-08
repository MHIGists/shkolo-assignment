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
                        <h1 class="text-2xl font-semibold mb-6 text-white">Buttons Settings</h1>
                        <div
                            class="grid gap-6 2xl:grid-cols-3 xl:grid-cols-3 lg:grid-cols-3 md:grid-cols-1 sm:grid-cols-1 ">
                            @foreach($buttons as $button)
                                <x-settings-form :button="$button"/>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex items-center justify-end mt-4 mb-6 mr-6">
                        <a href="{{route('settings.create')}}" class="button bg-green-600 text-white px-4 py-2 rounded-md">Add new button</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                onPageLoad(document);
            });
        </script>
    </x-slot>
</x-app-layout>
