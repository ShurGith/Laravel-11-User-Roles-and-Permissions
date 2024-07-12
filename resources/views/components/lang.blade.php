@props([
    'idioma' => array_key_exists(session('locale'),config('languages')) ? session('locale') : Config('app.locale'),
])
<div class="flex gap-12">
@foreach (config('languages') as $key => $value)
    @if ($key == $idioma)
         <x-icon name="flag-language-{{ $key }}" style="width: 32px; opacity: .6" />
        @else
        <a href="{{ route('lang', $key) }}" >
         <x-icon name="flag-language-{{ $key }}" style="width: 32px" />
        </a>
    @endif
@endforeach
</div>
