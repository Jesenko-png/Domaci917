@extends("layout")

@section("sadrzajStranice")
  <b> -- One to many</b>  <br>
    @foreach($users as $user)

        User {{$user->name}} dolazi iz grada {{$user->city->name}} <br><br>

    @endforeach
    <b>One to one</b> <br>
        @foreach($users as $user)
         Ime usera:   {{ $user->name }} <br>
          Grad:  {{ $user->city?->name }} <br>
         Email: {{ $user->email }} <br>
         Adresa: {{ $user->detail?->address }}<br>

    @endforeach
@endsection
