@props([
    'tag' => 'button',
    'color' => 'primary',
    'size' => 'md',
    'disabled' => false,
    'rounded' => false,
    'pill' => false,
    'text' => false,
    'soft' => false,
    'class' => '',
    'type' => 'submit',
    'href' => null,
    'title' => '',
    'icon' => '',
    'loading' => false, 
    'outlined' => false, 
    'block' => false,  
    'semibold' => false,  
    'bold' => false,  
])

@php
    $just_icon = ($icon != '' || $loading) && $slot->isEmpty();
    $btn_classes = [
        'inline-flex',
        'items-center',
        'justify-center',
        'relative', 
    ];

    $button_height = 'h-10';
    $button_width = 'w-10';
    $button_px = 'px-4';
    $button_inner_space = 'space-x-1';
    $button_bg = '';
    $button_border = '';
    $button_text = '';
    $button_text_size = 'text-base';

    $icon_classes = [];
    $icon_width = 'w-5';
    $icon_height = 'h-5';
 
    switch ($size) {
        case 'xs':
            $button_height = 'h-7';
            $button_width = 'w-7';
            $button_px = 'px-2';
            $icon_width = 'w-3';
            $icon_height = 'h-3';
            $button_text_size = 'text-xs';
            break;
        case 'sm':
            $button_height = 'h-8';
            $button_width = 'w-8';
            $button_px = 'px-3';
            $icon_width = 'w-4';
            $icon_height = 'h-4';
            $button_text_size = 'text-sm';
            break;
        case 'lg':
            $button_height = 'h-12';
            $button_width = 'w-12';
            $button_px = 'px-5';
            $icon_width = 'w-5';
            $icon_height = 'h-5'; 
            break;
        case 'xl':
            $button_height = 'h-14';
            $button_width = 'w-14';
            $button_px = 'px-8';
            $icon_width = 'w-7';
            $icon_height = 'h-7';
            break; 
    }
    $icon_classes[] = $icon_width;
    $icon_classes[] = $icon_height;

    switch ($color) {
        case 'primary': 
            $button_bg = 'bg-blue-500 hover:bg-blue-600 active:bg-blue-700';
            $button_border = 'border-blue-500';
            $button_text = 'text-white';
            if($text || $outlined){ 
                $button_bg .= ' bg-opacity-0 hover:bg-opacity-30 active:bg-opacity-75';
                $button_text = 'text-blue-500 active:text-white dark:text-blue-400';
            }else if($soft){ 
                $button_bg .= ' bg-opacity-20 hover:bg-opacity-50 active:bg-opacity-75';
                $button_text = 'text-blue-500 active:text-white dark:text-blue-400';
            }
            break;
        case 'secondary':
            $button_bg = 'bg-pink-500 hover:bg-pink-600 active:bg-pink-700';
            $button_border = 'border-pink-500';
            $button_text = 'text-white';
            if($text || $outlined){  
                $button_bg .= ' bg-opacity-0 hover:bg-opacity-30 active:bg-opacity-75';
                $button_text = 'text-pink-500 active:text-white dark:text-pink-500';
            }else if($soft){ 
                $button_bg .= ' bg-opacity-20 hover:bg-opacity-50 active:bg-opacity-75';
                $button_text = 'text-pink-500 hover:text-white active:text-white dark:text-pink-300';
            }
            break;
        case 'success':
            $button_bg = 'bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700';
            $button_border = 'border-emerald-500';
            $button_text = 'text-white';
            if($text || $outlined){ 
                $button_bg .= ' bg-opacity-0 hover:bg-opacity-30 active:bg-opacity-75';
                $button_text = 'text-emerald-500 active:text-white dark:text-emerald-500';
            }else if($soft){ 
                $button_bg .= ' bg-opacity-20 hover:bg-opacity-50 active:bg-opacity-75';
                $button_text = 'text-emerald-500 hover:text-white active:text-white dark:text-emerald-500';
            }
            break;
        case 'danger':
            $button_bg = 'bg-rose-500 hover:bg-rose-600 active:bg-rose-700';
            $button_border = 'border-rose-500';
            $button_text = 'text-white';
            if($text || $outlined){ 
                $button_bg .= ' bg-opacity-0 hover:bg-opacity-30 active:bg-opacity-75';
                $button_text = 'text-rose-500 active:text-white dark:text-rose-500';
            }else if($soft){ 
                $button_bg .= ' bg-opacity-20 hover:bg-opacity-50 active:bg-opacity-75';
                $button_text = 'text-rose-500 hover:text-white active:text-white dark:text-rose-500';
            }
            break;
        case 'warning':
            $button_bg = 'bg-amber-400 hover:bg-amber-500 active:bg-amber-600';
            $button_border = 'border-amber-400';
            $button_text = 'text-black active:text-white';
            if($text || $outlined){ 
                $button_bg .= ' bg-opacity-0 hover:bg-opacity-30 active:bg-opacity-75';
                $button_text = 'text-amber-500 active:text-white dark:text-amber-300';
            }else if($soft){ 
                $button_bg .= ' bg-opacity-10 hover:bg-opacity-50 active:bg-opacity-75';
                $button_text = 'text-amber-400 hover:text-white active:text-white dark:text-amber-300';
            }
            break;
        case 'info':
            $button_bg = 'bg-sky-400 hover:bg-sky-500 active:bg-sky-600';
            $button_border = 'border-sky-400';
            $button_text = 'text-white';
            if($text || $outlined){ 
                $button_bg .= ' bg-opacity-0 hover:bg-opacity-30 active:bg-opacity-75';
                $button_text = 'text-sky-500 active:text-white dark:text-sky-300';
            }else if($soft){ 
                $button_bg .= ' bg-opacity-10 hover:bg-opacity-50 active:bg-opacity-75';
                $button_text = 'text-sky-400 hover:text-white active:text-white dark:text-sky-300';
            }
            break;
        case 'theme':
            $button_bg = 'bg-slate-300 hover:bg-slate-400 active:bg-slate-500';
            $button_bg .= ' dark:bg-slate-700 dark:hover:bg-slate-900/75 dark:active:bg-slate-900';
            $button_border = 'border-slate-200 dark:border-slate-800';
            $button_text = 'text-black hover:text-white dark:text-white';
            if($text || $outlined){ 
                $button_bg .= ' bg-opacity-0 dark:bg-opacity-0 hover:bg-opacity-30 active:bg-opacity-75';
                $button_text = 'text-slate-800 dark:text-slate-300';
            }else if($soft){ 
                $button_bg .= ' bg-opacity-30 hover:bg-opacity-50 active:bg-opacity-60';
                $button_text = 'text-slate-800  dark:text-slate-300';
            }
            break;
        case 'reverse':
            $button_bg = 'bg-slate-700 hover:bg-slate-800 active:bg-slate-900';
            $button_bg .= ' dark:bg-slate-200 dark:hover:bg-slate-300 dark:active:bg-slate-400';
            $button_border = 'border-slate-700';
            $button_text = 'text-white dark:text-black';
            if($text || $outlined){ 
                $button_bg .= ' bg-opacity-0 hover:bg-opacity-30 active:bg-opacity-75';
                $button_bg .= ' dark:bg-opacity-0 dark:hover:bg-opacity-10 dark:active:bg-opacity-30';
                $button_text = 'text-slate-800 dark:text-slate-500 dark:hover:text-slate-300';
            }else if($soft){ 
                $button_bg .= ' bg-opacity-30 hover:bg-opacity-50 active:bg-opacity-60';
                $button_bg .= ' dark:bg-opacity-5 dark:hover:bg-opacity-30 dark:active:bg-opacity-40';
                $button_text = 'text-slate-800 dark:text-slate-500 dark:hover:text-slate-300';
            }
            break; 
    }
    $btn_classes[] = $button_bg;
    $btn_classes[] = $button_border;
    $btn_classes[] = $button_text;


    if($block){
        $btn_classes[] = 'w-full';
    } 
    if($rounded){
        $btn_classes[] = 'rounded';
    }
    if($pill){
        $btn_classes[] = 'rounded-full';
    }
    if($disabled){
        $btn_classes[] = 'cursor-not-allowed';
    }
    if($loading){
        $btn_classes[] = 'cursor-wait';
    }
    if($outlined){ 
        $btn_classes[] = 'border';
    }
    if($semibold){ 
        $btn_classes[] = 'font-semibold';
    }
    if($bold){ 
        $btn_classes[] = 'font-bold';
    }
    if($just_icon){
        $button_px = 'px-0';
    }

 
    $btn_classes[] = $button_height;
    if($slot->isEmpty()){
        $btn_classes[] = $button_width;
    }
    $btn_classes[] = $button_px;
    $btn_classes[] = $button_inner_space;
    $btn_classes[] = $button_text_size;
    $btn_classes = implode(' ',$btn_classes);

    if($loading){
        $icon = 'spinner-third';
        $icon_classes[] = 'animate-spin';
    }

    $icon_classes = implode(' ', $icon_classes);
@endphp


@if ($tag == 'button')
    <button
        class="{{$btn_classes}}"
        type="{{$type}}"
        @if($disabled) disabled @endif  
        data-color="{{$color}}"
    >
        @if ($icon != '')
            <x-icon name="{{$icon}}" :class="$icon_classes"/>
        @endif
        @if ($slot->isNotEmpty())
            <div>{{ $slot }}</div> 
        @endif
    </button>
@endif

@if ($tag == 'a' || $tag == 'link' )
    <a
        class="{{$btn_classes}}"
        type="{{$type}}"
        @if($disabled) disabled @endif 
        @if($href) href="{{$href}}" @endif
        @if($title) title="{{$title}}" @endif
    >
        @if ($icon != '')
            <x-icon name="{{$icon}}" :class="$icon_classes"/>
        @endif
        @if ($slot->isNotEmpty())
            <div>{{ $slot }}</div> 
        @endif
    </a>
@endif


