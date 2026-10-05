@props(['name', 'label', 'checked' => false])

<div class="form-group checkbox">
    <input type="hidden" name="{{ $name }}" value="0">
    <input type="checkbox" id="{{ $name }}" name="{{ $name }}" value="1"
           @checked(old($name, $checked))>
    <label for="{{ $name }}">{{ $label }}</label>
</div>