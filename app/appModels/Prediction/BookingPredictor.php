<?php

namespace App\appModels\Prediction;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Phpml\Dataset\ArrayDataset;
use Phpml\Regression\LeastSquares;
use Phpml\Preprocessing\Normalizer;
use Phpml\CrossValidation\RandomSplit;


use Phpml\Metric\Accuracy;

class BookingPredictor
{
    public $co_id;// specific co-working space ID
    private $data; //training data for specific co-working space
    private $X_train;
    private $Y_train;
    private $regression;
    private $normalizer;

    public function __construct()
    {
        $this->co_id = \request()->session()->get('admin')->id;
        $this->data = [];
        $this->X_train = [];
        $this->Y_train = [];
        $this->normalizer = new Normalizer(Normalizer::NORM_L2);
    }

    public function getDataFromDB($period){
        if ($period == "all"){
            $this->data = DB::select('select  a.type, year(b.from) as yearDate, month(b.from) as mon,
               count(a.type) as bookCount from co_bookings b inner JOIN co_seating_desks a
               on b.co_seating_id = a.id where b.co_id=? and (b.status=? or b.status=?) 
               group by a.type,yearDate,mon', [$this->co_id,"verified","closed"]);
        }
        else{
            $from = \Carbon\Carbon::now()->subMonths($period+1);
            $this->data = DB::select('select  a.type, year(b.from) as yearDate, month(b.from) as mon,
               count(a.type) as bookCount from co_bookings b inner JOIN co_seating_desks a
               on b.co_seating_id = a.id where b.co_id=? and (b.status=? or b.status=?) and 
               date(b.from) >=? group by a.type,yearDate,mon',
               [$this->co_id,"verified","closed",$from]);
        }
        return $this->data;
    }

    public function preProcessingData(){

        foreach ($this->data as $rec){
            if ($rec->type =="Private_offices")
                $this->X_train[]=[1,0,0,$rec->yearDate,$rec->mon];
            elseif ($rec->type =="Meeting_rooms")
                $this->X_train[]=[0,1,0,$rec->yearDate,$rec->mon];
            else
                $this->X_train[]=[0,0,1,$rec->yearDate,$rec->mon];
            $this->Y_train[]=$rec->bookCount;
        }
    }

    public function train()
    {
        $this->normalizer->transform($this->X_train);
        $this->regression = new LeastSquares();
        $this->regression->train($this->X_train,$this->Y_train);

        //Cache::put('regression:'.$this->co_id,$this->regression,7*24*60);
        return $this->regression;
    }

    public function predict($sample, $training_data_period){

        $this->normalizer->transform($sample);
        /*if (Cache::has('regression:'.$this->co_id))
            $this->regression = Cache::get('regression:'.$this->co_id);*/

        $this->getDataFromDB($training_data_period);
        $this->preProcessingData();
        $this->regression = $this->train();

        return $this->regression->predict($sample);
    }

    public function testAccuracy(){
        $dataset = new ArrayDataset($this->X_train,$this->Y_train);
        $dataset = new RandomSplit($dataset, 0.2);

        $train_samples = $dataset->getTrainSamples();
        $test_samples = $dataset->getTestSamples();

        $this->normalizer->transform($train_samples);
        $this->normalizer->transform($test_samples);

        $this->regression = new  LeastSquares();
        $this->regression->train($train_samples,$dataset->getTrainLabels());

        $Y_pred = $this->regression->predict($test_samples);
        for ($i=0;$i<count($Y_pred);$i++){
            $Y_pred[$i] = (int) ceil($Y_pred[$i]);
        }
        return Accuracy::score($dataset->getTestLabels(),$Y_pred)*100;
    }
}