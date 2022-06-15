@props(['name', 'type' => 'text'])

<div class="mb-5">
    <x-form.label name={{$name}} />

    <input class="border border-gray-408 p-2 w-full" type="{{$type}}" name="{{$name}}" id="{{$name}}"
        value="{{old($name)}}" required>

    <x-form.error name={{ $name}} />

</div>