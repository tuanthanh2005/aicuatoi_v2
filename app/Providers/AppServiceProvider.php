<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Cache;
use App\Models\CommunityPost;
use App\Models\CommunityComment;
use App\Models\Order;
use App\Models\Blog;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // This project uses Bootstrap (not Tailwind) for frontend styling.
        // Use Bootstrap pagination views to avoid "double" pagination blocks.
        Paginator::useBootstrapFive();

        Gate::define('community-post.update', function ($user, CommunityPost $post) {
            return $user->role === 'admin' || $post->user_id === $user->id;
        });

        Gate::define('community-post.delete', function ($user, CommunityPost $post) {
            return $user->role === 'admin' || $post->user_id === $user->id;
        });

        Gate::define('community-comment.update', function ($user, CommunityComment $comment) {
            return $user->role === 'admin' || $comment->user_id === $user->id;
        });

        Gate::define('community-comment.delete', function ($user, CommunityComment $comment) {
            return $user->role === 'admin' || $comment->user_id === $user->id;
        });

        // Register View Composer for sidebar to share variables globally
        view()->composer('partials.sidebar', function ($view) {
            $recentPurchases = Cache::remember('home.recent_purchases.v2', now()->addMinutes(5), function () {
                return Order::query()
                    ->with(['orderItems.product'])
                    ->whereNotIn('status', ['cancelled'])
                    ->latest()
                    ->take(10)
                    ->get()
                    ->map(function (Order $order) {
                        $firstItem = $order->orderItems->first();
                        $product = $firstItem?->product;
                        $extraItems = max(0, $order->orderItems->count() - 1);

                        $verb = in_array($order->status, ['completed', 'delivered', 'shipped'], true) ? 'mua' : 'đặt';

                        return [
                            'customer_name' => self::maskCustomerName((string) $order->customer_name),
                            'verb' => $verb,
                            'product_name' => $product?->name ?? 'Sản phẩm',
                            'product_slug' => $product?->slug,
                            'product_url' => $product?->slug ? route('product.show', $product->slug) : null,
                            'extra_items' => $extraItems,
                            'time_ago' => optional($order->created_at)->diffForHumans(),
                        ];
                    })
                    ->all();
            });

            $latestBlogs = Blog::published()->orderBy('published_at', 'desc')->take(10)->get();

            $view->with(compact('recentPurchases', 'latestBlogs'));
        });
    }

    private static function maskCustomerName(string $name): string
    {
        $name = trim($name);
        if ($name === '') {
            return 'Khách hàng';
        }

        $parts = preg_split('/\\s+/u', $name) ?: [];
        $parts = array_values(array_filter($parts, fn ($p) => $p !== ''));

        if (count($parts) === 1) {
            $first = mb_substr($parts[0], 0, 1);
            return $first . '***';
        }

        $givenName = $parts[count($parts) - 1];
        $surnameInitial = mb_substr($parts[0], 0, 1);

        return $givenName . ' ' . $surnameInitial . '.';
    }
}
