<?php

namespace Larape\Admin_template\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait StoreImage
{
	public $allowed_extensions = "mimes:jpg,png,jpeg";

	 /**
     * Store an image to storage
     *
     * @param \Illuminate\Http\Request
     * @param  string  $fieldname
     * @param  string  $directory
     * @param  string  $last_image
     * @return string  $image
     */
	public function storeImageIfExist(Request $request,$fieldName,$directory,$last_image = null)
	{
		if ($request->hasFile($fieldName)) {
			$this->validateImage($request,$fieldName);

			$image 		= $request->file($fieldName);

			return $image->store($directory,'public');
		}

		return $last_image;
	}

	private function validateImage(Request $request,$fieldName)
	{
		$validate = $request->validate([
			$fieldName => $this->allowed_extensions
		]);
	}

	 /**
     * Update an image and delete last image to storage
     *
     * @param \Illuminate\Http\Request
     * @param  string  $fieldname
     * @param  string  $directory
     * @param  string  $last_image
     * @return string  $image
     */
	public function updateImageAndDelete(Request $request,$fieldName,$directory,$last_image)
	{
		$image = $this->storeImageIfExist($request,$fieldName,$directory,$last_image);
		$this->deleteImage($last_image);
		return $image;
	}

	public function deleteImage($last_image)
	{
		Storage::disk('public')->delete($last_image);
	}
}


?>
