<form method="POST" action="{{ route('settings.update', 1) }}">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label for="hyperlink" class="block text-sm font-medium text-white">Hyperlink</label>
        <input type="text" name="hyperlink" id="hyperlink" value="{{ old('hyperlink', $settings['hyperlink']) }}" class="mt-1 block w-auto border-gray-300 rounded-md shadow-sm">
    </div>

    <div class="mb-4">
        <label for="color" class="block text-sm font-medium text-white">Color</label>
        <input type="color" name="color" id="color" value="{{ old('color', $settings['color']) }}" class="mt-1 block w-1/12 border-gray-300 rounded-md shadow-sm">
    </div>


    <!-- Reset and Submit buttons -->
    <div class="flex items-center justify-end mt-4">
{{--        TODO add onClick event  to fill fields with some default data--}}
        <button type="reset" class="bg-red-500 text-white px-4 py-2 rounded-md mr-2">Reset</button>
        <button type="submit" class="bg-green text-white px-4 py-2 rounded-md">Update Settings</button>
    </div>
</form>
