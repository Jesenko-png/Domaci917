@extends("layout")

@section("sadrzajStranice")
    @foreach($users as $user)
        User {{$user->name}} dolazi iz grada {{$user->city->name}} <br>
    @endforeach
@endsection
