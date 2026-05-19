@extends('layoutwelcome')

@section('content')

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow border-0 rounded-4">

                <div class="card-header bg-dark text-white py-3">

                    <h3 class="mb-0">
                        <i class="fa-solid fa-city me-2"></i>
                        Search City
                    </h3>

                </div>

                <div class="card-body p-4">

                    <form method="GET" action="{{ route('welcome') }}">

                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                City Name
                            </label>

                            <input
                                type="text"
                                name="city"
                                class="form-control form-control-lg"
                                placeholder="Enter city name">

                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary btn-lg w-100">

                            <i class="fa-solid fa-magnifying-glass me-2"></i>
                            Search

                        </button>

                    </form>

                </div>

            </div>

            <!-- SEARCH RESULTS -->
            <div class="mt-5">

                @forelse($cities as $city)


                    <div class="card shadow-sm border-0 rounded-4 mb-4">

                        <div class="card-header bg-dark text-white">
                            <a href="{{route("city.favourite",$city->id)}}" class="btn btn-primary">
                                <i class="fa-regular text-white fa-heart"></i>

                            </a>
                            <h4 class="mb-0">

                                <i class="fa-solid fa-city me-2"></i>

                                {{ $city->name }}

                            </h4>

                        </div>

                        <div class="card-body">

                            @php
                                $forecast = $city->todayForecasts;
                            @endphp

                            @if($forecast)

                                @php

                                    $boja = \App\Http\ForecastHelper::getColorByTemperature(
                                        $forecast->temperature
                                    );

                                    $icon = match($forecast->weather_type){

                                        'sunny' => 'fa-sun',

                                        'rainy' => 'fa-cloud-rain',

                                        'cloudy' => 'fa-cloud',

                                        'snowy' => 'fa-snowflake',

                                        default => 'fa-cloud-sun'

                                    };

                                @endphp

                                <div class="border rounded p-3 d-flex justify-content-between align-items-center">

                                    <div>

                                        <div class="fw-bold mb-1">

                                            <i class="fa-solid {{ $icon }} me-2"></i>

                                            {{ ucfirst($forecast->weather_type) }}

                                        </div>

                                        <small class="text-muted">

                                            {{ $forecast->forecast_date }}

                                        </small>

                                    </div>

                                    <div class="text-end">

                                        <div
                                            class="fw-bold fs-5"
                                            style="color: {{ $boja }}">

                                            {{ $forecast->temperature }}°C

                                        </div>

                                        @if($forecast->probability)

                                            <small class="text-primary">

                                                {{ $forecast->probability }}% precipitation

                                            </small>

                                        @endif

                                    </div>

                                </div>

                            @else

                                <div class="alert alert-warning mb-0">

                                    No forecast for today.

                                </div>

                            @endif

                        </div>

                    </div>

                @empty

                    <div class="alert alert-danger mt-4">

                        Trenutno nema kriterijuma za Vašu pretragu.

                    </div>

                @endforelse

            </div>

        </div>

    </div>

@endsection
