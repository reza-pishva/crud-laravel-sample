<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Rules\PhoneValidationRule;
use App\Rules\UniqueCustomer;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    /**
     * @OA\PathItem(path="/")
     *
     * @OA\Info(
     *      version="1.0.0",
     *      title="Getting information"
     *  )
     */



    public function index(){
        $customers = Customer::latest()->paginate(4);
        return view('customers.index',compact('customers'));
    }



    /**
     * @OA\Get(
     *     path="/customers/{customer}",
     *     operationId="customer.show",
     *     summary="Get one of users",
     *     description="To show a user informaion in this form by using route model binding",
     *     tags={"Show a Customer"},
     *     @OA\Parameter(
     *          name="customer",
     *          description="an instance of Customer model(I have used route model binding)",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="Customer"
     *          )
     *      ),
     *     @OA\Response(response=200, description="Successful operation"),
     * )
     */
    public function show(Customer $customer){
        $title = 'Delete Information!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('customers.show',compact('customer'));
    }



    public function create(Customer $customer){
        return view('customers.create');
    }



    public function store_error(){
        return view('alerts.store_error');
    }

/**
     * @OA\Post(
     *     path="/customers",
     *     operationId="customer.store",
     *     summary="Register a new user",
     *     description="To register user informaion in this form and store it in the database",
     *     tags={"Registering"},
     *     @OA\Parameter(
     *         name="Firstname",
     *         in="query",
     *         description="User's name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="Lastname",
     *         in="query",
     *         description="User's last name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="Email",
     *         in="query",
     *         description="User's email",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="DateOfBirth",
     *         in="query",
     *         description="User's birthday",
     *         required=true,
     *         @OA\Schema(type="date")
     *     ),
     *     @OA\Parameter(
     *         name="BankAccountNumber",
     *         in="query",
     *         description="User's bank account number",
     *         required=true,
     *         @OA\Schema(type="int")
     *     ),
     *     @OA\Response(response="200", description="User registered successfully"),
     *     @OA\Response(response="422", description="Validation errors")
     * )
*/

    public function store(Request $request){

        $customer_count = Customer::where('Firstname', $request->Firstname)
        ->where('Lastname', $request->Lastname)
        ->where('DateOfBirth', $request->DateOfBirth)
        ->count();

        $request->validate([
            'Firstname'=>'required|max:15',
            'Lastname'=>'required|max:20',
            'DateOfBirth'=>'required|min:10|date',
            'PhoneNumber'=>['required',new PhoneValidationRule],
            'BankAccountNumber'=>'required|max:20|unique:customers',
            'Email'=>'required|max:30|email|unique:customers',
        ]);
        if($customer_count==0){
            Customer::create([
                'Firstname'=>$request->Firstname,
                'Lastname'=>$request->Lastname,
                'DateOfBirth'=>$request->DateOfBirth,
                'PhoneNumber'=>$request->PhoneNumber,
                'BankAccountNumber'=>$request->BankAccountNumber,
                'Email'=>$request->Email
            ]);
            Alert::success('good job', 'This information was successfully saved!!');
            return redirect()->route('customer.index');
        }else{
            return redirect()->route('customer.store_error');  
        }        
    }

    public function edit(Customer $customer){
        return view('customers.edit',compact('customer'));
    }


/**
     * @OA\Put(
     *     path="/customers/{customers}",
     *     operationId="customer.update",
     *     summary="Modifying Info",
     *     description="To modify user informaion in this form and store it in the database",
     *     tags={"Modifying"},
     *     @OA\Parameter(
     *         name="Firstname",
     *         in="query",
     *         description="User's name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="Lastname",
     *         in="query",
     *         description="User's last name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="Email",
     *         in="query",
     *         description="User's email",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="DateOfBirth",
     *         in="query",
     *         description="User's birthday",
     *         required=true,
     *         @OA\Schema(type="date")
     *     ),
     *     @OA\Parameter(
     *         name="BankAccountNumber",
     *         in="query",
     *         description="User's bank account number",
     *         required=true,
     *         @OA\Schema(type="int")
     *     ),
     *     @OA\Response(response="200", description="User registered successfully"),
     *     @OA\Response(response="422", description="Validation errors")
     * )
*/
    public function update(Request $request , Customer $customer){

        $email_count = Customer::where('Email', $request->Email)->count();
        $bankaccount_count = Customer::where('BankAccountNumber', $request->BankAccountNumber)->count();
        $customer_count = Customer::where('Firstname', $request->Firstname)
        ->where('Lastname', $request->Lastname)
        ->where('DateOfBirth', $request->DateOfBirth)
        ->count();
        
        if($customer_count > 0){
            $customer_id = Customer::where('Firstname', $request->Firstname)
            ->where('Lastname', $request->Lastname)
            ->where('DateOfBirth', $request->DateOfBirth)
            ->first()->id;

            if($customer_id == $customer->id){
                $customer_unique = true;
            }else{
                $customer_unique = false;
            }
    
        }else{
            $customer_unique = true;
        }

        if($email_count > 0){
            $customer_id = Customer::where('Email', $request->Email)->first()->id;
            if($customer_id == $customer->id){
                $email_unique = true;
            }else{
                $email_unique = false;
            }    
        }else{
            $email_unique = true;
        }

        $request->validate([
            'Firstname'=>'required|max:15',
            'Lastname'=>'required|max:20',
            'DateOfBirth'=>'required|min:10|date',
            'PhoneNumber'=>['required',new PhoneValidationRule],
            'BankAccountNumber'=>'required|max:20',
            'Email'=>'required|max:30|email',
        ]);
        if($customer_unique && $email_unique){
            $customer->update([
                'Firstname'=>$request->Firstname,
                'Lastname'=>$request->Lastname,
                'DateOfBirth'=>$request->DateOfBirth,
                'PhoneNumber'=>$request->PhoneNumber,
                'BankAccountNumber'=>$request->BankAccountNumber,
                'Email'=>$request->Email
            ]);    
            Alert::success('good job', 'This information was successfully updated!!');
            return redirect()->route('customer.index');
        }else{
            return redirect()->route('customer.update_error');  
        }
             

        
    }



    public function update_error(){
        return view('alerts.update_error');
    }


 /**
     * @OA\Delete(
     *      path="/customers/{customer}",
     *      operationId="deleteProject",
     *      tags={"Removing"},
     *      summary="Delete existing project",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="customer",
     *          description="an instance of Customer model(I have used route model binding)",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="Customer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function delete(Customer $customer){
        $customer->delete();   
        toast('Successfully deleted','success');     
        return redirect()->route('customer.index');
    }

}
