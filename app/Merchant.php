<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Merchant
 * @package App
 */
class Merchant extends Model
{
    /**
     * Get the category that this book belongs to
     */
    public function category()
    {
        return $this->belongsTo('\App\Category');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'category_id'
    ];
    /**
     * The attributes that are excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
