<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PhpParser\Node\Expr\AssignOp\Mod;

class Todo extends Model
{

    use HasFactory, Notifiable;

    const STATUS_COMPLETE = 1;
    const STATUS_INCOMPLETE = 0;

    /**
     * @var string
     */
    protected $table = 'todo';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    public function isComplete()
    {
        return ($this->status === self::STATUS_COMPLETE);
    }

    public function isIncomplete()
    {
        return ($this->status === self::STATUS_INCOMPLETE);
    }
}
