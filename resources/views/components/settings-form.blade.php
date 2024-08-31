
<form method="POST"
      action="{{ route(request()->routeIs('settings.create') ? 'settings.store' : 'settings.update', $button['id'] ?? null) }}"
      class="border-black border-4 rounded mt-6 p-4">
     @csrf
    @if(request()->routeIs('settings.update') || request()->routeIs('settings.index'))
        @method('PUT')
    @endif

        <div class="mb-4">
            <label for="title-{{ $button['id'] }}" class="block text-sm font-medium text-white">Title</label>
            <input type="text" name="title" id="title-{{ $button['id'] }}" value="{{ old('title', $button['title']) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mb-4">
            <label for="hyperlink-{{ $button['id'] }}" class="block text-sm font-medium text-white">Hyperlink</label>
            <input type="url" name="hyperlink" id="hyperlink-{{ $button['id'] }}" value="{{ old('hyperlink', $button['hyperlink']) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mb-4">
            <label for="color-{{ $button['id'] }}" class="block text-sm font-medium text-white">Color</label>
            <input type="color" name="color" id="color-{{ $button['id'] }}" value="{{ old('color', $button['color']) }}" class="mt-1 block w-1/12 border-gray-300 rounded-md shadow-sm">
        </div>

        <!-- Reset and Submit buttons -->
        <div class="flex items-center justify-end mt-4 mb-6">
            @if(request()->routeIs('settings.create'))
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md">Add Button</button>
                @else
            <button id="reset-button-{{ $button['id'] }}" type="submit" class="reset-btn bg-red-500 text-white px-4 py-2 rounded-md mr-2">Reset</button>
            <form method="POST" action="{{route('settings.destroy', $button['id'])}}">
                @csrf
                @method('DELETE')
                <button id="delete-button-{{ $button['id'] }}" type="submit" class="delete-btn dark:bg-red-700 text-white px-4 py-2 rounded-md mr-2">Delete</button>
            </form>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md">Update Button</button>
            @endif
        </div>
    </form>
