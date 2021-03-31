<?php
namespace App\Observers;

use App\Notifications\NewPost;
use App\News;
use App\User;

class NewsObserver
{
    public function created(News $news)
    {
        $author = $news->news_has_user->name;
        $users = User::where('id', '!=', auth()->user()->id)->get();
        foreach ($users as $user) {
            $user->notify(new NewPost($author, $news->title));
        }
    }
}