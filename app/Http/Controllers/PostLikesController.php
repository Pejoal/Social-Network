<?php

namespace App\Http\Controllers;

use App\Models\Post;
// use App\Mail\PostLiked;
use Illuminate\Http\Request;
// use App\Mail\NewUserNotification;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Mail;

class PostLikesController extends Controller
{
  //

  public function __construct()
  {
    $this->middleware(['auth']);
  }
  public function store(Post $post, Request $request)
  {
    // dd();
    if ($post->likedBy($request->user())) {
      return response(null, 409); // conflict error
    }

    $post->likes()->create([
      'user_id' => $request->user()->id
    ]);

    // $user = auth()->user();
    // Mail::to($user)->send(new PostLiked);
    // Mail::to('pejoal.official@gmail.com')->send(new PostLiked(auth()->user(), $post));
    // Mail::to("pejoal.official@gmail.com")->send(new NewUserNotification);
        
    return back();
  }
  public function destroy(Post $post, Request $request)
  {
    $request->user()->likes()->where('post_id', $post->id)->delete();
    return back();
  }
}
