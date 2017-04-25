<?php

namespace HexTechnology\Integrations\Documents;

use Dompdf\Dompdf;
use Rhubarb\Crown\Application;

abstract class PdfDocument
{
    public $content;
    public $data;

	public function toHtml($data = [])
    {
        $html = "
<html>
<head>
</head>
<body style='font-family: Helvetica;'>" . $this->getContent($data) . "
</body>
</html>";
        return $html;
    }

    public function toPdfFile($file, $data = [])
    {
        $unitTesting = Application::current()->isUnitTesting();

        $domPdf = new Dompdf();
        $domPdf->set_paper("A4", "Portrait");
        $domPdf->load_html($this->toHtml($data));
        $domPdf->render();
        $pdfString = $domPdf->output(["compress" => !$unitTesting]);

        if (!file_exists(dirname($file))) {
            mkdir(dirname($file), 0777, true);
        }

        file_put_contents($file, $pdfString);
    }

    abstract public function getContent($data = []);
}
