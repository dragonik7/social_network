<?php

namespace App\Repositories;

use App\Repositories\Interface\FileInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileRepository implements FileInterface
{

	public function saveFile(UploadedFile $file, string $path = ''): string
	{
		$fileName = Str::uuid() . Carbon::now('D') . '.' . $file->getClientOriginalExtension();
		return Storage::disk('public')->putFileAs($path, $file, $fileName);
	}

	public function saveFiles(array $files, string $path): array
	{
		foreach ($files as $key => $file) {
			$files[$key] = $this->saveFile($file, $path);
		}
		return $files;
	}

	public function updateFiles(array $files, array $oldFiles, string $path): array
	{
		foreach ($files as $key => $file) {
			$files[$key] = $this->saveFile($file, $path);
		}
		Storage::disk('public')->delete(array_diff($oldFiles, $files));
		return $files;
	}
}