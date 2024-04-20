<?php 

class Response
{
    protected $statusCode = 200;
    protected $headers = [];
    protected $body;

    public function setStatusCode($code)
    {
        $this->statusCode = $code;
        return $this;
    }

    public function header($key, $value)
    {
        $this->headers[$key] = $value;
        return $this;
    }

    public function body($body)
    {
        $this->body = $body;
        return $this;
    }

    public function send()
    {
        http_response_code($this->statusCode);
        foreach ($this->headers as $key => $value) {
            header("$key: $value");
        }
        echo $this->body;
    }
}