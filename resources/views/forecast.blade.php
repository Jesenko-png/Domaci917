@extends("layout")

@section("sadrzajStranice")

    @foreach($prognoze as $prognoza)

        <p: {{$prognoza->forecast_date}}<br>
       <p> Temperature:  {{$prognoza->temperature}}</p><br>
        <p>Grad:{{}}</p>


    @endforeach


@endsection
