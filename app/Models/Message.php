<?php

namespace App\Models;

use App\Http\Requests\MessageRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'title', 'content', 'type'];

    protected $table = "messages";

    public function rules(MessageRequest $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'title' => 'required|string|max:50',
            'content' => 'required|string|max|200',
        ]);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

}
