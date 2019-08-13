<?php

namespace App\Http\Middleware;

use Closure;

class HelloMiddleware{
    public function handle($request, Closure $next){
        // $data = [
        //     ['name' => 'Robert Downey Jr', 'mail' => 'ironman@avengers'],
        //     ['name' => 'Chris Evans', 'mail' => 'capamerica@avengers'],
        //     ['name' => 'Chris Hemsworth', 'mail' => 'thor@avengers']
        // ];
        // $request->merge(['data'=>$data]);
        $response = $next($request);
        $content = $response->content();

        $pattern = '/<middleware>(.*)<\/middleware>/i';
        $replace = '<a href = "http://$1">$1</a>';
        $content = preg_replace($pattern, $replace, $content);
        $response->setContent($content);
        return $response;
    }
}
