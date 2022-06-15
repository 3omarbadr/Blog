@props(['name'])

<div class="mb-5">
    <x-form.label name={{$name}} />

    <input  class="border border-gray-200 p-2 w-full rounded"
            name="{{$name}}"
            id="{{$name}}"
            {{$attributes
            (['value' => old($name)])}}
            >

    <x-form.error name={{$name}} />

</div>