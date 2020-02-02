<?php

namespace App\Http\Middleware;

use Closure;

class CompressHtml
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if ($_SERVER['HTTP_HOST'] != "localhost") {
        
            $response = $next($request);
            $buffer   = $response->getContent();

            if(strpos($buffer,'<pre>') !== false)
            {
                $replace = array(
                    '/<!--[^\[](.*?)[^\]]-->/s' => '',
                    "/<\?php/"                  => '<?php ',
                    "/\r/"                      => '',
                    "/>\n</"                    => '><',
                    "/>\s+\n</"                 => '><',
                    "/>\n\s+</"                 => '><',
                );
            }
            else
            {
                $replace = array(
                    '/<!--[^\[](.*?)[^\]]-->/s' => '',
                    "/<\?php/"                  => '<?php ',
                    "/\n([\S])/"                => '$1',
                    "/\r/"                      => '',
                    "/\n/"                      => '',
                    "/\t/"                      => '',
                    "/ +/"                      => ' ',
                );
            }

            $buffer = preg_replace(array_keys($replace), array_values($replace), $buffer);
            $response->setContent($buffer);
            ini_set('zlib.output_compression', 'On'); 
            return $response;

        }else {

            return $next($request);
        }
    }
}