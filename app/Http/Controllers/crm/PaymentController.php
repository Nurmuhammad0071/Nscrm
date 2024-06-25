<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Connection;
use App\Models\Course;
use App\Models\Group;
use App\Models\Month;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payment = Payment::all();
        $month = Month::latest()->get();
        return view('crm.payment.payment' ,[
            'payments' => $payment,
            'months' => $month
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $monthId = $request->input('id');
        $month = Month::find($monthId);

        // Check if the month exists
        if (!$month) {
            // Handle the case where the month doesn't exist
            // You can redirect the user or show an error message
        }

        // Get the IDs of users who have made payments for the current month
        $connectedUserIds = $month->payments->pluck('user_id')->toArray();

        // Query users who are not already connected to the current month
        $users = User::whereNotIn('id', $connectedUserIds)->get();

        return view('crm.payment.create', [
            'month' => $month,
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'users' => 'required',
            'month_id' => 'required',

        ]);
        $month_id = $request->input('month_id');
        $user_ids = $request->input('users');

          foreach ($user_ids as $user_id) {
              $pay = Payment::create([
                'month_id' => $month_id,
                'user_id' => $user_id,
                'status' => $request->input('status', 0)
            ]);
        }
//dd($pay);
        return redirect()->route('payment');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        // Find the group based on the provided ID
        $month = Month::find($id);


        // Check if the group exists
        if (!$month) {
            return redirect()->route('connection');
        }


        // Get the connected users for the current group
        $connectedUsers = $month->connectedUsers();
        $payments = Payment::where('month_id', $month->id)->get();


        return view('crm.payment.show', [
            'moth' => $month,
            'connectedUsers' => $connectedUsers,
            'payments' => $payments,

        ]);
    }
    public function pay($monthId, $userId )
    {

        $month = Month::findOrFail($monthId);
        $user = User::findOrFail($userId);
        $connectedGroups = $user->connectedGroups;

        // Retrieve payments for the specified month and user
        $payments = Payment::where('month_id', $monthId)
            ->where('user_id', $userId)
            ->get();
        $payment = $payments->where('user_id', $user->id)->first();
        $courseIds = [];
        foreach ($connectedGroups as $group) {
            $courseIds[] = $group->course_id;
        }

        // Calculate the total price for connected courses
        $totalPrice = Course::whereIn('id', $courseIds)->sum('prise'); // Use 'prise' instead of 'price'
        return view('crm.payment.pay.payment', [
            'month' => $month,
            'user' => $user,
            'payments' => $payments,
            'payment' => $payment,
            'connectedGroups' => $connectedGroups,
            'total' => $totalPrice
        ]);
    }
    public function view($monthId, $userId )
    {
        $company = Company::all();
        $month = Month::findOrFail($monthId);
        $user = User::findOrFail($userId);
        $connectedGroups = $user->connectedGroups;

        // Retrieve payments for the specified month and user
        $payments = Payment::where('month_id', $monthId)
            ->where('user_id', $userId)
            ->get();
        $payment = $payments->where('user_id', $user->id)->first();

        $courseIds = [];
        foreach ($connectedGroups as $group) {
            $courseIds[] = $group->course_id;
        }

        // Calculate the total price for connected courses
        $totalPrice = Course::whereIn('id', $courseIds)->sum('prise'); // Use 'prise' instead of 'price'



        return view('crm.payment.pay.show', [
            'month' => $month,
            'user' => $user,
            'payments' => $payments,
            'payment' => $payment,
            'connectedGroups' => $connectedGroups,
            'company' => $company,
            'total' => $totalPrice
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'month_id' => 'required',
            'user_id' => 'required',
            'type' => 'required',
            'money' => '',
        ]);

        // Retrieve the payment by ID
$payment->update([
    'month_id' => $request->month_id,
    'user_id' => $request->user_id,
    'bonus' => intval(str_replace(' ', '',$request->bonus)),
    'comment' => $request->comment,
    'type' => $request->type,
    'money' => intval(str_replace(' ', '',$request->money)),
]);
        // Get the input money amount from the form
        $inputMoney = intval(str_replace(' ', '',$request->input('money')));

        // Retrieve an array of course IDs from the form
        $courseIds = $request->input('course_ids');

        // Retrieve the associated courses based on the specified course IDs
        $totalPrice = Course::whereIn('id', $courseIds)->get()->sum('prise');

        // Calculate the total price of the specified courses

        // Check if there is a bonus amount included in the payment
        $bonus = intval(str_replace(' ', '',$request->input('bonus', 0)));

        // Calculate the total payment including the bonus
        if (is_numeric($inputMoney) && is_numeric($bonus)) {
            $totalPayment = $inputMoney + $bonus;
        } else {
            // Handle the case where one or both values are not numeric
            // You can set $totalPayment to a default value or show an error message
            $totalPayment = 0; // Or any other default value you prefer
        }
        // Update the payment status based on the total payment and course price
        if ($totalPayment >= $totalPrice) {
            $payment->status = 2; // Payment matches or exceeds the course price
        } elseif ($totalPayment >= 0.5 * $totalPrice) {
            $payment->status = 1; // Paying at least 50% of the course price
        } else {
            $payment->status = 0; // Not paying or paying less than 50% of the course price


        }
        if ($totalPayment > $totalPrice) {
            $payment->extra_amount = $totalPayment - $totalPrice; // Store the extra amount paid
        }else{
            $payment->extra_amount = 0; // Store the extra amount paid
        }
        // Save the payment record
        $payment->save();
        // Redirect back or to another page after the update


        return redirect()->route('payments.view', ['payment' => $payment->id , 'month' => $payment->month_id, 'user' => $payment->user_id])->with('success', 'Payment updated successfully.');
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payment.index');
    }
}
