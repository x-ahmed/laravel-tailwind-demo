<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as FortifyLoginResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;

class LoginResponse implements FortifyLoginResponse
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response|Redirector|RedirectResponse
     */
    public function toResponse($request): Response|Redirector|RedirectResponse
    {
        if(auth()->user()->roles()->first()->allowed_route === 'admin'){
            return redirect(route('admin.index'));
        } else {
            return redirect()->intended(config('fortify.home'));
        }
    }
}
