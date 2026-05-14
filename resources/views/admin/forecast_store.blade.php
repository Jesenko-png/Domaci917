<form action="{{route("forecast.store")}}" method="post">
    @csrf

        <select name="city_id" >
            @foreach(\App\Models\CitiesModel::all() as $city)
            <option value="{{$city->id}}">
                {{$city->name}}
            </option>
            @endforeach

        </select>
    <input type="text" name="temperature" placeholder="Unesite vasu temperaturu">
    <select name="weather_type">

           @foreach(\App\Models\ForecastModel::WEATHERS as $type)
            <option value="{{$type}}">
                {{$type}}
            </option>
           @endforeach
  </select>
    <input type="number" name="sansa" placeholder="Unesite sansu za padavinu" >%

    <input type="date" name="forecast_date">
    <button type="submit">Snimi</button>
</form>

@foreach(\App\Models\CitiesModel::all() as $city)
    <h3>{{$city->name}}</h3>

        <ul>
            @foreach($city->forecasts as $forecast)
        <li>{{$forecast->forecast_date}}-{{$forecast->temperature}}</li>
            @endforeach
        </ul>

@endforeach



