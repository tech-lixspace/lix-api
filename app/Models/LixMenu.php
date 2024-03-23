<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class LixMenu extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lix_menu';

    protected $fillable = [
        'name', 
        'description',
        'price',
        'is_delete'
    ];

}