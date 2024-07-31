<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vacante extends Model
{
    use HasFactory;

    //definimos el campo ultimo_dia como date, ya que nos llega como string
    protected $dates = ['ultimo_dia'];

    protected $fillable = [
        'titulo',
        'salario_id',
        'categoria_id',
        'empresa',
        'ultimo_dia',
        'descripcion',
        'imagen',
        'user_id',
    ];

    /* Refernciamos las tablas salario_id y categoria_id pertenecen a otro modelo */

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }

    // Referenciamos la tabla canddato. Una vacantes puede tener muchos canddatos 

    public function candidatos()
    {
        return $this->hasMany((Candidato::class));
    }
    // Relacionamos la tabla vacante con usaurio. Una Vacanmte pertence a un usaurio

    public function reclutador()
    {

        //como hemos llamado reclutador  y no exite ese modelo, a la función tenmos que especificar que va a se el user_id, si llamaramos user no habria que ponerlo
        return $this->belongsTo(User::class, 'user_id');
    }
}
