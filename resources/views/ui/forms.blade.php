@extends("ui.layout")

@section('title','Buttons | UI')


@section("content")

    <div class="grid grid-cols-2 gap-4 mt-4">

        <x-panel title="Basic Input Text"  >
            <div class="space-y-4">
                <x-input-text label="Basic Input Text" name="basic_input_text" rounded /> 
                <x-input-text label="Basic Input Text" name="basic_input_text" hint="hint is here now" rounded /> 
            </div>
        </x-panel> 

    </div>

@endsection