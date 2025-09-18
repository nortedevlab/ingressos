## Exemplo de Uso nas Rotas

```php
// routes/web.php
Route::middleware(['auth', 'group:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', fn() => "Admin Dashboard")->name('admin.dashboard');
});

Route::middleware(['auth', 'group:manager'])->prefix('manager')->group(function () {
    Route::get('/dashboard', fn() => "Manager Dashboard")->name('manager.dashboard');
});

Route::middleware(['auth', 'group:account'])->prefix('account')->group(function () {
    Route::get('/dashboard', fn() => "Account Dashboard")->name('account.dashboard');
});

// Exemplo usando permissão
Route::get('/relatorios', fn() => "Relatórios")
    ->middleware(['auth', 'permission:access-admin,access-manager']);
```

## Usar em Controllers

```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $this->authorize('accessAdmin');

        return view('admin.dashboard');
    }
    
    public function dashboardAdmin(Request $request)
    {
        $this->authorize('access', 'access-admin');

        return view('admin.dashboard');
    }
}
```

## Usar em Views com @can

```blade
<ul>
    @can('accessAdmin')
        <li><a href="{{ route('admin.dashboard') }}">Painel Administrativo</a></li>
    @endcan

    @can('accessManager')
        <li><a href="{{ route('manager.dashboard') }}">Painel Gerente</a></li>
    @endcan

    @can('accessAccount')
        <li><a href="{{ route('account.dashboard') }}">Área do Cliente</a></li>
    @endcan
</ul>

<hr/>

<ul>
    @can('access', 'access-admin')
        <li><a href="{{ route('admin.dashboard') }}">Painel Administrativo</a></li>
    @endcan

    @can('access', 'access-manager')
        <li><a href="{{ route('manager.dashboard') }}">Painel Gerente</a></li>
    @endcan

    @can('access', 'access-account')
        <li><a href="{{ route('account.dashboard') }}">Área do Cliente</a></li>
    @endcan
</ul>
```
