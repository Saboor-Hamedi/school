<!--

information
    this class is for exporting tables to csv file
    everything has done in this class, just clas the $this->exportTables("Write you tablename...");
    and I used jquery to select the button  
    ../jquery/student.js
-->
<?php

class export
{
    private $con ;
    public function __construct($con)
    {
        $this->con = $con;
    }
    public function setSelect($con)
    {
        $this->con = $con;
    }
    public function getSelect()
    {
        return $this->con;
    }
    public function getExportMe()
    {
        return $this->con;
    }

    public function exportTables($ex)
    {
        $data = $this->getExportMe()->select("SELECT * FROM $ex");
        // Submission from
        $filename = 'filename'. ".csv";
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-type: text/csv; charset=UTF-8");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Expires: 0");
        $this->ExportCSVFile($data);
      
        exit();
    }
    public function ExportCSVFile($records)
    {
        // create a file pointer connected to the output stream
        ob_clean();
        $fh = fopen('php://output', 'w');
        $heading = false;
        if (!empty($records)) {
            foreach ($records as $row) {
                if (!$heading) {
                    // output the column headings
                    fputcsv($fh, array_keys($row));
                    $heading = true;
                }
                // loop over the rows, outputting them
                fputcsv($fh, array_values($row));
            }
        }
     

        fclose($fh);
    }
}
