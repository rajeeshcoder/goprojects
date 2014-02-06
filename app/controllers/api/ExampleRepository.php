<?php namespace App\Controllers\Api;

use \Illuminate\Support\Facades\DB;
use Mgallegos\LaravelJqgrid\Repositories\RepositoryInterface;
use Mgallegos\LaravelJqgrid\Repositories\EloquentRepositoryAbstract;
use Illuminate\Database\Eloquent\Model;
use App\Models\PartMaster;

class ExampleRepository extends EloquentRepositoryAbstract {


    public function __construct()
    {
        $this->Database = new PartMaster;
        $this->visibleColumns = array('id', 'part_number','description', 'unit', 'price');
        $this->orderBy = array(array('id', 'asc'), array('part_number','desc'));
    }

/*
     public function getTotalNumberOfRows(array $filters = array())
    {
        return 5;
    }

    public function getRows($limit, $offset, $orderBy = null, $sord = null, array $filters = array())
    {
        
        return array(
                    array('1-1', '1-2' , '1-3', '1-4', '1-5'),
                    array('2-1', '2-2' , '2-3', '2-4', '2-5'),
                    array('3-1', '3-2' , '3-3', '3-4', '3-5'),
                    array('4-1', '4-2' , '4-3', '4-4', '4-5'),
                    array('5-1', '5-2' , '5-3', '5-4', '5-5'),
                );
    
    }
*/
}
