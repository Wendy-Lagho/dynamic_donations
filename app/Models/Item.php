<?
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow the Laravel naming convention
    protected $table = 'items';

    // Specify the fillable attributes for mass assignment
    protected $fillable = [
        'name',
        'category',
        'description',
        'unit_of_measure',
        'minimum_stock_level',
        'maximum_stock_level',
        'shelf_life',
    ];

    // Define the relationship to the Need model
    public function needs()
    {
        return $this->hasMany(Need::class, 'item_id');
    }
}
