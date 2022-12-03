<label for="status" class="form-label">Status</label>
<select class="form-select" id="status" name="status[]">
    @foreach($options as $key => $option)
        @if($key === (int)$value)
            <option value="{{$key}}" selected>{{$option}}</option>
            @continue
        @endif
        <option value="{{$key}}">{{$option}}</option>
    @endforeach
</select>
