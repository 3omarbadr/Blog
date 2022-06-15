@props(['name', 'type' => 'text'])

<div class="mb-6">
    <x-form.label name={{$name}}/>
    
    <textarea class="border border-gray-408 p-2 w-full rounded" type="text" name="{{$name}}" id="{{$name}}"
        required {{$attributes}}>{{$slot ?? old($name)}}</textarea>

    <x-form.error name={{$name}} />

</div>