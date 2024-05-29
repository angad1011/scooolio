<?php
namespace App\Traits;

trait LectureTimingTrait
{
    public function lecture_timing($timing){
        // dd($timing->shift_end);
        $school_start_time = strtotime($timing->shift_start);
        $school_end_time = strtotime($timing->shift_end);
        $break_start_time = strtotime($timing->break_time_start);
        $noOfLecSesionOne = $timing->no_of_lect_fist_session;
        $noOfLecSesionTwo = $timing->no_of_lect_secound_session;
        $break_duration  = $timing->break_durations;
        $prayer_duration = $timing->prayer_time;

        // Calculate the start time for the first session (school start time + prayer duration)
        $first_session_start_time = $school_start_time + ($prayer_duration * 60);

        // Calculate the end time for the first session
        $first_session_end_time = $break_start_time - $break_duration;

        // Calculate the number of periods for the first session
        $first_session_duration = ($first_session_end_time - $first_session_start_time) / 60; // in minutes    

        $period_duration = $first_session_duration / $noOfLecSesionOne;

        // Calculate start and end time for each period in the first session
        $periods_first_session = $periods_first_session_api = [];
        $current_time = $first_session_start_time;
        for ($i = 1; $i <= $noOfLecSesionOne; $i++) {
            $period_start = date('h:i A', $current_time);
            $current_time += $period_duration * 60;
            $period_end = date('h:i A', $current_time);
            $periods_first_session[] = [
                'period_number' => $i,
                'start_time' => $period_start,
                'end_time' => $period_end
            ];
            
            $periods_first_session_api['Session 1'][] = [
                'period_number' => $i,
                'start_time' => $period_start,
                'end_time' => $period_end
            ]; 

        }

        $breakDuration =  $break_start_time + $break_duration * 60;
        $breakeEndtime = date('H:i',$breakDuration);
        $breakSetup [] = [
            'Break Start' => $timing->break_time_start,
            'Break Duration' => $break_duration,
            'Breake End' => $breakeEndtime,
        ];


        // Calculate the start time for the second session (end time of first session + break duration)
        $second_session_start_time = $break_start_time + $break_duration;

        // Calculate the number of periods for the second session
        // $second_session_duration = ($school_end_time - $second_session_start_time) / 60; // in minutes
        $second_session_duration = ($school_end_time - $breakDuration) / 60; // in minutes

        $period_duration1 =  $second_session_duration / $noOfLecSesionTwo;

        // dd($period_duration1);


        // Calculate start and end time for each period in the second session
        $periods_second_session =  $periods_second_session_api = [];
        $current_time = $breakDuration;
        for ($i = 1; $i <= $noOfLecSesionTwo; $i++) {
            $period_start = date('h:i A', $current_time);
            $current_time += $period_duration1 * 60;
            $period_end = date('h:i A', $current_time);
            $periods_second_session[] = [
                'period_number' => $noOfLecSesionOne + $i,
                'start_time' => $period_start,
                'end_time' => $period_end
            ];

            $periods_second_session_api['Session 2'][] = [
                'period_number' => $noOfLecSesionOne + $i,
                'start_time' => $period_start,
                'end_time' => $period_end
            ]; 
        }

        // return [
        //     'first_session' => $periods_first_session,
        //     'Break' => $breakSetup,
        //     'second_session' => $periods_second_session
        // ];

        $session = array_merge($periods_first_session,$periods_second_session);
        $apiSession = array_merge($periods_first_session_api,$periods_second_session_api);

        $breakModule = $breakSetup;



        return ['session'=>$session,'breakModule'=>$breakModule,'apiSession'=>$apiSession];


}
}