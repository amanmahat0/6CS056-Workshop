@props(['name', 'label', 'options' => [], 'selected' => null])

<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <select id="{{ $name }}" name="{{ $name }}">
        @foreach($options as $option)
            <option value="{{ $option }}" @selected(old($name, $selected) === $option)>
                {{ $option }}
            </option>
        @endforeach
    </select>
    @error($name)
        <p class="error">{{ $message }}</p>
    @enderror
</div>