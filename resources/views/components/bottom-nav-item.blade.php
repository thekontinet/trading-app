@props(['href', 'active' => false])
<a href="{{ $href }}" {{$attributes->class([
    "bg-primary text-secondary rounded-lg flex justify-center items-center h-12 w-12" => $active,
    "text-primary" => !$active
   ])}}>
    {{$slot}}
</a>
