<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Auth extends BaseController
{
    public function loginPage()
    {
      return view('auth/login.php');
    }

    public function login() {
      $username = $this->request->getPost('username');
      $password = $this->request->getPost('password');

      $userModel = new User();

      try {
        $user = $userModel->where('username', $username)->first();
        if (!password_verify($password, $user['password'])) {
          return redirect()->to('login')->with('error', 'Invalid login details');
        }
      
        session()->set('user', $user);
      } catch (\Throwable $th) {
        return redirect()->to('login')->with('error', 'Invalid login details');
      }

      return redirect()->to('dashboard');
    }

    public function registerPage() {
      return view('auth/register.php');
    }

    public function register() {
      $username = $this->request->getPost('username');
      $password = $this->request->getPost('password');
      $passwordConfirm = $this->request->getPost('password-confirm');

      if ($password != $passwordConfirm) {
        return redirect()->to('register')->with('error', 'Password did not match');
      }

      $role = $this->request->getPost('role');
      
      $userModel = new User();
      $userModel->insert([
        'first_name' => $this->request->getPost('firstname'),
        'last_name' => $this->request->getPost('lastname'),
        'role' => $role,
        'username' => $username,
        'password' => password_hash($password, PASSWORD_DEFAULT),
      ]);

      return redirect()->to('login')->with('success', 'Account created.');
    }
}
