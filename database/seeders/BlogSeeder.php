<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        $blogs = [
            [
                'title' => 'Top 5 Source Code Website Bán Hàng Tốt Nhất 2024',
                'excerpt' => 'Tổng hợp các mã nguồn mở PHP, Laravel, Nodejs giúp bạn xây dựng web nhanh chóng...',
                'content' => '<p>Trong thời đại số hóa, việc xây dựng một website bán hàng chuyên nghiệp không còn quá khó khăn nhờ vào các source code mã nguồn mở. Bài viết này sẽ giới thiệu đến bạn top 5 source code website bán hàng tốt nhất năm 2024.</p><h2>1. Laravel E-commerce</h2><p>Laravel là framework PHP phổ biến nhất hiện nay với cú pháp rõ ràng và dễ học...</p>',
                'image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=500',
                'category' => 'tech',
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Cách Sử Dụng Tool Check Live UID Facebook Miễn Phí',
                'excerpt' => 'Hướng dẫn chi tiết cách lọc data khách hàng tiềm năng bằng bộ công cụ miễn phí tại AiCuaToi.com...',
                'content' => '<p>Tool check live UID Facebook là công cụ hữu ích giúp các marketer và người làm kinh doanh online xác định được những tài khoản Facebook còn hoạt động.</p><h2>Tại sao cần check live UID?</h2><p>Việc lọc được UID live giúp bạn tối ưu chi phí quảng cáo và tăng tỷ lệ chuyển đổi...</p>',
                'image' => 'https://images.unsplash.com/photo-1555421689-49263376da7a?w=500',
                'category' => 'tools',
                'published_at' => now()->subDays(6),
            ],
            [
                'title' => 'Hướng Dẫn Tối Ưu SEO Website Laravel Năm 2024',
                'excerpt' => 'Những kỹ thuật SEO on-page và off-page cho website Laravel để tăng thứ hạng Google...',
                'content' => '<p>Laravel là framework tuyệt vời để xây dựng website, nhưng để website của bạn lên top Google thì cần áp dụng các kỹ thuật SEO phù hợp.</p><h2>1. Tối ưu URL thân thiện</h2><p>Sử dụng Route trong Laravel để tạo URL dễ đọc và có chứa từ khóa...</p>',
                'image' => 'https://images.unsplash.com/photo-1432888622747-4eb9a8f2c293?w=500',
                'category' => 'tech',
                'published_at' => now()->subDays(8),
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create([
                'title' => $blog['title'],
                'slug' => Str::slug($blog['title']),
                'excerpt' => $blog['excerpt'],
                'content' => $blog['content'],
                'image' => $blog['image'],
                'category' => $blog['category'],
                'user_id' => $user->id,
                'is_published' => true,
                'published_at' => $blog['published_at'],
                'views' => rand(100, 1000),
            ]);
        }
    }
}
