<?php

namespace Domain\Api\Verbs;

use Illuminate\Http\JsonResponse;
use Random\RandomException;

class VerbController
{
    private VerbService $service;

    public function __construct()
    {
        $this->service = app(VerbService::class);
    }

    /**
     * @throws RandomException
     */
    public function index(): JsonResponse
    {

        $verbs = $this->service->getVerbs();

        return response()->json([
            'verbs' => [
                'v1' => $verbs[0],
                'v2' => $verbs[1],
                'v3' => $verbs[2],
            ],
        ]);
    }
}
