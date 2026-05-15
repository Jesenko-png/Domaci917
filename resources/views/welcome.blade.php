@extends('layoutwelcome')
@section('content')

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow border-0 rounded-4">

                <div class="card-header bg-dark text-white py-3">

                    <h3 class="mb-0">
                        <i class="fa-solid fa-city me-2"></i>
                        Search City
                    </h3>

                </div>

                <div class="card-body p-4">

                    <form method="GET">

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

        </div>

    </div>

@endsection
