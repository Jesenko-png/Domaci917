@extends("layout")

@section("sadrzajStranice")

    @foreach($prognosis as $weather)

        Trenutno je {{$weather->temperature}} stepeni u gradu {{$weather->city->name}} <br>

    @endforeach


@endsection
