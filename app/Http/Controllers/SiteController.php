<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Group;
use App\Models\Payment;
use App\Models\Teacher;
use App\Models\TotalPayment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SiteController extends Controller
{
 public function index(){
     $currentMonthStart = Carbon::now()->startOfMonth();
     $currentMonthEnd = Carbon::now()->endOfMonth();

     $newUsersCount = User::whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->count();
     $newTeacherCount = Teacher::whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->count();
     $newCourseCount = Course::whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->count();

//
     // Calculate total price in Payment table
     $totalPrice = Payment::sum('money') + Payment::sum('extra_amount');

     // Calculate total payments made
     $totalPayments = TotalPayment::sum('pay');
        $totalAdd = TotalPayment::sum('add');
     if($totalPayments === null){
         $result = $totalPrice;
     } else {
         $result = $totalPrice - $totalPayments + $totalAdd;
     }

     // Use the $result variable as needed
     $totalUsers = User::count();
     $totalTeachers = Teacher::count();
     $totalCourses = Course::count();
// Chart
     $payments = Payment::orderBy('created_at')->get();

     $monthlyPayments = $payments->groupBy(function ($payment) {
         return $payment->created_at->format('Y-m');
     })->sortBy(function ($group, $key) {
         return $key;
     })->map(function ($group) {
         return $group->sum('money');
     });
//Chart
     $users = User::orderBy('created_at')->get();

     $monthlyUserCounts = $users->groupBy(function ($user) {
         return $user->created_at->format('Y-m');
     })->sortBy(function ($group, $key) {
         return $key;
     })->map(function ($group) {
         return $group->count();
     });
     return view('crm.index' , [
         'totalPayment' => $result,
         'current' => $newUsersCount,
         'totalUsers' => $totalUsers,
         'totalTeachers' => $totalTeachers,
         'newTeacher' => $newTeacherCount,
         'totalCourses' => $totalCourses,
         'newCourse' => $newCourseCount,
         'monthlyPayments' => $monthlyPayments,
         'monthlyUserCounts' => $monthlyUserCounts,
         'totals' => TotalPayment::latest()->get(),
     ]);
 }
    public function chart(){
        $payments = Payment::orderBy('created_at')->get();
        $totalUsers = User::count();
        $totalTeacher = Teacher::count();

//1 payment
        $monthlyPayments = $payments->groupBy(function ($payment) {
            return $payment->created_at->format('Y-m');
        })->sortBy(function ($group, $key) {
            return $key;
        })->map(function ($group) {
            return $group->sum('money');
        });
//        2 user
        $users = User::orderBy('created_at')->get();

        $monthlyUserCounts = $users->groupBy(function ($user) {
            return $user->created_at->format('Y-m');
        })->sortBy(function ($group, $key) {
            return $key;
        })->map(function ($group) {
            return $group->count();
        });
//        3 Teacher
        $teacher = Teacher::orderBy('created_at')->get();

        $monthlyTeacherCounts = $teacher->groupBy(function ($teacher) {
            return $teacher->created_at->format('Y-m');
        })->sortBy(function ($group, $key) {
            return $key;
        })->map(function ($group) {
            return $group->count();
        });
//   4     Group
        $group = Group::orderBy('created_at')->get();

        $monthlyGroupCounts = $group->groupBy(function ($group) {
            return $group->created_at->format('Y-m');
        })->sortBy(function ($group, $key) {
            return $key;
        })->map(function ($group) {
            return $group->count();
        });
//      5  Course
        $course = Course::orderBy('created_at')->get();

        $monthlyCourseCounts = $course->groupBy(function ($course) {
            return $course->created_at->format('Y-m');
        })->sortBy(function ($group, $key) {
            return $key;
        })->map(function ($group) {
            return $group->count();
        });
//        6 Bonus
        $monthlyBonus = $payments->groupBy(function ($payment) {
            return $payment->created_at->format('Y-m');
        })->sortBy(function ($group, $key) {
            return $key;
        })->map(function ($group) {
            return $group->sum('bonus');
        });
//        7 Extra Pay
        $extra = TotalPayment::orderBy('created_at')->get();


        $monthlyExtraCounts = $extra->groupBy(function ($extra) {
            return $extra->created_at->format('Y-m');
        })->sortBy(function ($group, $key) {
            return $key;
        })->map(function ($group) {
            return $group->sum('add');
        });
     return view('crm.chart.index' , [
         'monthlyPayments' => $monthlyPayments,
         'monthlyUserCounts' => $monthlyUserCounts,
         'monthlyTeacherCounts' => $monthlyTeacherCounts,
         'monthlyGroupCounts' => $monthlyGroupCounts,
         'monthlyCourseCounts'=>  $monthlyCourseCounts,
         'monthlyBonus'=>  $monthlyBonus,
         'monthlyExtraCounts' => $monthlyExtraCounts

     ]);
    }
    public function ipayment()
    {
        $payments = Payment::orderBy('created_at')->get();
        $extra = TotalPayment::orderBy('created_at')->get();

        $monthlyBonuses = $payments->groupBy(function ($payment) {
            return $payment->created_at->format('Y-m');
        })->map(function ($group) {
            return $group->sum('bonus');
        });
        $monthlyPayment = $payments->groupBy(function ($payment) {
            return $payment->created_at->format('Y-m');
        })->map(function ($group) {
            return $group->sum('money');
        });
        $monthlyExtra = $payments->groupBy(function ($payment) {
            return $payment->created_at->format('Y-m');
        })->map(function ($group) {
            return $group->sum('extra_amount');
        });
        $monthlyTotalPay = $extra->groupBy(function ($extra) {
            return $extra->created_at->format('Y-m');
        })->map(function ($group) {
            return $group->sum('pay');
        });
        $monthlyTotalAdd = $extra->groupBy(function ($extra) {
            return $extra->created_at->format('Y-m');
        })->map(function ($group) {
            return $group->sum('add');
        });
        return view('crm.allPayment.index' , [
            'monthlyBonuses' => $monthlyBonuses,
            'monthlyPayment' => $monthlyPayment,
            'monthlyExtra' => $monthlyExtra,
            'monthlyTotalPay' => $monthlyTotalPay,
            'monthlyTotalAdd' => $monthlyTotalAdd
        ]);
    }
 public function students(){
     return view('crm.students.students');
 }


    public function debtors(){
        return view('crm.debtors');
    }

    public function out(){
        $student = User::all();
        return view('crm.out' , [
            'students' => $student

        ]);
    }

  public function student_payments(){
      return view('crm.payments');

  }
}
