<?php

namespace App\Http\Middleware;

use App\Models\Project;
use Closure;
use Illuminate\Http\Request;

class PrefixMiddleware
{
    public $prefix;

    public function __construct()
    {
        $prefix = Project::where('user_id', auth()->id())->first();
        $this->prefix = $prefix;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        request()->route()->project_id = $this->prefix;
        return $next($request);
    }
}
