<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportNote extends Model
{
    protected $fillable = ['report_id', 'user_id', 'status', 'note', 'seen_by_admin_at'];

    protected $casts = ['seen_by_admin_at' => 'datetime'];

    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}