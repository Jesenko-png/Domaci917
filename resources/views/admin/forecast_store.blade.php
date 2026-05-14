@extends("admin.layout")

@section("content")

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow border-0 rounded-4">

                <div class="card-header bg-dark text-white py-3 rounded-top-4">

                    <h3 class="mb-0">
                        <i class="fa-solid fa-cloud-sun-rain me-2"></i>
                        Add Weather Forecast
                    </h3>

                </div>

                <div class="card-body p-4">

                    <form action="{{ route('forecast.store') }}" method="post">

                        @csrf

                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                <i class="fa-solid fa-city me-1"></i>
                                Select City
                            </label>

                            <select name="city_id" class="form-select form-select-lg">

                                @foreach(\App\Models\CitiesModel::all() as $city)

                                    <option value="{{ $city->id }}">
                                        {{ $city->name }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-bold">
                                    <i class="fa-solid fa-temperature-half me-1"></i>
                                    Temperature
                                </label>

                                <input
                                    type="text"
                                    name="temperature"
                                    class="form-control form-control-lg"
                                    placeholder="Enter temperature">

                            </div>

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-bold">
                                    <i class="fa-solid fa-cloud me-1"></i>
                                    Weather Type
                                </label>

                                <select
                                    name="weather_type"
                                    class="form-select form-select-lg">

                                    @foreach(\App\Models\ForecastModel::WEATHERS as $type)

                                        <option value="{{ $type }}">
                                            {{ $type }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-bold">
                                    <i class="fa-solid fa-cloud-rain me-1"></i>
                                    Rain Chance (%)
                                </label>

                                <input
                                    type="number"
                                    name="sansa"
                                    class="form-control form-control-lg"
                                    placeholder="Chance of rain">

                            </div>

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-bold">
                                    <i class="fa-solid fa-calendar-days me-1"></i>
                                    Forecast Date
                                </label>

                                <input
                                    type="date"
                                    name="forecast_date"
                                    class="form-control form-control-lg">

                            </div>

                        </div>

                        <div class="text-center mt-4">

                            <button
                                type="submit"
                                class="btn btn-primary btn-lg px-5 rounded-pill shadow">

                                <i class="fa-solid fa-floppy-disk me-2"></i>
                                Save Forecast

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
    <div class="row mt-5">

        @foreach(\App\Models\CitiesModel::all() as $city)

            <div class="col-md-6 mb-4">

                <div class="card shadow-sm border-0 rounded-4 h-100">

                    <div class="card-header bg-dark text-white">

                        <h4 class="mb-0">
                            <i class="fa-solid fa-city me-2"></i>
                            {{ $city->name }}
                        </h4>

                    </div>

                    <div class="card-body">

                        @if($city->forecasts->count())

                            <ul class="list-group list-group-flush">

                                @foreach($city->forecasts as $forecast)

                                    @php
                                        $boja = \App\Http\ForecastHelper::getColorByTemperature(
                                            $forecast->temperature
                                        );
                                    @endphp

                                    <li class="list-group-item d-flex justify-content-between align-items-center">

                                        <div>

                                            <div class="fw-bold">
                                                {{ $forecast->forecast_date }}
                                            </div>

                                            <small class="text-muted">
                                                {{ $forecast->weather_type }}
                                            </small>

                                        </div>

                                        <div>

                                        <span
                                            class="badge rounded-pill"
                                            style="background-color: {{ $boja }}; font-size: 15px;">

                                            {{ $forecast->temperature }}°C

                                        </span>

                                        </div>

                                    </li>

                                @endforeach

                            </ul>

                        @else

                            <div class="alert alert-warning mb-0">

                                No forecasts available.

                            </div>

                        @endif

                    </div>

                </div>

            </div>

        @endforeach

    </div>
@endsection
