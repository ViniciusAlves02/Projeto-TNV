<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class locacao extends Model
{
    use HasFactory;
    public $timestamp = true;
    protected $table = 'locacoes';
    protected $fillable = [
        'user_id',
        'funcionario_id',
        'filme_id',
        'data_locacao',
        'data_prevista_devolucao',
        'data_devolucao',
        'valor_locacao',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_id');
    }
    public function filme()
    {
        return $this->belongsTo(Filme::class, 'filme_id');
    }
}
