<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstoqueFilme extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'estoque_filmes'; // Força o nome correto com underline

    protected $fillable = ['filme_id', 'quantidade_total'];

    // O inverso: o estoque pertence a um filme
    public function filme()
    {
        return $this->belongsTo(Filme::class, 'filme_id');
    }
}