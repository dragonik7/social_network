<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class ImagePath implements CastsAttributes
{

	/**
	 * @inheritDoc
	 */
	public function get($model, string $key, $value, array $attributes)
	{
		if (is_null($value)) {
			return null;
		}
		return array_map(function ($image)
		{
			if (str_starts_with($image, 'http')) {
				return $image;
			}
			return url('/storage', $image);
		}, json_decode($value));
	}

	/**
	 * @inheritDoc
	 */
	public function set($model, string $key, $value, array $attributes)
	{
		return json_encode($value);
	}
}