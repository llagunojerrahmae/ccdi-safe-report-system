<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Report extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'tracking_code',
        'incident_type',
        'location',
        'description',
        'evidence_paths',
        'status',
        'priority',
    ];
    
    protected $casts = [
        'evidence_paths' => 'array',
    ];

    // Default values para sa mga bagong record
    protected $attributes = [
        'status' => 'pending',
    ];

    public function getIncidentLabelAttribute(): string
    {
{
    return [
        'bullying'      => 'Bullying (including Cyberbullying)',
        'harassment'    => 'Harassment',
        'deadly_weapon' => 'Possession of Deadly Weapons',
        'theft'         => 'Theft',
        'vandalism'     => 'Vandalism',
        'other'         => 'Other Incidents or Threats',
    ][$this->incident_type] ?? ucfirst($this->incident_type);
}
    }

    /**
     *Generates a unique Tracking Code (e.g. SR-A1B2C3D4)
     */
    public static function generateTrackingCode(): string
    {
        do {
            $code = 'SR-' . strtoupper(Str::random(8));
        } while (self::where('tracking_code', $code)->exists());

        return $code;
    }

    public function notes()
{
    return $this->hasMany(\App\Models\ReportNote::class)->latest();
}
}

