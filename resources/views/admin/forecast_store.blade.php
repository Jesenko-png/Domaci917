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
                @php
                    $boja;
                    if ($forecast->temperature <= 0)
                        {
                            $boja = "lightblue";
                        }
                    elseif ($forecast->temperature >=1 && $forecast->temperature <= 15)
                {
                    $boja="blue";
                }
                    elseif ($forecast->temperature > 15 && $forecast->temperature <= 25){
                        $boja="green";
                    }
                    else{
                        $boja="red";
                    }

                 @endphp





        <li>{{$forecast->forecast_date}}-<span style="color:{{$boja}};">{{$forecast->temperature}}</span></li>

            @endforeach
        </ul>

@endforeach



