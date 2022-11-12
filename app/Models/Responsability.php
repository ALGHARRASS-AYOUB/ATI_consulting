<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Responsability
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ResponsabilityFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Responsability newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Responsability newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Responsability query()
 * @method static \Illuminate\Database\Eloquent\Builder|Responsability whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Responsability whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Responsability whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Responsability extends Model
{
    use HasFactory;
}
