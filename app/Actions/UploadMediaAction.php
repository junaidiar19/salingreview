<?php

namespace App\Actions;

use Illuminate\Support\Facades\Storage;

class UploadMediaAction
{
  /**
   * Get url
   */
  public function url($path)
  {
    return Storage::disk(config('filesystems.default'))->url($path);
  }

  /**
   * Store image to storage
   */
  public function store($path, $image)
  {
    return Storage::disk(config('filesystems.default'))->put($path, $image);
  }

  /**
   * Delete image from storage
   */
  public function delete($image)
  {
    if ($image) Storage::disk(config('filesystems.default'))->delete($image);
  }
}
