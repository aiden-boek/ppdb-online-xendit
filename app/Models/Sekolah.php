<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sekolah
 * 
 * @property int $id
 * @property array|null $deskripsi_tagihan
 * @property string $amount
 * @property string $amount_perempuan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Sekolah extends Model
{
	protected $table = 'sekolahs';

	protected $casts = [
		'deskripsi_tagihan' => 'json'
	];

	protected $fillable = [
		'deskripsi_tagihan',
		'amount',
		'amount_perempuan'
	];
}
