<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Correção na importação do User

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'titulo',
        'setor',
        'descricao',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relacionamento com o model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
