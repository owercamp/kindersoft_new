<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<style>
  * {
    all: unset;
  }

  table {
    height: 100vh;
    width: 100%;
    border-spacing: 0;
    border: solid #9ca3af;
  }

  td {
    border: solid #9ca3af;
  }
</style>

<body>
  <table style="text-align: center; margin: 60 auto;min-height: 300px;">
    <tr>
      <td rowspan="6" style="max-width: 33.3%!important;">
      @if (isset($image) && !empty($image))
        <img src="{{ asset($image) }}" alt="Logo" style="max-height: 350px!important; max-width: 350px!important; border-radius: 15px;margin: 5px;">
      @else
        <h2 style="color:#1f2937">{{ __('Corporate Logo') }}</h2>
      @endif
      </td>
      <td rowspan="3" style="max-width: 33.3%!important;">
        <h2>{{ $reason[0]->company }}</h2>
        <h3>{{ $reason[0]->commercial }}</h3>
        @php
          $total = count($headquarters);
        @endphp
        @foreach ($headquarters as $headquarter)
          <span>{{ $headquarter->headquarters }}</span> 
          @if ($total > 1)
            -
           @endif
           @php
            $total = $total - 1;
           @endphp
        @endforeach
      </td>
      <td rowspan="2" style="max-width: 33.3%!important;">
        <h3>{{ $date }}</h3>
      </td>
    </tr>
    <tr>
    </tr>
    <tr>
      <td rowspan="2">
        <h3 style="color:#1f2937">{{ __('Number') }}</h3>
      </td>
    </tr>
    <tr>
      <td rowspan="3">
        <h2 style="color:#9a3412">{{ $proposal }}</h2>
      </td>
    </tr>
    <tr>
      <td rowspan="2">
        @if (isset($consecutive))
          <h3>{{ $consecutive }}</h3>
        @else
          <h3>{{ __('Consecutive not found') }}</h3>
        @endif
      </td>
    </tr>
    <tr>
    </tr>
  </table>
</body>

</html>