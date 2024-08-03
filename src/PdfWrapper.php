<?php

namespace Ashik\Pdf;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Mpdf\MpdfException;

class PdfWrapper
{

    /**
     * @param array $config optional, default []
     * @return Pdf
     * @throws MpdfException
     */
    public function getPdf(array $config = []): Pdf
    {
        return new Pdf($config);
    }

    /**
     * Load an HTML string
     *
     * @param string $html
     * @param array $config optional, default []
     * @return Pdf
     * @throws MpdfException
     */
    public function loadHTML(string $html, array $config = []): Pdf
    {
        $pdf = $this->getPdf($config);
        $pdf->getMpdf()->WriteHTML($html);

        return $pdf;
    }

    /**
     * Chunk an HTML with given word and load string
     *
     * @param string $separator
     * @param string $html
     * @param array $config optional, default []
     * @return Pdf
     * @throws MpdfException
     */
    public function chunkLoadHTML(string $separator, string $html, array $config = []): Pdf
    {
        $pdf = $this->getPdf($config);

        $chunks = explode($separator, $html);
        foreach ($chunks as $chunk) {
            $pdf->getMpdf()->WriteHTML($chunk);
        }

        return $pdf;
    }


    /**
     * Load an HTML file
     *
     * @param string $file
     * @param array $config optional, default []
     * @return Pdf
     * @throws MpdfException
     */
    public function loadFile(string $file, array $config = []): Pdf
    {
        return $this->loadHTML(File::get($file), $config);
    }

    /**
     * Chunk an HTML file with given word and load HTML
     *
     * @param string $separator
     * @param string $file
     * @param array $config optional, default []
     * @return Pdf
     * @throws MpdfException
     */
    public function chunkLoadFile(string $separator, string $file, array $config = []): Pdf
    {
        return $this->chunkLoadHTML($separator, File::get($file), $config);
    }

    /**
     * Load a View and convert to HTML
     *
     * @param string $view
     * @param array $data
     * @param array $mergeData
     * @param array $config optional, default []
     * @return Pdf
     * @throws MpdfException
     */
    public function loadView(string $view, array $data = [], array $mergeData = [], array $config = []): Pdf
    {
        return $this->loadHTML(View::make($view, $data, $mergeData)->render(), $config);
    }

    /**
     * Chunk a View with given word and load HTML
     *
     * @param string $separator
     * @param string $view
     * @param array $data
     * @param array $mergeData
     * @param array $config optional, default []
     * @return Pdf
     * @throws MpdfException
     */
    public function chunkLoadView(string $separator, string $view, array $data = [], array $mergeData = [], array $config = []): Pdf
    {
        return $this->chunkLoadHTML($separator, View::make($view, $data, $mergeData)->render(), $config);
    }
}
