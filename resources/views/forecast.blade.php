@extends("layout")

@section("sadrzajStranice")

    @foreach($city->forecasts as $prognoza)

        <p>Datum : {{$prognoza->forecast_date}}</p>
       <p> Temperature:  {{$prognoza->temperature}}</p>
        <p>Grad:{{$prognoza->city->name}}</p> <br>


    @endforeach


@endsection
