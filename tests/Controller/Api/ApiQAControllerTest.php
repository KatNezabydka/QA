<?php

namespace App\Tests\Controller\Api;

use App\Controller\Api\ApiQAController;
use PHPUnit\Framework\TestCase;

class ApiQAControllerTest extends TestCase
{
    public function testGetQAAction(): void
    {
        $qaController = new ApiQAController();
    }
}
