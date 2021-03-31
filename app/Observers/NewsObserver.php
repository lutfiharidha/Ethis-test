<?php
namespace App\Observers;

use App\Notifications\NewPost;
use App\News;
use App\User;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class NewsObserver
{
    public function created(News $news)
    {
        $author = $news->news_has_user->name;
        $users = User::where('id', '!=', auth()->user()->id)->where('email_verified_at', '!=', Null)->get();
        $contactList = [];
        $i = 0;
        foreach($users as $user){
            $contactList[$i] = $user->email;
            $i++;
            $user->notify(new NewPost($user->name, $author, $news));
        }
        Mail::send('email', [
            'user' => $user->name,
            'author' => $author,
            'news' => $news,
        ], function($message) use($contactList) {
            $message->from('no-reply@laravel-news.com', 'Laravel News')
                    ->bcc($contactList, 'Contact List')
                    ->subject("News For You");
        });
    }
}