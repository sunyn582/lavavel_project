use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DashboardController;

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('orders', OrderController::class)->middleware('auth');
Route::resource('reviews', ReviewController::class)->middleware('auth');

// Giỏ hàng
Route::get('cart', [CartController::class, 'index'])->name('cart.index')->middleware('auth');
Route::post('cart/add/{product}', [CartController::class, 'add'])->name('cart.add')->middleware('auth');
Route::put('cart/update/{product}', [CartController::class, 'update'])->name('cart.update')->middleware('auth');
Route::delete('cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove')->middleware('auth');

// Dashboard admin
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');