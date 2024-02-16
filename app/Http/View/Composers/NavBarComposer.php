<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Contact;

class NavBarComposer
{
    public function compose(View $view){
        $unreadCount = Contact::where('is_read',false)->count();
        $view->with('unreadCount',$unreadCount);
    }
}