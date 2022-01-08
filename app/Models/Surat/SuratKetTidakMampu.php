<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class SuratKetTidakMampu extends Model
{
    use HasFactory;

    public function approve_by()
    {
        return $this->hasOne(User::class, 'id', 'user_approve');
    }
}
