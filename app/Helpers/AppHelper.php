<?php

namespace App\Helpers;
use Illuminate\Pagination\Paginator;

use Carbon\Carbon;
use App\User;
use App\Quote;
use App\Country;
use App\state;
use App\City;
use App\Project;
use App\Service;
use App\Technology;
use App\Contract;
use App\Proposal;
use App\TeamCategory;
use App\EmailTemplate;
use App\Role;
use App\Task;
use App\Setting;
use App\Invoice;
use App\Chat;
use App\Comment;
use App\Note;
use App\Ticket;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class AppHelper
{
  public static function users()
  {
    $users = User::all();
    return $users;
  }

  public static function getUserByID($id)
  {
    $user = User::findOrFail($id);
    return $user;
  }

  public static function customersLimits($no)
  {
    $customers = User::where('role_id', 2)->orderBy('created_at', 'desc')->limit($no)->get( );
    return $customers;
  }

  public static function customers()
  {
    $customers = User::where('role_id', 2)->orderBy('created_at', 'desc')->get();
    return $customers;
  }

  public static function projectManagers()
  {
    $managers = User::where('category_id', 1)->orderBy('created_at', 'desc')->get();
    return $managers;
  }

  public static function teamCategories()
  {
    $categories = TeamCategory::orderBy('name', 'asc')->get();
    return $categories;
  }

  public static function getTeamCategoryByID($id)
  {
    $category = TeamCategory::find($id);
    if($category){
      return $category->name;
    }
    return 0; 
  }

  public static function projects()
  {
    $projects = Project::orderBy('created_at', 'desc')->get();
    return $projects;
  }

  public static function projectSorting($n= 100)
  {
    $projects = Project::orderBy('status', 'desc')->limit($n)->get();
    return $projects;
  }

  public static function tasks()
  {
    $tasks = Task::all();
    if($tasks){
      return $tasks;
    }else{
      return 0;
    }
    
  }

  public static function lastTasks($no)
  {
    $tasks = Task::orderBy('status', 'asc')->limit($no)->get( );
    return $tasks;
  }

  public static function totalSales()
  {
    $paid = Invoice::where('status', 1)->get();
    $total = 0;
    if(count($paid) > 0){
      foreach ($paid as $key => $invoice) {
        $total = $total + $invoice->grand_total;
      }
    }
    return $total;
  }

  public static function invoices()
  {
    $invoices = Invoice::where('id','!=', null)->get();

    if(count($invoices) > 0){
      return $invoices;
    }
    return [];
  }

  public static function yearlyProfit()
  {
    $year = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    $invoices = Invoice::where('status', 1)->where('id','!=', null)->get();
    if(count($invoices) > 0){
      foreach ($invoices as $key => $invoice) {
        $date = $invoice->date;
        if($date){
          $date = Carbon::parse($date);
          if($invoice->grand_total){
            $year[$date->month - 1 ] = $year[$date->month - 1 ] + $invoice->grand_total;
          }
        }
      }
    }
    return $year;
  }

  public static function BestSeller()
  {
    $invoice = Invoice::where('status', 1)->orderBy('grand_total', 'desc')->limit(1)->get();
    if(count($invoice) > 0){
      return $invoice;
    }
  }

  public static function taskComments($id)
  {
    $task = Task::find($id);
    if($task){
      $comments = Comment::where('task_id', $id)->get();
      return $comments;
    }else{
      return 0;
    }
  }

  public static function totalInvoices()
  {
    $all = Invoice::where('id','!=', null)->get();
    $total = 0;
    if(count($all) > 0){
      foreach ($all as $key => $invoice) {
        $total = $total + $invoice->grand_total;
      }
    }
    return $total;
  }

  public static function projectEarnings($id)
  {
    $project = Project::findOrFail($id);
    if($project){
      $invoices = $project->invoices;
      $earning = 0;

      if(count($invoices) > 0){
        foreach ($invoices as $key => $invoice) {
          $total = $earning + $invoice->grand_total;
        }
      }
      
    }
    return $earning;
  }

  public static function team()
  {
    $users = User::where('role_id', 3)->get();
    return $users;
  }

  public static function contracts()
  {
    $quotes = Contract::orderBy('created_at', 'desc')->get();
    return $quotes;
  }

  public static function services()
  {
    $services = Service::orderBy('name')->get();
    return $services;
  }

  public static function technologies()
  {
    $technologies = Technology::orderBy('name')->get();
    return $technologies;
  }

  public static function quotes()
  {
    $quotes = Quote::orderBy('created_at', 'desc')->limit(5)->get();
    return $quotes;
  }

  public static function roles()
  {
    $roles = Role::orderBy('created_at', 'desc')->get();
    return $roles;
  }

  public static function PendingQuotes()
  {
    $pending = Quote::where('status', 1)->get();
    if($pending ){
      return $pending;
    }else{
      return 0;
    }
  }

  public static function PendingTickets()
  {
    $tickets = Ticket::where('status', 0)->where('ticket_id', 0)->get();
     
    if($tickets){
      return $tickets;
    }else{
      return 0;
    }
  }

  public static function sortedProjects($n = 500)
  {
    $projects = Project::where('status', '!=', 3)->orderBy('status', 'asc')->limit($n)->get();
    if($projects ){
      return $projects;
    }else{
      return 0;
    }
  }

  public static function teamMemberProjects($member_id)
  {
    $tasks = Task::where('id', '!=', null)->get();
    $tasks= json_decode($tasks, true);
    $projects_ids = [];

    if(count($tasks ) > 0){
      foreach ($tasks as $key => $task) {
        if (in_array($member_id, json_decode($task['team_members']))) {
          array_push($projects_ids, $task['project_id']); 
        }
      }
    }else{
      return [];
    }
    
    $projects = Project::whereIn('id', $projects_ids)->orderBy('status', 'desc');
    if($projects ){
      return $projects;
    }else{
      return [];
    }
    
  }

  public static function teamMembertasks($member_id)
  {
    $tasks = Task::where('id', '!=', null)->get();
    $tasks= json_decode($tasks, true);
    $tasks_ids = [];

    if(count($tasks ) > 0){
      foreach ($tasks as $key => $task) {
        if (in_array($member_id, json_decode($task['team_members']))) {
          array_push($tasks_ids, $task['id']); 
        }
      }
    }else{
      return [];
    }
    $tasks = Task::whereIn('id', $tasks_ids)->orderBy('status', 'desc')->get();
    return $tasks;
  }

  public static function projectTeam($project_id)
  {
    $project = Project::findOrFail($project_id);
    if($project ){
      $tasks= json_decode($project->tasks, true);
      $team_ids = [];
      if(count($tasks ) > 0){
        foreach ($tasks as $key => $task) {
          foreach(json_decode($task['team_members']) as $member){
            array_push($team_ids, $member); 
          }  
        }

      }else{
        return [];
      }
      $team = User::find($team_ids);
      return $team;
    }else{
      return [];
    }
  }
  public static function status()
  {
    $status = array(
        'all' => 'All',
        '0' => 'Pending',
        '1' => 'In Progress',
        '2' => 'Waiting Customer',
        '3' => 'Completed',
    );
    return $status;
  }


  public static function since($obj)
  {
      $time  = $obj;
      $now    = date('Y-m-d H:i:s');
      $dt = $time->diff($now);
      

      if(app()->getLocale()== 'en'){
        $number= '1';
        $unit = 'Second';
        if($dt->y > 0){
          $number = $dt->y;
          $unit = 'years';
          if($dt->y == 1){
            $unit = 'year';
          }
        }else if ($dt->m > 0){
          $number = $dt->m;
          $unit = "months";
          if($dt->m == 1){
            $unit = 'month';
          }
        }else if ($dt->d > 0){
          $number = $dt->d;
          $unit = "days";
          if($dt->d == 1){
            $unit = 'day';
          }
        }else if ($dt->h > 0){
          $number = $dt->h;
          $unit = "hours";
          if($dt->h == 1){
            $unit = 'hour';
          }
        }else if ($dt->i > 0){
          $number = $dt->i;
          $unit = "min";
          if($dt->i == 1){
            $unit = 'mins';
          }
        }else if ($dt->s > 0){
          $number = $dt->s;
          $unit = "second";
          if($dt->s == 1){
            $unit = 'seconds';
          }
        }
      }elseif(app()->getLocale()== 'ar'){
        $number= '1';
        $unit = 'ثانية';
        if($dt->y > 0){
          $number = $dt->y;
          $unit = 'سنة';
          if($dt->y == 1){
            $unit = 'سنة';
          }
          if($dt->y == 2){
            $unit = 'سنتين';
          }
          if(in_array($dt->y, [3,4,5,6,7,8,9,10]) ){
            $unit = 'سنوات';
          }
        }else if ($dt->m > 0){
          $number = $dt->m;
          $unit = "شهر";
          if($dt->m == 1){
            $unit = 'شهر';
          }
          if($dt->m == 2){
            $unit = 'شهرين';
          }
          if(in_array($dt->m, [3,4,5,6,7,8,9,10]) ){
            $unit = 'أشهر';
          }
        }else if ($dt->d > 0){
          $number = $dt->d;
          $unit = "يوم";
          if($dt->d == 1){
            $unit = 'يوم';
          }
          if($dt->d == 2){
            $unit = 'يومين';
          }
          if(in_array($dt->d, [3,4,5,6,7,8,9,10]) ){
            $unit = 'أيام';
          }
        }else if ($dt->h > 0){
          $number = $dt->h;
          $unit = "ساعة";
          if($dt->h == 1){
            $unit = 'ساعة';
          }
          if($dt->h == 2){
            $unit = 'ساعتين';
          }
          if(in_array($dt->h, [3,4,5,6,7,8,9,10]) ){
            $unit = 'ساعات';
          }
        }else if ($dt->i > 0){
          $number = $dt->i;
          $unit = "دقيقة";
          if($dt->i == 1){
            $unit = 'دقيقة';
          }
          if($dt->i == 2){
            $unit = 'دقيقتين';
          }
          if(in_array($dt->i, [3,4,5,6,7,8,9,10]) ){
            $unit = 'دقائق';
          }
        }else if ($dt->s > 0){
          $number = $dt->s;
          $unit = "ثانية";
          if($dt->s == 1){
            $unit = 'ثانية';
          }
          if($dt->s == 2){
            $unit = 'ثانيتين';
          }
          if(in_array($dt->s, [3,4,5,6,7,8,9,10]) ){
            $unit = 'ثوان';
          }
        }
      }

      $since = $number.' ' . $unit;
      return $since;
  }

    public static function privacy()
  {
    
    $privacy = array(
        '0' => 'Public',
        '1' => 'Friends',
        '2' => 'OnlyMe'
    );
    return $privacy;
  }

  public static function allow_comments()
  {
    $allow_comments = array(
        '0' => 'Allow',
        '1' => 'Prevent'
    );
    return $allow_comments;
  }

  public static function job_type()
  {
    if(app()->getLocale()== 'en'){
      $job_type = array(
        '0' => 'Full Time',
        '1' => 'Part Time',
        '2' => 'Freelancer',
      );
    }elseif(app()->getLocale()== 'ar'){
      $job_type = array(
        '0' => 'دوام كامل',
        '1' => 'نصف دوام',
        '2' => 'عمل عن بعد',
      );
    }
    return $job_type;
  }

  public static function postedDate()
  {
    if(app()->getLocale()== 'en'){
      $date = array(
          '0' => 'Last Hour',
          '1' => 'Last 24 hours',
          '2' => 'Last 7 days',
          '3' => 'Last 14 days',
          '4' => 'Last 30 days',
          '5' => 'Last 6 Months',
      );
    }elseif(app()->getLocale()== 'ar'){
      $date = array(
        '0' => 'خلال ساعة',
        '1' => 'خلال 24 ساعة',
        '2' => 'خلال 7 أيام',
        '3' => 'خلال 14 يوم',
        '4' => 'خلال 30 يوم',
        '5' => 'خلال 6 أشهر',
    );
    }
    return $date;
  }
  

  public static function skill()
  {
    $skills = array(
        '0' => 'Communication',
        '1' => 'Teamwork',
        '2' => 'Problem Solving',
        '3' => 'Learning',
        '4' => 'Self Management',
        '5' => 'Drive',
    );
    return $skills;
  }

  public static function skillByKey($key)
  {
    $name = '';
    $skills = Self::skill();

    foreach($skills as $k => $skill){
      if($key == $k){
        return $skill;
      }
    }
  }

  public static function experience()
  {
    if(app()->getLocale()== 'en'){
      $experience = array(
        '0' => '1 Year',
        '1' => '2 Years',
        '2' => '3 Years',
        '3' => '4 Years',
        '4' => '5 Years',
        '5' => '6 Years',
        '6' => '7 Years',
        '7' => '8 Years',
        '8' => '9 Years',
        '9' => '10 Years & more',
    );
    }elseif(app()->getLocale()== 'ar'){
      $experience = array(
        '0' => 'سنة',
        '1' => 'سنتان',
        '2' => '3 سنوات',
        '3' => '4 سنوات',
        '4' => '5 سنوات',
        '5' => '6 سنوات',
        '6' => '7 سنوات',
        '7' => '8 سنوات',
        '8' => '9 سنوات',
        '9' => '10 سنوات وأكثر',
    );
    }
    
    return $experience;
  }

  public static function getExperience($key)
  {
    
    if(app()->getLocale()== 'en'){
      $experience = array(
        '0' => '1 Year',
        '1' => '2 Years',
        '2' => '3 Years',
        '3' => '4 Years',
        '4' => '5 Years',
        '5' => '6 Years',
        '6' => '7 Years',
        '7' => '8 Years',
        '8' => '9 Years',
        '9' => '10 Years & more',
      );
    }elseif(app()->getLocale()== 'ar'){
      $experience = array(
        '0' => 'سنة',
        '1' => 'سنتان',
        '2' => '3 سنوات',
        '3' => '4 سنوات',
        '4' => '5 سنوات',
        '5' => '6 سنوات',
        '6' => '7 سنوات',
        '7' => '8 سنوات',
        '8' => '9 سنوات',
        '9' => '10 سنوات وأكثر',
      );
    }
    foreach ($experience as $k => $value) {
      if($key == $k){
        return $value;
      }
    }
  }
  public static function experienceRange()
  {
    if(app()->getLocale()== 'en'){
      $experience = array(
        '1' => '1 Year - 3 Years',
        '2' => '4 Years - 6 Years',
        '3' => '7 Years - 10 years',
        '4' => '10 Years & more',
    );
    }elseif(app()->getLocale()== 'ar'){
      $experience = array(
        '1' => 'سنة - 3 سنوات',
        '2' => '4 سنوات - 6 سنوات',
        '3' => '7 سنوات - عشر سنوات',
        '4' => 'عشر سنوات وأكثر',
    );
    }
    
    return $experience;
  }

  public static function salaryRange()
  {
    if(app()->getLocale()== 'en'){
      $range = array(
        '0' => 'SAR 1000 - SAR 1500',
        '1' => 'SAR 1500 - SAR 2000',
        '2' => 'SAR 2000 - SAR 2500',
        '3' => 'SAR 2500 - SAR 3000',
        '4' => 'SAR 3000 - SAR 3500',
        '5' => 'SAR 3500 - SAR 4000',
        '6' => 'SAR 4000 - SAR 4500',
        '7' => 'SAR 4500 - SAR 5000',
        '8' => 'SAR 5000 - SAR 6000',
        '9' => 'SAR 6000 & more',
      );
    }elseif(app()->getLocale()== 'ar'){
      $range = array(
        '0' => '1000 ريال - 1500 ريال',
        '1' => '1500 ريال - 2000 ريال',
        '2' => '2000 ريال - 2500 ريال',
        '3' => '2500 ريال - 3000 ريال',
        '4' => '3000 ريال - 3500 ريال',
        '5' => '3500 ريال - 4000 ريال',
        '6' => '4000 ريال - 4500 ريال',
        '7' => '4500 ريال - 5000 ريال',
        '8' => '5000 ريال - 6000 ريال',
        '9' => '6000 ريال وأكثر',
      );
    }
    return $range;
  }

  public static function minimalSalary()
  {
    if(app()->getLocale()== 'en'){
      $salary = array(
        '0' => 'Choose',
        '1' => 'SAR 1000',
        '2' => 'SAR 1500',
        '3' => 'SAR 2000',
        '4' => 'SAR 2500',
        '5' => 'SAR 3000',
        '6' => 'SAR 3500',
        '7' => 'SAR 4000',
        '8' => 'SAR 4500',
        '9' => 'SAR 5000',
        '10' => 'SAR 6000 & more',
    );
    }elseif(app()->getLocale()== 'ar'){
      $salary = array(
        '0' => 'إختر',
        '1' => '1000 ريال',
        '2' => '1500 ريال',
        '3' => '2000 ريال',
        '4' => '2500 ريال',
        '5' => '3000 ريال',
        '6' => '3500 ريال',
        '7' => '4000 ريال',
        '8' => '4500 ريال',
        '9' => '5000 ريال',
        '10' => '6000 ريال وأكثر',
    );
    }
    
    return $salary;
  }

  public static function getVat()
  {
    $vat = Setting::orderBy('updated_at', 'desc')->first()->vat;

    if($vat ){
      return $vat;
    }
  }

  public static function getSalaryRange($key)
  {
    
    if(app()->getLocale()== 'en'){
      $range = array(
        '0' => 'SAR 1000 - SAR 1500',
        '1' => 'SAR 1500 - SAR 2000',
        '2' => 'SAR 2000 - SAR 2500',
        '3' => 'SAR 2500 - SAR 3000',
        '4' => 'SAR 3000 - SAR 3500',
        '5' => 'SAR 3500 - SAR 4000',
        '6' => 'SAR 4000 - SAR 4500',
        '7' => 'SAR 4500 - SAR 5000',
        '8' => 'SAR 5000 - SAR 6000',
        '9' => 'SAR 6000 & more',
    );
    }elseif(app()->getLocale()== 'ar'){
      $range = array(
        '0' => '1000 ريال - 1500 ريال',
        '1' => '1500 ريال - 2000 ريال',
        '2' => '2000 ريال - 2500 ريال',
        '3' => '2500 ريال - 3000 ريال',
        '4' => '3000 ريال - 3500 ريال',
        '5' => '3500 ريال - 4000 ريال',
        '6' => '4000 ريال - 4500 ريال',
        '7' => '4500 ريال - 5000 ريال',
        '8' => '5000 ريال - 6000 ريال',
        '9' => '6000 ريال وأكثر',
      );
    }
    foreach ($range as $k => $value) {
      if($key == $k){
        return $value;
      }
    }
  }

  public static function legal()
  {
    if(app()->getLocale()== 'en'){
      $range = array(
        '0' => 'Have a Residence',
        '1' => 'Guaranteeing transfer',
        '2' => 'New',
    );
    }elseif(app()->getLocale()== 'ar'){
      $range = array(
        '0' => 'مقيم',
        '1' => 'نقل كفالة',
        '2' => 'جديد',
      );
    }
    return $range;
  }


  public static function educationalLevel()
  {
    if(app()->getLocale()== 'en'){
      $level = array(
        '0' => 'Bechlores Degree ',
        '1' => 'High School',
        '2' => 'vocational',
        '3' => 'Diploma',
      );
    }elseif(app()->getLocale()== 'ar'){
      $level = array(
        '0' => 'بكالريوس',
        '1' => 'ثانوية',
        '2' => 'تدريب ',
        '3' => 'دبلوم',
      );
    }
    
    return $level;
  }

  public static function educationaGrade()
  {

    $grade = array(
      '0' => 'Excellent (85% - 100%)',
      '1' => 'Very Good (75% - 85%)',
      '2' => 'Good  (65% - 75%)',
      '3' => 'Fair (50% - 65%)',
      '4' => 'Not specified',
    );
    return $grade;
  }

  public static function skillType()
  {
    $grade = array(
      '0' => 'Soft Skills',
      '1' => 'Technical',
    );
    return $grade;
  }

  public static function gender()
  {
    if(app()->getLocale()== 'en'){
      $gender = array(
        '1' => 'Male', 
        '2' => 'Female', 
    );
    }elseif(app()->getLocale()== 'ar'){
      $gender = array(
        '1' => 'ذكر', 
        '2' => 'أنثى', 
    );
    }
    
    return $gender;
  }
  public static function CheckGender($g)
  {
    if(app()->getLocale()== 'en'){
      $gender = array(
        '1' => 'Male', 
        '2' => 'Female', 
    );
    }elseif(app()->getLocale()== 'ar'){
      $gender = array(
        '1' => 'ذكر', 
        '2' => 'أنثى', 
    );
    }
    foreach ($gender as $key => $gen) {
      if($key == $g){
      return $gen;
      }
    }
  }


  public static function married()
  {
    if(app()->getLocale()== 'en'){
      $married = array(
        '1' => 'Single', 
        '2' => 'Married',  
    );
    }elseif(app()->getLocale()== 'ar'){
      $married = array(
        '1' => 'أعزب', 
        '2' => 'متزوج',  
    );
    }
    return $married;
  }

  public static function languageLevel()
  {
    if(app()->getLocale()== 'en'){
      $levels = array(
        '0' => 'Beginner',
        '1' => 'Intermediate',  
        '2' => 'Advanced',
        '3' => 'Fluent', 
        '4' => 'Native', 
    );
    }elseif(app()->getLocale()== 'ar'){
      $levels = array(
        '0' => 'مبتدأ',
        '1' => 'متوسط',  
        '2' => 'متقدم',
        '3' => 'أتحدث بطلاقة', 
        '4' => 'اللغة الأم', 
    );
    }
    return $levels;
  }

  public static function rating()
  {
    if(app()->getLocale()== 'en'){
      $rating = array(
        '0' => 'Very Bad',
        '1' => 'Bad',
        '2' => 'Not Bad',
        '3' => 'Good',
        '4' => 'Excllent',
    );
    }elseif(app()->getLocale()== 'ar'){
      $rating = array(
        '0' => 'سئ جدا',
        '1' => 'مقبول',
        '2' => 'جيد',
        '3' => 'جيد جدا',
        '4' => 'ممتاز',
    );
    }
    return $rating;
  }

  public static function religions()
  {
    if(app()->getLocale()== 'en'){
      $religion = array(
        '1' => 'Muslim',
        '2' => 'Christian',
        '3' => 'Other',
    );
    }elseif(app()->getLocale()== 'ar'){
      $religion = array(
        '1' => 'مسلم',
        '2' => 'مسيحي',
        '3' => 'غير ذلك',
    );
    }
    return $religion;
  }

  public static function religionByKey($key){
    $religions = [];

    foreach (Self::religions() as $ckey => $name) {
      if($key == $ckey){
        array_push($religions, $name);
      }
    }
    foreach ($religions as $key => $name) {
      return $name;
    }
  }

  public static function ratingByKey($key)
  {
    $name = '';
    $ratings = Self::rating();

    foreach($ratings as $k => $rating){
      if($key == $k){
        return $rating;
      }
    }
  }

  public static function sorting()
  {
    if(app()->getLocale()== 'en'){
      $sorting = array(
        '0' => 'Nothing',
        '1' => 'Name',
        '2' => 'Experience',
        '3' => 'Low Salary',
        '4' => 'Height Salary',
      );
    }elseif(app()->getLocale()== 'ar'){
      $sorting = array(
        '0' => 'ترتيب',
        '1' => 'الإسم',
        '2' => 'سنوات الخبرة',
        '3' => 'أقل راتب',
        '4' => 'أعلى راتب',
      );
    }
    return $sorting;
  }

  public static function countries()
  {
    $countries_keys = [];
    $countries_names = [];

    $countries = Country::orderBy('name', 'asc')->get();
    $countries_array = json_decode($countries, true);

    $countries_ar_path =  base_path().'/resources/views/pockets/countries_ar.json';
    $countries_ar_array = json_decode(file_get_contents($countries_ar_path));
    //Countries Keys Array
    foreach($countries_array as $key => $country){
      foreach ($countries_ar_array as $k => $country_ar) {
        if (strtoupper($country['code']) == $k ) {
          if(app()->getLocale() == 'ar'){
            array_push($countries_keys, $k);
            array_push($countries_names, $country_ar);
          }else{
            array_push($countries_keys, strtoupper($country['code']));
            array_push($countries_names, $country['name']);
          }
        }
      }
    }
    $countries = array_combine($countries_keys, $countries_names);
    asort($countries);
    
    return $countries;
  }

  public static function gulfCountries()
  {
    $countries_keys = [];
    $countries_names = [];
    $gulf_countries = array(
      'SA' => 'Saudi Arabia', 
      'AE' => 'United Arab Emirates', 
      'OM' => 'Oman', 
      'KW' => 'Kuwait', 
      'QA' => 'Qatar', 
      'BH' => 'Bahrain'
    );

    // $countries = Country::orderBy('name', 'asc')->get();
    // $countries_array = json_decode($countries, true);

    // $countries_ar_path =  base_path().'/resources/views/pockets/countries_ar.json';
    // $countries_ar_array = json_decode(file_get_contents($countries_ar_path));
    // //Countries Keys Array
    // foreach($countries_array as $key => $country){
    //   foreach ($countries_ar_array as $k => $country_ar) {
    //     if (strtoupper($country['code']) == $k ) {
    //       if(in_array($k,$gulf_countries )){
    //         if(app()->getLocale() == 'ar'){
    //           array_push($countries_keys, $k);
    //           array_push($countries_names, $country_ar);
    //         }else{
    //           array_push($countries_keys, strtoupper($country['code']));
    //           array_push($countries_names, $country['name']);
    //         }
    //       }
    //     }
    //   }
    // }
    // $countries = array_combine($countries_keys, $countries_names);
      
    return $gulf_countries;
  }

  public static function countriesID()
  {
    $countries = Country::orderBy('name', 'asc');
    $countries = (array) $countries->pluck('name', 'id');
    $countries = array_shift($countries);
    
    return $countries;
  }

  

  public static function states()
  {
    $states = State::orderBy('name', 'asc');
    $states = (array) $states->pluck('name', 'id');
    $states = array_shift($states);
    
    return $states;
  }

  public static function cities()
  {
    $cities = City::orderBy('name', 'asc')->get();
    $cities = (array) $cities->pluck('name', 'id');
    $cities = array_shift($cities);
    
    return $cities;
  }

  

  /*public static function countries()
  {
    $countries = [];
    $countries_keys = [];
    $countries_names = [];
    $countries_path =  base_path().'/resources/views/pockets/countries.json';
    $countries_array = json_decode(file_get_contents($countries_path), true);

    //Countries Keys Array
    foreach($countries_array as $key => $country){
      array_push($countries_keys, $key);
    }
    //Countries Names Array
    foreach($countries_array as $key => $country){
      array_push($countries_names, $country['name']);
    }

    $countries = array_combine($countries_keys, $countries_names);
    asort($countries);
    return $countries;
  }*/

  public static function saudiBanks()
  {
      $banks = array(
        '1' => 'The National Commercial Bank',
        '2' => 'The Saudi British Bank',
        '3' => 'Banque Saudi Fransi',
        '4' => 'alawwal bank',
        '5' => 'Saudi Investment Bank',
        '6' => 'Arab National Bank',
        '7' => 'Bank AlBilad',
        '8' => 'Bank AlJazira',
        '9' => 'Riyad Bank',
        '10' => 'Samba Financial Group (Samba)',
        '11' => 'Al Rajhi Bank',
        '12' => 'Alinma bank',
        '13' => 'Gulf International Bank Saudi Aribia (GIB-SA)',
      );
    return $banks;
  }

  public static function priority()
  {
      $banks = array(
        '1' => 'Urgent',
        '2' => 'Important',
        '3' => 'Normal',
        '4' => 'Low',
      );
    return $banks;
  }

  
  public static function nationalities()
  {
    $nationalities = [];
    $nationalities_keys = [];
    $nationalities_names = [];
    $nationalities_ar_names = [];
    $nationalities_path =  base_path().'/resources/views/pockets/nationalities.json';
    $nationalities_array = json_decode(file_get_contents($nationalities_path), true);

    $nationalities_ar_path =  base_path().'/resources/views/pockets/nationalities_ar.json';
    $nationalities_ar_array = json_decode(file_get_contents($nationalities_ar_path), true);

    //Countries Names Array
    foreach($nationalities_array as $key => $nationality){
      foreach ($nationalities_ar_array as $k => $value) {
        if ($k == $nationality['nationality']) {
          if (app()->getLocale() == 'ar') {
            array_push($nationalities_keys, $nationality['alpha_2_code']);
            array_push($nationalities_names, $value);
          }else{
            array_push($nationalities_keys, $nationality['alpha_2_code']);
            array_push($nationalities_names, $nationality['nationality']);
          }
        }
      }
    }
    $nationalities = array_combine($nationalities_keys, $nationalities_names);
    asort($nationalities);
    return $nationalities;
  }


  public static function nationalityByKey($key)
  {
    $name = '';
    $nationalities = Self::nationalities();

    foreach($nationalities as $k => $nationality){
      if($key == $k){
        return $nationality;
      }
    }
  }

  public static function hashString($string)
  {
    $string = str_replace(' ', '', $string);
    $string = $string[0]. '***'. substr($string, -1);
    $string = utf8_encode($string);
  //   dd($string);
    return $string;
  } 

  public static function languages()
  {
    $languages = [];
    $languages_keys = [];
    $languages_names = [];
    $languages_path =  base_path().'/resources/views/pockets/languages.json';
    $languages_array = json_decode(file_get_contents($languages_path), true);

    $languages_ar_path =  base_path().'/resources/views/pockets/languages_ar.json';
    $languages_ar_array = json_decode(file_get_contents($languages_ar_path), true);

    //Countries Keys Array
    foreach($languages_array as $key => $language){

      foreach($languages_ar_array as $k => $l){
        if ($l['code'] == $key ) {
          if(app()->getLocale() == 'ar'){
            array_push($languages_keys, $key);
            array_push($languages_names, $l['ar_name']);
          }else{
            array_push($languages_keys, $key);
            array_push($languages_names, $language['name']);
          }
        }
      }
    }

    $languages = array_combine($languages_keys, $languages_names);
    asort($languages);
    return $languages;
  }

  public static function languageByKey($key)
  {
    $name = '';
    $languages = Self::languages();

    foreach($languages as $k => $language){
      if($key == $k){
        return $language;
      }
    }
  }

  public static function getAge($birth)
  {
      return Carbon::parse($birth)->diff(Carbon::now())->format('%y years');
  }

  public static function getCountryByKey($key){
    $countries = Self::countries();
    if ($key) {
      foreach ($countries as $keyc => $country) {
        if($keyc == $key){
          return $country;
        }
      }
    }else{
      return 'Saudi Arabia';
    }
  }

  public static function getCountryByID($id){
    $countries = Self::countries();
    if (!empty($id)) {
      foreach ($countries as $keyc => $country) {
        if($keyc == $id){
          return $country;
        }
      }
    }else{
      return 'Saudi Arabia';
    }
    
  }

  public static function countryCodes()
  {
    $countries = [];
    $countries_keys = [];
    $countries_names = [];
    $countries_path =  base_path().'/resources/views/pockets/countries.json';
    $countries_array = json_decode(file_get_contents($countries_path), true);

    $countries_ar_path =  base_path().'/resources/views/pockets/countries_ar.json';
    $countries_ar_array = json_decode(file_get_contents($countries_ar_path));

    //Countries Keys Array
    foreach($countries_array as $key => $country){
      foreach ($countries_ar_array as $k => $country_ar) {
        if ($key == $k ) {
          if(app()->getLocale() == 'ar'){
            array_push($countries_keys, $country['phone']);
            array_push($countries_names, $country_ar);
          }else{
            array_push($countries_keys, $country['phone']);
            array_push($countries_names, $country['name']);
          }
        }
      }
    }
    $countries_codes = array_combine($countries_keys, $countries_names);
    asort($countries_codes);


    return $countries_codes;
  }
  

  public static function getCityByID($id){
    $city = City::where('id', $id)->first();
    if($city){
      if (app()->getLocale() == 'ar') {
        if ($city->name_ar) {
          return $city->name_ar;
        }else{
          return $city->name;
        }
      }else{
          return $city->name;
      }
    }
  }

  public static function getNationalityByKey($key){
    $nationality = [];

    foreach (Self::nationalities() as $ckey => $name) {
      if($key == $ckey){
        array_push($nationality, $name);
      }
    }
    foreach ($nationality as $key => $name) {
      return $name;
    }
  }

  public static function currency()
  {
    $cuurency =  base_path().'/resources/views/pockets/currency.json';
    $cuurency = json_decode(file_get_contents($cuurency), true);
    return $cuurency;
  }

  public static function phone_prefix()
  {
    $phone_prefixes =  base_path().'/resources/views/pockets/phone_prefix.json';
    $phone_prefixes = json_decode(file_get_contents($phone_prefixes), true);
    return $phone_prefixes;
  }

  public static function flags()
  {
    $flags =  file_get_contents(base_path().'/resources/views/pockets/flags.php');
    return $flags;
  }

  public static function MDI()
  {
    $icons = [];
    $icons_names = [];
    $icons_shapes= [];
    $icons_path =  base_path().'/resources/views/pockets/mdi.json';
    $icons_array = json_decode(file_get_contents($icons_path), true);

    
    //Icons Names Array
    foreach($icons_array as $key => $icon){
      array_push($icons_names, $icon['name']);
    }

    //Icons Shapes Array
    foreach($icons_array as $key => $icon){
      array_push($icons_shapes, '<i class="mdi mdi-'.$icon['name'].'"></i>');
    }

    $icons = array_combine($icons_names, $icons_shapes);
    return $icons;
  }

  public static function fontAwesome()
  {
    $icons = [];
    $icons_path =  base_path().'/resources/views/pockets/fontawesome.json';
    $icons_array = json_decode(file_get_contents($icons_path), true);
    
    foreach($icons_array as $key => $icon){
      foreach($icon['icons'] as $k => $i){
        array_push($icons, $i);
      }
    }

    return array_unique($icons);
  }

  public static function getMonthNameYear($date)
  {
    return date('F, Y', strtotime($date)); //June, 2017
  }


  public static function operatingHours()
  {
    if(app()->getLocale()== 'en'){
      $hours = array(
        '1' => '1 AM',
        '2' => '2 AM',
        '3' => '3 AM',
        '4' => '4 AM',
        '5' => '5 AM',
        '6' => '6 AM',
        '7' => '7 AM',
        '8' => '8 AM',
        '9' => '9 AM',
        '10' => '10 AM',
        '11' => '11 AM',
        '12' => '12 AM',
        '13' => '1 PM',
        '14' => '2 PM',
        '15' => '3 PM',
        '16' => '4 PM',
        '17' => '5 PM',
        '18' => '6 PM',
        '19' => '7 PM',
        '20' => '8 PM',
        '21' => '9 PM',
        '22' => '10 PM',
        '23' => '11 PM',
        '24' => '12 PM',
      );
    }elseif(app()->getLocale()== 'ar'){
      $hours = array(
        '1' => '1 صباحاً',
        '2' => '2 صباحاً',
        '3' => '3 صباحاً',
        '4' => '4 صباحاً',
        '5' => '5 صباحاً',
        '6' => '6 صباحاً',
        '7' => '7 صباحاً',
        '8' => '8 صباحاً',
        '9' => '9 صباحاً',
        '10' => '10 صباحاً',
        '11' => '11 صباحاً',
        '12' => '12 صباحاً',
        '13' => '1 مساءَ',
        '14' => '2 مساءَ',
        '15' => '3 مساءَ',
        '16' => '4 مساءَ',
        '17' => '5 مساءَ',
        '18' => '6 مساءَ',
        '19' => '7 مساءَ',
        '20' => '8 مساءَ',
        '21' => '9 مساءَ',
        '22' => '10 مساءَ',
        '23' => '11 مساءَ',
        '24' => '12 مساءَ',
      );
    }
    return $hours;
  }
  
  public static function operatingHoursCheck($h)
  {
    
    foreach (Self::operatingHours() as $key => $value) {
      if($key == $h){
      return $value;
      }
    }
  }

  //EMAIL SEND 
  public static function send_email($to='',$subject='',$message='',$from='',$fromname=''){
  try { 
      $mail = new PHPMailer();
      $mail->isSMTP(); 
      $mail->CharSet = "utf-8"; 
      $mail->SMTPAuth = true;
      $mail->Host = "mail.ccit.sa";
      //$mail->Port =587;
      $mail->Port =465;
      $mail->SMTPSecure = 'ssl';
      //$mail->SMTPSecure = 'tls';   
      $mail->Username = "sales@ccit.sa";
      $mail->Password = "";

      if($from!='')
      $mail->From = $from;
        else
      $mail->From = 'sales@ccit.sa';
    
      if($fromname!='')
      $mail->FromName = $fromname;
        else
      $mail->FromName = 'CCIT';
      if(is_array($to)){
        foreach($to as $to_add){
          $mail->AddAddress($to_add);                // name is optional
        }
      }else{
        $mail->AddAddress($to);
      }
      //$mail->AddAddress($to);
      $mail->IsHTML(true);
      $mail->Subject = $subject;
      $mail->Body = $message;
      $mail->SMTPOptions= array(
      'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
      )
      );

      $mail->send();
      dd($mail->send());
      return true ;
    }catch (phpmailerException $e) {
        dd($e);
    } catch (Exception $e) {
        dd($e);
    }
    return false ;
  }

  
    public static function getToken()
  {
      $length =20;
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); 

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[rand(0, $max-1)];
        }

        return $token;
  }

  public static function emailtemplates()
  {
    $emailtemplates = EmailTemplate::all();
    return $emailtemplates;
  }
  
  
  public static function getProjectTechnology($ids)
  {
    $technologies_id= [];
    if($ids){
      foreach (json_decode($ids) as $key => $id) {
        $tech = Technology::where('name', $id)->first();
        array_push($technologies_id , $tech->id );
      }
      $technologies = Technology::find($technologies_id);
      if (count($technologies) > 0) {
        return $technologies;
      }
    }else{
      return [];
    }
    
  } 

  /*public static function emoji()
  {
    $emoji=  base_path().'/resources/views/pockets/emoji.json';
    $emoji = json_decode(file_get_contents($emoji), true);
    $emoji = new Paginator($emoji, 77);
    return $emoji;
  }*/
  
  public static function QuoteDocsCheck($docs)
  {
      $file= base_path(). '/uploads/files/quotes/'. $docs;

      $headers = array(
          'Content-Type: application/pdf',
          'Content-Type: image/png',
          'Content-Type: image/jpg'
      );
      if($docs){
        if (file_exists($file)) {
            return true;
        }else{
            return false;
        }
      }else{
        false;
      }
  }

  public static function FileExists($file, $dir)
  {
      $path_file = base_path(). '/' . $dir . '/' .$file;
      
      if($file){
        if (file_exists($path_file)) {
            return 1;
            
        }else{
            return 0;
        }
      }else{
        0;
      }
  }

  public static function avatarCheck($avatar)
  {
      $file = base_path(). '/uploads/images/avatars/'. $avatar;
      $headers = array(
          'Content-Type: application/pdf',
          'Content-Type: image/png',
          'Content-Type: image/jpg'
      );
      if($avatar){
        if (file_exists($file)) {
          return true;
        }else{
          return false;
        }
      }else{
        return false;
      }
  }
  
  public static function packageReqCheck($id)
  {
      $requested = PricingRequest::where('package_id', $id)->whereIn('role', [3,4])->where('state', 0)->first();
      if($requested){
            return true;
      }else{
        return false;
      }  
  }

  public static function quantity()
  {
      $quantity = array(
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
        '10' => '10',
      );
      return $quantity ;
  }

  public static function projectFeatures()
  {
    
      $features = array(
        '1' => 'E-Commerce',
        '2' => 'Mobile Application (Android - IOS)',
        '3' => 'Custom Web System',
        '4' => 'Payment System',
        '5' => 'Website',
        '6' => 'Development & Operations',
        '7' => 'Technical Consultation',
      );
      return $features ;
  }

  public static function ticketCategories()
  {
      $cats = array(
        '1' => 'Technical Support',
        '2' => 'Financial Accounts',
        '3' => 'Sales',
        '4' => 'Complaints and suggestions'
      );
      return $cats ;
  }

  public static function ticketStatus()
  {
      $cats = array(
        '0' => 'New',
        '1' => 'Processed',
        '2' => 'Replied',
        '3' => 'Closed'
      );
      return $cats ;
  }

  public static function projectFeaturesAR()
  {
      $features = array(
        '1' => 'متجر الكتروني',
        '2' => 'تطبيقات ذكية للهواتف (IOS – ANDROID)',
        '3' => 'برمجة نظام ويب',
        '4' => 'دفع الكتروني ',
        '5' => 'موقع الكتروني',
        '6' => 'عمليات تطوير وتشغيل',
        '7' => 'استشارة تقنية',
      );
      return $features ;
    }
    
}
