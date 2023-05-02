<div {{ $attributes(['class' => 'border border-gray-200 p-6 rounded-xl']) }}>
    {{ $slot }}
</div>
{{-- You can extract a css component but if you're doing tailwind this is probably the best way to do it  --}}
