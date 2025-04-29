<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiReaderService;

class ApiReaderController extends Controller
{
    protected $service;

    public function __construct(ApiReaderService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return response()->json($this->service->getCombinedData());
    }
}
