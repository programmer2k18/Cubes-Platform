<?php

namespace App\appModels\Classification;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Phpml\Classification\KNearestNeighbors;
use Phpml\Preprocessing\Normalizer;
use Phpml\Classification\SVC;
use Phpml\SupportVectorMachine\Kernel;
use Phpml\CrossValidation\StratifiedRandomSplit;
use Phpml\CrossValidation\RandomSplit;
use Phpml\Dataset\ArrayDataset;
use Phpml\Metric\Accuracy;

class UserBookingStatusClassifier
{
    public $co_id;// specific co-working space ID
    private $data; //training data for specific co-working space
    private $X_train;
    private $Y_train;
    private $classifier;
    private $normalizer;

    public function __construct()
    {
        $this->co_id = \request()->session()->get('admin')->id;
        $this->data = [];
        $this->X_train = [];
        $this->Y_train = [];
        $this->normalizer = new Normalizer();
    }

    public function getDataFromDB(){

        $this->data = DB::select('select b.user_id, b.co_seating_id as asset, b.cost,
               TIMEDIFF(b.to,b.from) as bookingPeriod, b.capacity, a.price, b.status 
               from co_bookings b inner JOIN co_seating_desks a
               on b.co_seating_id = a.id where b.co_id=? and b.from<? and b.user_id !=0',
            [$this->co_id,Carbon::now()]);
        return $this->data;
    }

    public function preProcessingData(){

        foreach ($this->data as $r){

            if ($r->status =="verified" || $r->status =="closed")
                $r->status = 1;
            elseif ($r->status =="canceled" || $r->status =="pending")
                $r->status = 0;
            $r->bookingPeriod = (int) explode(":",$r->bookingPeriod)[0];
            $this->X_train[]=[$r->user_id,$r->asset,$r->cost,$r->bookingPeriod,$r->capacity,$r->price];
            $this->Y_train[]=$r->status;
        }
    }

    public function train()
    {
        $this->normalizer->transform($this->X_train);
        $this->classifier = new KNearestNeighbors(1);
        $this->classifier->train($this->X_train,$this->Y_train);

        Cache::put('classifier:'.$this->co_id,$this->classifier,7*24*60);
        return $this->classifier;
    }

    public function predict($sample){

        $this->normalizer->transform($sample);
        if (Cache::has('classifier:'.$this->co_id))
            $this->classifier = Cache::get('classifier:'.$this->co_id);
        else{

            $this->getDataFromDB();
            $this->preProcessingData();
            $this->classifier = $this->train();
        }
        return $this->classifier->predict($sample);
    }

    /**
     * @return float|int
     * @throws \Phpml\Exception\InvalidArgumentException
     */
    public function testAccuracy(){
        $dataset = new ArrayDataset($this->X_train,$this->Y_train);
        $dataset = new RandomSplit($dataset, 0.1);

        $train_samples = $dataset->getTrainSamples();
        $test_samples = $dataset->getTestSamples();

        $this->normalizer->transform($train_samples);
        $this->normalizer->transform($test_samples);

        $this->classifier = new  KNearestNeighbors(1);
        $this->classifier->train($train_samples,$dataset->getTrainLabels());

        $Y_pred = $this->classifier->predict($test_samples);
        return Accuracy::score($dataset->getTestLabels(),$Y_pred)*100;
    }

}
