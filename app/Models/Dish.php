<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dish extends Model
{
    use HasFactory;
		public function category(): BelongsTo
		{
			return $this->belongsTo(Category::class);
		}

		public function ingredients(): BelongsToMany
		{
			return $this->belongsToMany(Ingredient::class, 'recipes')->withPivot('count');
		}
}
