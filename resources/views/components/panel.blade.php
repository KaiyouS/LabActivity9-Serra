@props(['title'])

<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden mb-6">
    <div class="bg-gray-50 px-4 py-3 border-b border-gray-200">
        <h3 class="text-md font-semibold text-gray-700">{{ $title }}</h3>
    </div>
    <div class="p-4">
        {{ $slot }}
    </div>
</div>
