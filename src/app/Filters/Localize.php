<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Localize implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $uri = &$request->uri;
        $segments = array_filter($uri->getSegments());
        // print_r($segments);
        // die;
        $nbSegments = count($segments);

        // Keep only the first 2 letters (en-UK => en)
        $userLocale = strtolower(substr(service('request')->getLocale(), 0, 2));

        // If the user's language is not a supported language, take the default language
        $locale = in_array($userLocale, $request->config->supportedLocales) ? $userLocale : $request->config->defaultLocale;

        // If we request /, redirect to /{locale}
        if ($nbSegments == 0)
        {
            return redirect()->to("/id");
        }

        $locale = $segments[0];

        // If the first segment of the URI is not a valid locale, trigger a 404 error
        if ( ! in_array($locale, $request->config->supportedLocales))
        {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }

}