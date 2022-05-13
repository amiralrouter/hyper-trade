@props([
    'title' => '', 
    'class' => '', 
])

<div class="bg-white dark:bg-slate-800 text-black dark:text-white rounded drop-shadow-lg {{$class}}">
    <div class=" min-h-[52px] flex justify-between border-b dark:border-slate-500 items-center">
        <div class="text-sm font-semibold px-4">{{$title}}</div>
        <div class="flex items-center px-4"></div>
    </div>
    <div class="p-4">
        {{ $slot }}
    </div>
</div>