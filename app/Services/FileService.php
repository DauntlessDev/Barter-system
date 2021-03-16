<?php

namespace App\Services;

use CodeIgniter\HTTP\Files\UploadedFile;
use CodeIgniter\HTTP\RequestInterface;

class FileService {

    public UploadedFile $file;

    private string $folderPath;

    public function __construct(string $folderPath = 'images/uploads/')
    {
        $this->folderPath = $folderPath;
    }

    /**
	 * Manages saving of files
	 *
	 * @param RequestInterface|object $request
	 * @param string $filename
	 * @return string either path to image or base64 encoding
     *
	 */
    public function saveFile($request, string $filename): string {
        $this->file = $request->getFile($filename);

        if ($this->file->getName() === '') return '';

        $randomName = $this->file->getRandomName();
        $this->file->move($this->folderPath, $randomName);

        return $this->folderPath . $this->file->getName();
    }
}