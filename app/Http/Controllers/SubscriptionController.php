<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function store()
    {
        $attr = request()->validate(
            [
                'author_id' => 'required'
            ]
        );


        $user = User::find(auth()->user()->id);

        if ($user->hasSubscription($attr['author_id'])) {
            return back()->with('success', 'You already subscribed to the author');
        }

        $attr['user_id'] = $user->id;
        // Append a subscription for the user -> author.
        $user->subscriptions()->create($attr);

        return back()->with('success', 'Subscription added correctly');
    }
}
