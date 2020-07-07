<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key;

class MercureBroadcasterAuthorizationCookie
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /** @var Response $response */
        $response = $next($request);

        if (!method_exists($response, 'withCookie')) {
            return $response;
        }

        return $response->withCookie($this->createCookie($request->user()));
    }

    private function createCookie($user): \Symfony\Component\HttpFoundation\Cookie
    {
        // Add topic(s) this user has access to
        // This can also be URI Templates (to match several topics), or * (to match all topics)
        $subscriptions = [
            "https://example.com/chat/users/{$user->id}/messages",
        ];

        $token = (new Builder())
            ->expiresAt(time() + (60 * 15))
            ->withClaim('mercure', ['subscribe' => $subscriptions])
            ->getToken(new Sha256(), new Key(config('broadcasting.connections.mercure.secret')));


        return Cookie::make('mercureAuthorization', (string) $token);
    }
}