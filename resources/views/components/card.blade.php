<li>
    <div {{ $attributes->merge(['class' => 'rounded-1 m-1 inset-shadow d-flex flex-column justify-space-between']) }}>
        {{ $slot }}
    </div>
</li>