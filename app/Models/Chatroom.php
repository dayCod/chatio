<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'broadcasting.chatrooms';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['fromUser', 'toUser'];

    /**
     * from user relation,
     */
    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user', 'id');
    }

    /**
     * to user relation,
     */
    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user', 'id');
    }
}
