<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkup extends Model
{
    use HasFactory;

    // Define the fillable fields
    protected $fillable = [
        'user_id', 'nama', 'age', 'phone', 'height', 'weight', 'rumah_sakit','status',
    ];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
