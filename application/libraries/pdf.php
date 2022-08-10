<?php defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf extends Dompdf
{
    protected $ci;
    private $filename;

    public function __construct()
    {
        parent::__construct();
        $this->ci = &get_instance();
    }

    public function setFileName($filename)
    {
        $this->filename = $filename;
    }

    public function loadView($viewFile, $data = array())
    {
        $options = new Options();
        $options->setChroot($_SERVER["DOCUMENT_ROOT"] . '\korlantas_tah');
        $options->setDefaultFont('courier');

        $this->setOptions($options);

        $html = $this->ci->load->view($viewFile, $data, true);
        $this->loadHtml($html);
        $this->render();
        $this->stream($this->filename, ['Attachment' => 0]);
    }
}

// use Dompdf\Dompdf;
// class Pdf extends Dompdf
// {
//     public $filename;
//     public function __construct()
//     {
//         parent::__construct();
//         $this->filename = "laporan.pdf";
//     }
//     protected function ci()
//     {
//         return get_instance();
//     }
//     public function load_view($view, $data = array())
//     {
        
//         $html = $this->ci()->load->view($view, $data, TRUE);
//         $this->loadHtml($html);
//         $this->render();
//         $this->stream($this->filename, array("Attachment" => false));
//     }
// }
