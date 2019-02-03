<?php

namespace App\Listeners;

use App\Article;
use App\Events\CategoryDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RemoveDeletedCategory
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CategoryDeleted $event)
    {
        Article::where('category_id', $event->category->id)
            ->update(['category_id' => 0]);
    }
}
