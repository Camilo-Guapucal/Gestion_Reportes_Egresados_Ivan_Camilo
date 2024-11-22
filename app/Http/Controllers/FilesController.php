<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class FilesController extends Controller
{
    public function storeFile()
    {
        // Ejemplo: Comprobar si un archivo existe
        if (File::exists(public_path('example.txt'))) {
            return "El archivo existe.";
        }

        return "El archivo no existe.";
    }
    public function __construct(FilesController $filesController)
{
    $this->filesController = $filesController;
}
}
