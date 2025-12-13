<?php

namespace App\Response;

/**
 * Class AppResponse
 * Standardized response object for API responses.
 */
class AppResponse
{
    /** @var mixed|null Response data */
    public $data = null;

    /** @var string Response status ("success" or "failed") */
    public string $status = '';

    /** @var int HTTP status code */
    public int $statusCode = 200;

    /** @var string Response message */
    public string $message = '';

    /**
     * AppResponse constructor.
     *
     * @param  string  $status  "success" or "failed"
     * @param  mixed  $data  Response payload
     * @param  int  $statusCode  HTTP status code
     * @param  string  $message  Response message
     */
    public function __construct(string $status, $data, int $statusCode = 200, string $message = '')
    {
        $this->status = $status;
        $this->data = $data;
        $this->statusCode = $statusCode;
        $this->message = $message;
    }

    /**
     * Check if the response indicates success.
     */
    public function succeed(): bool
    {
        return $this->status === 'success'; // or use statusCode check if you prefer
    }
}
