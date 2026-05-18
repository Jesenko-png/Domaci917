    <?php

    use App\Http\Controllers\AdminForecastController;
    use App\Http\Controllers\CityController;
    use App\Http\Controllers\ForecastController;
    use App\Http\Controllers\HomepageController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\ShowUsers;
    use App\Http\Controllers\WeatherController;
    use Illuminate\Support\Facades\Route;


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get("/prognose" , [WeatherController::class , "index"])->name("weather");
    Route::get("/users" , [ShowUsers::class , "show"])->name("users");
    Route::get('/', [HomepageController::class  , "index"])->name('welcome');
    Route::middleware('auth')->group(function () {

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/add' , [CityController::class, 'index'])->name('city.create');
        Route::post("/add" , [CityController::class, "store"])->name('admin.add');
        Route::view('/weather' , 'admin.weather_index');
        Route::post('/weather' , [WeatherController::class, "store"])->name('weather.update');
        Route::view('admin/forecast' , 'admin.forecast_store');
        Route::post('admin/forecast' , [AdminForecastController::class, "store"])->name('forecast.store');
    });

    require __DIR__.'/auth.php';Route::get("/forecast/{city:name}" , [ForecastController::class, "index"])->name('forecast');




