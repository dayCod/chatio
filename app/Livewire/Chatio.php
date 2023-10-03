<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Query\ChatioQuery;

class Chatio extends Component
{
    /**
     * user on chatroom.
     */
    public $user_on_chatroom;

    /**
     * set public user variable.
     */
    public $users;

    /**
     * logged users.
     */
    public $logged_user;

    /**
     * selected user on option.
     */
    public $selectedItem;

    /**
     * set mounted functions.
     */
    public function mount()
    {
        $this->user_on_chatroom = ChatioQuery::getListOfUserFromChatroom() ?? collect([]);
        $this->logged_user = ChatioQuery::loggedUserName();
        $this->users = ChatioQuery::getAllUsers()->diff(ChatioQuery::getListOfUserFromChatroom());
    }

    /**
     * prepend user to chatroom
     */
    public function getSelectedItems()
    {
        ChatioQuery::createChatroom($this->selectedItem);

        $selected_user = ChatioQuery::getUserById($this->selectedItem);
        
        $this->user_on_chatroom->prepend($selected_user);

        $this->users = $this->users->diff(ChatioQuery::getListOfUserFromChatroom());
        
    }

    /**
     * render chatio view.
     */
    public function render()
    {
        return view('livewire.chatio');
    }
}
