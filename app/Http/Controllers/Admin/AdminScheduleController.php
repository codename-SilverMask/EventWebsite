<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\ScheduleDay;

class AdminScheduleController extends Controller
{
    public function index(){
        $schedules = Schedule::with('schedule_day')->orderBy('item_order','asc')->get();
        return view('admin.schedule.index' , compact('schedules'));
    }
    public function create(){
       $schedule_days = ScheduleDay::orderBy('order1','asc')->get();
        return view('admin.schedule.create' , compact('schedule_days'));
        
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'time' => 'required',
            'item_order' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           
        ]);

        $final_name = 'schedule_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);

        $schedule = new Schedule();
        $schedule->schedule_day_id = $request->schedule_day_id;
        $schedule->name = $request->name;
        $schedule->title = $request->title;
        $schedule->description = $request->description;
        $schedule->location = $request->location;
        $schedule->time = $request->time;
        $schedule->photo = $final_name;
        $schedule->item_order = $request->item_order;
        $schedule->save();

        return redirect()->route('admin_schedule_index')->with('success','Schedule added successfully');


               
        
    }
    public function edit($id){
        $schedule_days = ScheduleDay::orderBy('order1','asc')->get();
        $schedule = Schedule::where('id',$id)->first();
        return view('admin.schedule.edit' , compact('schedule' ,'schedule_days'));
        
    }
    public function update(Request $request, $id){
        $schedule = Schedule::where('id',$id)->first();
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'time' => 'required',
            'item_order' => 'required',
        ]);
        if($request->photo) {
            $request->validate([
                'photo' => ['mimes:jpg,jpeg,png,gif','max:2024'],
            ]);
            if($schedule->photo != '') {
                unlink(public_path('uploads/'.$schedule->photo));
                
                $final_name = '$schedule_'.time().'.'.$request->photo->extension();
                $request->photo->move(public_path('uploads'), $final_name);
                $schedule->photo = $final_name; 
            }
        }
        $schedule->schedule_day_id = $request->schedule_day_id;
        $schedule->name = $request->name;
        $schedule->title = $request->title;
        $schedule->description = $request->description;
        $schedule->location = $request->location;
        $schedule->time = $request->time;
        $schedule->photo = $final_name;
        $schedule->item_order = $request->item_order;
        $schedule->save();
        return redirect()->route('admin_schedule_index')->with('success','Schedule updated successfully');

        
    }
    public function delete($id){
       
        $schedule = Schedule::where('id',$id)->first();
        if($schedule->photo != '') {
            unlink(public_path('uploads/'.$schedule->photo));
        }
        $schedule->delete();
        return redirect()->route('admin_schedule_index')->with('success','Schedule deleted successfully');
        
    }
   
}
