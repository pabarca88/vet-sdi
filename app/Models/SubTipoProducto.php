<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubTipoProducto extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Nombre de la tabla en la base de datos
     *
     * @var string
     */
    protected $table = 'sub_tipo_productos';

    /**
     * Los atributos que son asignables en masa
     *
     * @var array
     */
    protected $fillable = [
        'id_tipo_producto',
        'nombre',
        'descripcion',
        'codigo',
        'activo',
        'orden',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos
     *
     * @var array
     */
    protected $casts = [
        'id_tipo_producto' => 'integer',
        'activo' => 'boolean',
        'orden' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Relación con TipoProducto
     * Un subtipo pertenece a un tipo de producto
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoProducto()
    {
        return $this->belongsTo(TipoProducto::class, 'id_tipo_producto');
    }

    /**
     * Relación con Productos
     * Un subtipo puede tener muchos productos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_sub_tipo_producto');
    }

    /**
     * Scope para obtener solo subtipos activos
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }

    /**
     * Scope para obtener subtipos por tipo de producto
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $idTipoProducto
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePorTipoProducto($query, $idTipoProducto)
    {
        return $query->where('id_tipo_producto', $idTipoProducto);
    }

    /**
     * Scope para obtener subtipos ordenados
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $direction
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrdenados($query, $direction = 'asc')
    {
        return $query->orderBy('orden', $direction)->orderBy('nombre', $direction);
    }

    /**
     * Obtener subtipos de audífonos (tipo_producto = 9)
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function subtiposAudifonos()
    {
        return static::activos()
            ->porTipoProducto(9)
            ->ordenados()
            ->get();
    }
}
