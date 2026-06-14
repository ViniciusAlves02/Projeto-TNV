<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;

    protected $table = 'filmes';

    protected $fillable = [
    'titulo', 
    'genero', 
    'diretor', 
    'ano_lancamento',
    'classificacao_indicativa', 
    'descricao', 
    'preco_locacao'
    ];

    public function locacoes()
    {
        return $this->hasMany(Locacao::class, 'filme_id');
    }

    // Relacionamento com o Estoque (Um filme tem um registro de estoque)
    public function estoque()
    {
        return $this->hasOne(EstoqueFilme::class, 'filme_id');
    }
}