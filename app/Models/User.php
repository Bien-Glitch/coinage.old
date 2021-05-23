<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
{
	use HasFactory, Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'username',
		'surname',
		'other_names',
		'email',
		'phone',
		'password',
		'is_phone_verified'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	protected static function boot()
	{
		parent::boot();
		static::created(function ($model) {
			BankDetail::create([
				'user_id' => $model->id,
			]);

			Identification::create([
				'user_id' => $model->id,
			]);
		});
	}

	// Relationships

	public function offers()
	{
		return $this->hasMany(Offer::class);
	}

	public function bankDetail()
	{
		return $this->hasOne(BankDetail::class);
	}

	public function identification()
	{
		return $this->hasOne(Identification::class);
	}


	/// Helper Methods

	public function hasVerifiedPhone()
	{
		return $this->is_phone_verified;
	}

	public function hasVerifiedBank()
	{
		return $this->bankDetail->is_verified;
	}

	public function hasVerifiedId()
	{
		return $this->identification->is_verified;
	}

	public function hasVerifiedProfile()
	{
		return $this->hasVerifiedEmail() && $this->hasVerifiedPhone() && $this->hasVerifiedBank() && $this->hasVerifiedId();
	}

	// Attribute

	public function getFullNameAttribute()
	{
		return ucfirst($this->surname) . ' ' . ucfirst($this->other_names);
	}

	public function getInitialsAttribute()
	{
		return ucfirst($this->surname[0]) . ucfirst($this->other_names[0]);
	}
}
