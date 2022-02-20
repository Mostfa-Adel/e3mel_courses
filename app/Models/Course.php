<?php

namespace App\Models;

use App\Repositories\CourseRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;
    public static $types=['beginner', 'immediate', 'high'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'views_count',
        'levels',
        'hours',
        'active',
        'category_id',
    ];



    /**
     * Scope a query to only include active courses
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public static function getTypes()
    {
        return self::$types;
    }

    /**
     * Get the category that owns the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Get the active
     *
     * @param  string  $value
     * @return string
     */
    public function getActivatedAttribute($value)
    {
        return $this->active?'activated':'deactivated';
    }

    /**
     * Get the level
     *
     * @param  string  $value
     * @return string
     */
    // public function getLevelsAttribute($value)
    // {
    //     return CourseRepository::getLevelName($value) ;
    // }
    public function getLevelAttribute($value)
    {
        return CourseRepository::getLevelName($this->levels) ;
    }
    
}
