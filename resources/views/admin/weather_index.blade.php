<form method="post" action="/weather">
    @csrf
<select name="city_id">
    @foreach(\App\Models\CitiesModel::all() as $city)
        <option value="{{$city->id}}">
            {{$city->name}}
        </option>
    @endforeach
</select>
<input type="number" name="temperature" placeholder="Unesite temperaturu">
<button>Snimi</button>
</form>


<div>
    @foreach(\App\Models\WeatherModel::all() as $weather)
        <p>{{$weather->city->name}} -   {{$weather->temperature}}</p>


    @endforeach
</div>
