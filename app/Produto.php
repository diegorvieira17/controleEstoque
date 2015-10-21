<?php

namespace Estoque;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome','descricao','valor','quantidade'];

    protected $guarded = ['id']; //impede o usuário de alterar o id do model.
}
