@props(['name'])

<x-form.field>
    <x-form.label name="{{ $name }}" />
    <input class="border border-white p-2 w-full rounded text-gray-700" name="{{ $name }}" id="{{ $name }}"
        {{ $attributes(['value' => old($name)]) }}>

    <x-form.error name="{{ $name }}" />
</x-form.field>
