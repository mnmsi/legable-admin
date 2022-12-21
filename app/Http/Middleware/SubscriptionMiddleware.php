<?php

namespace App\Http\Middleware;

use App\Traits\System\SubscriptionTrait;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionMiddleware
{
    use SubscriptionTrait;

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (is_null($this->checkPlan())) {
            if (!$this->checkTrial()) {
                return redirect()->route('update.plan');
            }
        }

        return $next($request);
    }
}
