@props([
    'label' => '',
    'name' => '',
    'value' => '',
    'color' => 'primary',
    'type' => 'text',
    'required' => false,
    'placeholder' => '',
    'readonly' => false,
    'disabled' => false,
    'rounded' => false,
    'pill' => false,
    'autofocus' => false,
    'size' => 'md',
    'color' => 'primary',
    'hint' => '', 
    'old' => false,
])

@php
    $wrapper_classes = [];
    $input_classes = [];
    $input_classes[] = 'block';
    $input_classes[] = 'w-full'; 

    $input_px = 'px-3 ';
    $input_py = 'py-2';
    $input_bg = '';
    $input_border = '';
    $input_text = '';
    $input_font_size = '';

    switch ($size) {
        case 'md': 
            $input_font_size = 'text-base';
            break;
    }
    switch ($color) {
        case 'primary': 
            $input_bg = 'bg-white dark:bg-gray-700';
            $input_border = 'border border-gray-300 focus:ring-blue-500 focus:border-blue-500 outline-none focus:ring-1';
            $input_border .= ' dark:border-gray-600   dark:focus:ring-blue-500 dark:focus:border-blue-500';
            $input_text = 'text-black dark:text-white dark:placeholder-gray-400';
            break;
    }

/*
     block w-full p-2.5  
*/
    $input_classes[] = $input_px;
    $input_classes[] = $input_py;
    $input_classes[] = $input_bg;
    $input_classes[] = $input_border;
    $input_classes[] = $input_font_size;
    
    if($rounded){
        $input_classes[] = 'rounded';
    }
    if($pill){
        $input_classes[] = 'rounded-full';
    }

    $button_classes = implode(' ', $input_classes);

    if($old){
        $value = Request::old($name);
    }
 
@endphp

<div  {{$attributes}}>
    @if ($label) 
    <label  class="text-sm font-semibold text-gray-500 dark:text-gray-300">{{$label}}</label>
    @endif
    <input 
        class="{{$button_classes}}" 
        type="{{$type}}"  
        name="{{$name}}"
        value="{{$value}}"
        placeholder="{{$placeholder}}"
        {{$required ? 'required' : ''}} 
        {{$readonly ? 'readonly' : ''}} 
        {{$disabled ? 'disabled' : ''}} 
        {{$autofocus ? 'autofocus' : ''}} 
    >
    @if ($hint)
        <div class="text-xs   text-black dark:text-white opacity-50">{{$hint}}</div>
    @endif
</div>

