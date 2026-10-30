@props(['title' => null, 'label' => null, 'value'])

@php
    $displayTitle = $title ?? $label;
@endphp

<div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
    <p class="text-xs uppercase font-semibold text-gray-500 tracking-wider">{{ $displayTitle }}</p>
    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $value }}</p>
</div>
