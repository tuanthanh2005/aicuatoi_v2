<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\SiteSetting;

class CheckMenuEnabled
{
    /**
     * Map: route name pattern → site_settings key → page label
     * Wildcard patterns are checked with Str::is()
     */
    protected array $menuMap = [
        'shop'              => ['key' => 'menu_shop',         'label' => 'Cửa Hàng'],
        'shop.*'            => ['key' => 'menu_shop',         'label' => 'Cửa Hàng'],
        'product.show'      => ['key' => 'menu_shop',         'label' => 'Cửa Hàng'],
        'product.*'         => ['key' => 'menu_shop',         'label' => 'Cửa Hàng'],
        'blog.index'        => ['key' => 'menu_blog',         'label' => 'Blog'],
        'blog.show'         => ['key' => 'menu_blog',         'label' => 'Blog'],
        'blog.*'            => ['key' => 'menu_blog',         'label' => 'Blog'],
        'cart.index'        => ['key' => 'menu_cart',         'label' => 'Giỏ Hàng'],
        'cart.*'            => ['key' => 'menu_cart',         'label' => 'Giỏ Hàng'],
        'checkout'          => ['key' => 'menu_cart',         'label' => 'Thanh Toán'],
        'checkout.*'        => ['key' => 'menu_cart',         'label' => 'Thanh Toán'],

    ];

    public function handle(Request $request, Closure $next)
    {
        $routeName = $request->route()?->getName();

        if (!$routeName) {
            return $next($request);
        }

        // Admin bypass — admin always has full access
        if ($request->user() && $request->user()->role === 'admin') {
            return $next($request);
        }

        foreach ($this->menuMap as $pattern => $config) {
            if (\Str::is($pattern, $routeName)) {
                $isEnabled = SiteSetting::getValue($config['key'], '1') === '1';
                if (!$isEnabled) {
                    return response()->view('errors.maintenance', [
                        'pageName' => $config['label'],
                    ], 503);
                }
                break; // first match wins
            }
        }

        return $next($request);
    }
}
