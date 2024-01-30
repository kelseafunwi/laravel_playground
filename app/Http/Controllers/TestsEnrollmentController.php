<?php

namespace App\Http\Controllers;

use App\Notifications\TestEnrollment;
use Illuminate\Http\Request;

// my models importation
use App\Models\User;

class TestsEnrollmentController extends Controller
{

    public function sendTestNotification() {
        $user = User::first();

        $enrollmentData = [
            'body' => 'You have received a new enrollment application',
            'enrollmentText' => 'You are allowed to enroll.',
            'url' => url('/'),
            'thankyou' => 'You have 14 days to enroll'
        ];

        $user->notify(new TestEnrollment($enrollmentData));
    }
}
