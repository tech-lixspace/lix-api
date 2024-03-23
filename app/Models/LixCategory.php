<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class LixCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lix_category';

    protected $fillable = [
        'name', 
        'is_delete' 
    ];

}