<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
  public function register(ContactRequest $request)
  {
    $contact = $request->only(['name', 'email', 'password']);
    return view('register');
  }

  public function login(ContactRequest $request)
  {
    $contact = $request->only(['email', 'password']);
    return view('login', compact('contact'));
  }

  public function admin(Request $request)
  {
    $contact = $request->only(['name', 'gender', 'email', 'content']);
    return view('admin', compact('contact'));
  }
  
  public function index()
  {
    return view('index');
  }

  public function confirm(ContactRequest $request)
  {
    $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building', 'type', 'content']);
    session()->flash('contact_input', $contact);
    return view('confirm', compact('contact'));
  }

  public function store(ContactRequest $request)
  {
    $contact = $request->only(['name', 'gender', 'email', 'tel',  'adress', 'building', 'type', 'content']);
          Contact::create($contact);
                return view('thanks');
  }

  public function search(Request $request)
  {
      $name = $request->input('name');
      $name_type = $request->input('name_type');
      $email = $request->input('email');
      $email_type = $request->input('email_type');
      $gender = $request->input('gender');
      $inquiry_type = $request->input('inquiry_type');
      $inquiry_type_type = $request->input('inquiry_type_type');
      $inquiry_date = $request->input('inquiry_date');
      $query = Contact::query();
      if ($name) {
          if ($name_type === 'exact') {
              $query->where('name', $name); // 完全一致
          } else {
              $query->where('name', 'LIKE', "%{$name}%"); // 部分一致 (デフォルト)
            }
      }

      if ($email) {
          if ($email_type === 'exact') {
              $query->where('email', $email); 
          } else {
              $query->where('email', 'LIKE', "%{$email}%"); 
          }
      }
      if ($gender) {
          if ($gender !== '') {
              $query->where('gender', $gender); 
        }
      }

      if ($inquiry_type) {
          if ($inquiry_type_type === 'exact') {
              $query->where('inquiry_type', $inquiry_type); 
              $query->where('inquiry_type', 'LIKE', "%{$inquiry_type}%"); 
          }
      }

      if ($inquiry_date) {
          $query->where('inquiry_date', $inquiry_date); 
      }

      $contacts = $query->paginate(7);

      return view('admin', ['contacts' => $contacts]);
    }
  
}
