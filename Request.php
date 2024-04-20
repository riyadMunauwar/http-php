<?php

class Request
{
    protected $method;
    protected $uri;
    protected $headers;
    protected $body;
    protected $files;
    protected $server;
    protected $cookies;

    public function __construct($method, $uri, $headers, $body, $files, $server, $cookies)
    {
        $this->method = $method;
        $this->uri = $uri;
        $this->headers = $headers;
        $this->body = $body;
        $this->files = $files;
        $this->server = $server;
        $this->cookies = $cookies;
    }

    public static function capture()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];
        $headers = getallheaders();
        $body = file_get_contents('php://input');
        $files = $_FILES;
        $server = $_SERVER;
        $cookies = $_COOKIE;

        return new static($method, $uri, $headers, $body, $files, $server, $cookies);
    }

    public function method()
    {
        return $this->method;
    }

    public function uri()
    {
        return $this->uri;
    }

    public function header($key, $default = null)
    {
        return $this->headers[$key] ?? $default;
    }

    public function body()
    {
        return $this->body;
    }

    public function file($key)
    {
        return $this->files[$key] ?? null;
    }

    public function server($key, $default = null)
    {
        return $this->server[$key] ?? $default;
    }

    public function cookie($key, $default = null)
    {
        return $this->cookies[$key] ?? $default;
    }
}

