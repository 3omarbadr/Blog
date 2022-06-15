@props(['name', 'type' => 'text'])

<div class="mb-6">
    <x-form.label name={{$name}}/>
    
    <textarea class="border border-gray-408 p-2 w-full" type="text" name="{{$name}}" id="{{$name}}"
        value="{{old($name)}}" required></textarea>

    <x-form.error name={{ $name}} />

</div>