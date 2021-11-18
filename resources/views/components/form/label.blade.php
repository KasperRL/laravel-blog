@props(['name'])

<label class="block mb-2 uppercase font-bold text-xs text-white" for="{{ $name }}">{{ ucwords($name) }}</label>
