<?php

namespace Controller;

use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    public function index()
    {
        return new Response('Hello World', 200);
    }
}