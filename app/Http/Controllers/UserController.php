<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @author Deepak Kumar Bastia <deepakkumar.bastia@gmail.com>
 * Class UserController
 */
class UserController extends Controller
{
    /**
     * Get user information by ID
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function users(Request $request)
    {
        // Array of users with different IDs, names, and emails
        $users = [
            [
                "id" => 1,
                "name" => "deepak",
                "email" => "deepak@gmail.com"
            ],
            [
                "id" => 2,
                "name" => "sam",
                "email" => "sam@gmail.com"
            ],
            [
                "id" => 3,
                "name" => "henry",
                "email" => "henry@gmail.com"
            ],
            [
                "id" => 4,
                "name" => "chris",
                "email" => "chris@gmail.com"
            ],
            [
                "id" => 5,
                "name" => "tom",
                "email" => "tom@gmail.com"
            ]
        ];

        if ($request->id) {
            try {
                $search = $request->id;
                $match = array_filter($users, function ($v) use ($search) {
                    return $v['id'] == $search;
                });
            } catch (\Exception $e) {
                throw new Exception("Invalid input", $e->getMessage());
            }

            // If Requested ID is not found
            if (empty($match)) {
                return response()->json([
                    "message" => "Requested ID is not found",
                    "errorCode" => 404
                ], 404);
            }

            // Success response to fetch single user
            return response()->json([
                "data" => array_values($match)[0],
                "status" => 200,
                "message" => "Get user information by ID"
            ]);
        }

        // Success response to fetch all users
        return response()->json([
            "data" => $users,
            "status" => 200,
            "message" => "Get all Users information"
        ]);
    }
}
