<?php

namespace App\Http\Controllers;

use App\Repositories\BaseRepositoryInterface;
use App\Services\BaseServiceInterface;

abstract class Controller
{
    protected BaseRepositoryInterface $repository;

    protected BaseServiceInterface $service;
}
