<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App
 */
class Category extends Model
{
    /**
     * Get the Merchants that belong to this Category
     */
    public function Merchants()
    {
        return $this->hasMany('\App\Merchant');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
    /**
     * The attributes that are excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
