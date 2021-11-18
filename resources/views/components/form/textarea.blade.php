@props(['name'])

<x-form.field>
    <x-form.label name="{{ $name }}" />
    <textarea class="border border-gray-200 p-2 w-full rounded text-gray-700" name="{{ $name }}" id="{{ $name }}" required>{{ old($name, $slot)}}</textarea>
    
    <x-form.error name="{{ $name }}"/>
</x-form.field>