<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model {

    //informando que tabela que a classe vai trabalhar (pode ser obtido por causa do nome na classe/tabela, laravel consegue encontrar)
    protected $table = 'series';

    public $timestamps = false;
    protected $fillable = ['nome'];
    
}