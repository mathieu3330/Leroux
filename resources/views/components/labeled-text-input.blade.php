@props(['value'])
<div class="grid">
    <div
        class="bg-white flex min-h-[60px] flex-col-reverse justify-center rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:shadow-inner">
        <input type="text" name="{{ $name }}" id="{{ $name }}"
            class="peer block w-full border-0 p-0 text-base text-gray-900 placeholder-gray-400 focus:ring-0"
            placeholder="{{ $value ?? $slot }}" @if($name == 'numetude' || $name == 'Localisation') required @endif/>
        <label html="{{ $name }}"
            class="block transform text-xs font-bold uppercase text-gray-400 transition-opacity, duration-200 peer-placeholder-shown:h-0 peer-placeholder-shown:-translate-y-full peer-placeholder-shown:opacity-0">{{ $value ?? $slot }}</label>
    </div>
</div>