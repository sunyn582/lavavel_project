@props(['category' => 'default', 'name' => 'Product'])

@php
$colors = [
    'electronics' => ['bg' => '#1f2937', 'text' => '#ffffff'],
    'beauty' => ['bg' => '#ec4899', 'text' => '#ffffff'],
    'clothing' => ['bg' => '#3b82f6', 'text' => '#ffffff'],
    'default' => ['bg' => '#6b7280', 'text' => '#ffffff']
];

$color = $colors[$category] ?? $colors['default'];
$shortName = Str::limit($name, 12, '');
@endphp

<svg class="w-full h-full" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
    <rect width="400" height="400" fill="{{ $color['bg'] }}"/>
    <text x="200" y="180" font-family="Arial, sans-serif" font-size="16" font-weight="bold" 
          text-anchor="middle" fill="{{ $color['text'] }}">{{ $shortName }}</text>
    <rect x="150" y="220" width="100" height="60" rx="8" fill="{{ $color['text'] }}" opacity="0.2"/>
    <circle cx="175" cy="235" r="5" fill="{{ $color['text'] }}" opacity="0.4"/>
    <circle cx="200" cy="245" r="8" fill="{{ $color['text'] }}" opacity="0.6"/>
    <circle cx="225" cy="235" r="5" fill="{{ $color['text'] }}" opacity="0.4"/>
</svg>