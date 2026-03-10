<?php

namespace App\Modules\Media\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileUploadService
{
    protected $disk;

    public function __construct()
    {
        $this->disk = config('filesystems.default', 'public');
    }

    /**
     * Upload a file to the configured disk.
     */
    public function upload(UploadedFile $file, string $folder = 'uploads'): array
    {
        $filename = $file->getClientOriginalName();
        $uniqueName = Str::uuid() . '.' . $file->getClientOriginalExtension();
        
        $path = $file->storeAs($folder, $uniqueName, $this->disk);

        return [
            'filename' => $filename,
            'path' => $path,
            'disk' => $this->disk,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
        ];
    }

    /**
     * Delete a file from disk.
     */
    public function delete(string $path): bool
    {
        if (Storage::disk($this->disk)->exists($path)) {
            return Storage::disk($this->disk)->delete($path);
        }
        return false;
    }
}
