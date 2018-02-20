<?php
class documentrevisions_model extends Model {
public function __construct($serial='')
    {
        parent::__construct('id', 'documentrevisions'); //primary key, tablename
		$this->rs['id'] = '';
		$this->rs['serial_number'] = $serial; $this->rt['serial_number'] = 'VARCHAR(255) UNIQUE';
		$this->rs['size'] = '';  // Results in VARCHAR255
 		
 		
 		if ($serial) {
            $this->retrieve_record($serial);
        }
        
        $this->serial_number = $serial;
    }
    
	public function process($data)
	{		
		$this->size = trim($data);
		$this->save();
	}

	
}

