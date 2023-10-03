<?php

namespace App\Livewire\Query;

use App\Models\Chatroom;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChatioQuery
{
    /**
     * merge chatroom with another users.
     */
    public static function getAllUsers()
    {
        $user_has_chatrooms = User::select('id', 'name')->whereNot('id', Auth::user()->id)->latest()->get();

        return $user_has_chatrooms;
    }

    /**
     * logged user.
     */
    public static function loggedUserName()
    {
        return Auth::user()->name;
    }

    /**
     * get user by his id
     * 
     * @param string $id
     */
    public static function getUserById(string $id)
    {
        return User::where('id', $id)->first();
    }

    /**
     * create user chatroom.
     * 
     * @param string $to_user_id
     */
    public static function createChatroom(string $to_user_id)
    {
        return Chatroom::create([
            'from_user' => Auth::user()->id,
            'to_user' => $to_user_id,
            'is_read' => false,
        ]);
    }

    /**
     * get user list from chatroom
     */
    public static function getListOfUserFromChatroom()
    {
        return Chatroom::where('from_user', Auth::user()->id)->get()->pluck('toUser');
    }
}