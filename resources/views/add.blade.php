@extends("layout")

@section("sadrzajStranice")

    <form action="{{route("admin.add")}}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Enter City">
        <input type="number" name="temperature" step="0.01" placeholder="Enter Temperature">
        <input type="submit" value="Add">
    </form>

@endsection
