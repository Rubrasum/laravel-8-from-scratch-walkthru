@props(['name', 'type' => "text", 'label' => ""])

<div class="mb-6">
    <label  class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="{{ $name }}"
    >
        {{ $label == "" ? ucwords($name) : ucwords($label)  }}

    </label>

    @if($type != "textarea")
    <input  class="border border-gray-400 p-2 w-full"
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            value="{{ old($name) }}"
            required
    >
    @else
        <textarea  class="border border-gray-400 p-2 w-full"
                   name="{{ $name }}"
                   id="{{ $name }}"
                   required
        >{{ old('$name') }}</textarea>
    @endif

    @error($name)
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror
</div>
