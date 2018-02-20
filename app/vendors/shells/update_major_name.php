<?php
class   UpdateMajorNameShell  extends Shell
{
	function  initialize()
	{
		parent::initialize();
	}

	function main() {
		ini_set('memory_limit', "2048M");
        if(! isset($this->args[0]) ) {
            echo "File is not specified\n"; 
            return ;
        }
        $filename= $this->args[0];

        App::import("Model", "Researcher");
        App::import("Model", "Donation");
        
        $year = 2011;
        $handle = fopen( $filename, "r" );
        $array = fgetcsv( $handle );            // SKIP HEADER
        while (($array = fgetcsv( $handle )) != FALSE) {
            $name = ($array[0]);
            $major_name = $array[2];
            if( isset($name) &&  isset($major_name) ){
                $this->updateMajorName( $name, $year, $major_name );
            } else {
                echo "empty ",$name, " ", $major_name, "\n";
            }
        }

	}

	function updateMajorName( $name, $year, $major_name )
    {
        
        $r = new Researcher();
        $rec = $r->findByResearcherName($name,array());
        if($rec) {
            $researcher=$rec["Researcher"];
            $d = new Donation();
            $all = $d->find('all', array('conditions' => 
                                    array('personal_no'=>  $researcher["personal_no"] ,
                                          'year' => $year )
                                            ) );
            foreach( $all as $item ) {
                $donation = $item['Donation'];
                echo $name ,":", $researcher["personal_no"] ,":" ,
                        $donation['year']," ",
                        $donation['receipt_no']," ",
                            $donation['major_name'] ,"==>", $major_name,"\n" ;

                $item["Donation"]["major_name"] = $major_name ;
//                $d->save( $item );
            }
        }
	}
}

?>
