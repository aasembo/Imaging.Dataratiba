<?php
namespace App\Controller;

use Cake\Http\Exception\NotFoundException;
use Smalot\PdfParser\Parser;
use FPDF;

class PdfSearchController extends AppController
{
    public function index()
    {
        $this->set('title', 'PDF Search');
        $this->request->allowMethod(['get', 'post']);

        $searchWord = $this->request->getQuery('keyword');
        $results = [];

        if (!empty($searchWord)) {
            $pdfFile = WWW_ROOT . 'files' . DS . 'medical_content_expanded.pdf'; // keep PDF in webroot/files

            if (!file_exists($pdfFile)) {
                throw new NotFoundException(__('PDF file not found.'));
            }

            // Parse PDF
            $parser = new Parser();
            $pdf = $parser->parseFile($pdfFile);
            $pages = $pdf->getPages();

            foreach ($pages as $index => $page) {
                $text = strtolower($page->getText());
                $text = preg_replace("/\s+/", " ", $text);

                if (strpos($text, strtolower(trim($searchWord))) !== false) {
                    $results[] = "Page " . ($index + 1) . ":\n" . $page->getText();
                }
            }

            if (!empty($results)) {
                // Generate new PDF with matched content
                $newPdf = new FPDF();
                $newPdf->SetFont('Arial', '', 12);

                foreach ($results as $content) {
                    $newPdf->AddPage();
                    $newPdf->MultiCell(0, 10, $content);
                }

                $outputFile = WWW_ROOT . 'files' . DS . 'matched_text.pdf';
                $newPdf->Output('F', $outputFile);

                // Stream to browser
                $this->response = $this->response->withType('pdf');
                $this->response = $this->response->withFile($outputFile, [
                    'download' => false, // inline open
                    'name' => 'matched_text.pdf'
                ]);
                return $this->response;
            }

            $this->Flash->error(__('No matches found for "{0}".', $searchWord));
        }

        $this->set(compact('searchWord', 'results'));
    }
}
