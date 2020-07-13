<?php
namespace App\Http\Controllers\Traits;

trait ConditionalWatch
{


    public function musicTime()
    {

        $day = date('l');

        $h = date('G');

       // dd($h);

        //Monday
        if($day ='Monday')
        {

            if($h<12){
                $type =1;
            }
            else {
                $type=9;
            }

        }


        if($day ='Tuesday')
        {
            if($h<14) {
                $type = 9;
            }
            else {
                $type = 7;
            }
        }


        if($day ='Wednesday')
        {
            if($h<12){
                $type =10;
            }
            else {
                $type=8;
            }


        }


        if($day ='Thursday')
        {
        $type =3;
        }


        if($day ='Friday')
        {
            $type = 4;
        }

        if($day ='Saturday')
        {
            $type =12;
        }

        if($day ='Sunday')
        {
            $type = 2;
        }


       // Tuesday
        //Wednesday
        //Thursday
        //Friday
        //Saturday
        //Sunday



      //  dd($time);




        return $type;


    }

}