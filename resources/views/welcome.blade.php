@extends("layout")
@section("sadrzajStranice")

    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">City</th>
            <th scope="col">Temperature</th>

        </tr>
        </thead>
        <tbody>
        @foreach($cities as $index => $city)
        <tr>
            <th scope="row">1</th>
            <td>{{$city->name}}</td>
            <td>{{$temperature[$index]->temperature}}°C</td>

        </tr>

        @endforeach
        </tbody>

    </table>
    @if(auth()->check() && auth()->user()->role == 'admin')
        <a href="/add" class="btn btn-primary">Add City</a>
    @endif
@endsection

