@props(['name', 'type'=> 'text' , 'value' => ''])

<x-form.input-form-wrapper>
    <x-form.label :name="$name"/>
    <input type="{{$type}}" id="{{$name}}" name="{{$name}}" value="{{ old($name ,$value) }}" class="form-control"
        >
    <x-error name="{{$name}}" />
</x-form.input-form-wrapper>
