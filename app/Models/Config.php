<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Config extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($config) {
            foreach ($config->media as $media) {
                $dir = $media->type == 'img' ? 'configs/img/' : 'configs/vid/';
                // Delete the file from storage
                Storage::disk('public')->delete($dir . $media->file);

                // Delete the media record
                $media->delete();
            }
        });
    }
}
