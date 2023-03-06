<?php

namespace App\Repositories\Interface;

use Symfony\Component\HttpFoundation\File\UploadedFile;

interface FileInterface
{

	public function saveFile(UploadedFile $file, string $path): string;

	public function saveFiles(array $files, string $path): array;

	public function updateFiles(array $files, array $oldFiles, string $path): array;

}