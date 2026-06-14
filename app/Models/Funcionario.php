<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionarios';

    protected $fillable = ['name', 'email', 'cargo', 'salario'];

    public function locacoes()
    {
        return $this->hasMany(Locacao::class, 'funcionario_id');
    }
}