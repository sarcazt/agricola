@if(!empty($ciudades))
  @foreach($ciudades as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif