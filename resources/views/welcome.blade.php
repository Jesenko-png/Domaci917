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

                            <h4 class="mb-0">

                                <i class="fa-solid fa-city me-2"></i>

                                {{ $city->name }}

                            </h4>

                        </div>

                        <div class="card-body">

                            @forelse($city->forecasts as $forecast)

                                @php

                                    $icon = match($forecast->weather_type){

                                        'sunny' => 'fa-sun',

                                        'rainy' => 'fa-cloud-rain',

                                        'cloudy' => 'fa-cloud',

                                        'snowy' => 'fa-snowflake',

                                        default => 'fa-cloud-sun'

                                    };

                                @endphp

                                <div class="border rounded p-3 mb-3 d-flex justify-content-between align-items-center">

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

                                        <div class="fw-bold fs-5">

                                            {{ $forecast->temperature }}°C

                                        </div>

                                        @if($forecast->probability)

                                            <small class="text-primary">

                                                {{ $forecast->probability }}% precipitation

                                            </small>

                                        @endif

                                    </div>

                                </div>

                            @empty

                                <div class="alert alert-warning mb-0">

                                    No forecasts available.

                                </div>

                            @endforelse

                        </div>

                    </div>

                @empty

                    <div class="alert alert-danger mt-4">

                        No cities found.

                    </div>

                @endforelse

            </div>

        </div>

    </div>

@endsection
