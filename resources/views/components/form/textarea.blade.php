@props(['name', 'value' => ''])

<x-form.input-form-wrapper>
    <x-form.label :name="$name" />
    <textarea name="{{ $name }}" required class="form-control editor" id="{{ $name }}" cols="30"
        rows="10">{!! old($name, $value) !!} </textarea>
    <x-error name="{{ $name }}" />
</x-form.input-form-wrapper>
