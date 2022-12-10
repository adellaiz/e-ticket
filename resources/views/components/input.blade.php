<label class="h-full empty">
    @if($min && $max)
        <input name="{{$name}}" minlength="{{$min}}" maxlength="{{$max}}" type="{{$type}}" placeholder="{{$label}}" class="my-input empty">
    @else
        <input name="{{$name}}" type="{{$type}}" placeholder="{{$label}}" class="my-input empty">
    @endif
    <span class="my-input-label">
        {{$label}}
    </span>
</label>
