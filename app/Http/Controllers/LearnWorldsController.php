<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LearnWorldsService;

class LearnWorldsController extends Controller
{
    protected $learnWorldsService;

    public function __construct(LearnWorldsService $learnWorldsService)
    {
        $this->learnWorldsService = $learnWorldsService;
    }

    public function getUsers(Request $request)
    {
        $params = $request->only([
            'page', 'cf_$field_name', 'include_suspended', 'items_per_page', 
            'registration_after', 'registration_before', 'role', 'status', 'tags'
        ]);

        $users = $this->learnWorldsService->getAllUsers($params);

        return response()->json($users);
    }
}