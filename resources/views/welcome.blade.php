@extends("layout")

    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">City</th>
            <th scope="col">Temperature</th>

        </tr>
        </thead>
        <tbody>
        @foreach($cities as $city => $temp)
        <tr>
            <th scope="row">1</th>
            <td>{{$city}}</td>
            <td>{{$temp}}</td>

        </tr>
        @endforeach

        </tbody>
    </table>


