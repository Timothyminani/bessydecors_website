<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;



class ShareCategories
{
    public function handle($request, Closure $next)
    {
        // IMPORTANT: Hard-coded categories (NOT from DB)
        $categories = [
            'Living Room',
            'Bedroom',
            'Dining',
            'Kitchen',
            'Office',
            'Outdoor',
            'Kids',
            'Home Décor & Storage'
        ];

        // Share globally with Inertia
        inertia()->share('nav_categories', $categories);

        return $next($request);
    }
}

