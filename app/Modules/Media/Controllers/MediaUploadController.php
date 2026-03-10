<?php

namespace App\Modules\Media\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Media\Models\Media;
use App\Modules\Media\Services\FileUploadService;
use App\Modules\Media\Services\ImageOptimizer;
use Illuminate\Http\Request;

class MediaUploadController extends Controller
{
    protected $fileUpload;
    protected $imageOptimizer;

    public function __construct(FileUploadService $fileUpload, ImageOptimizer $imageOptimizer)
    {
        $this->fileUpload = $fileUpload;
        $this->imageOptimizer = $imageOptimizer;
    }

    /**
     * Display a listing of personal media.
     */
    public function index()
    {
        $assets = Media::latest()->paginate(24);
        return view('Media::index', compact('assets'));
    }

    /**
     * Store a newly uploaded media.
     */
    public function upload(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'image', 'max:5120'], // 5MB limit
        ]);

        if ($request->hasFile('file')) {
            $data = $this->fileUpload->upload($request->file('file'));
            
            // Apply optimization (resizing/compression)
            $this->imageOptimizer->optimize($data['path']);

            $media = Media::create($data);

            return back()->with('success', 'Media uploaded successfully!');
        }

        return back()->with('error', 'Upload failed.');
    }
}
