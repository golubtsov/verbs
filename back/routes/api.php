<?php

use Domain\Api\Verbs\VerbController;
use Illuminate\Support\Facades\Route;

Route::apiResource('verbs', VerbController::class);
