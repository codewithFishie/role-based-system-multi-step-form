<?php

namespace App\Livewire;

use App\Mail\UserIdCreatedMail;
use App\Models\Application;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class MultiStepForm extends Component
{
    public $currentStep = 1;

    public $name = '';
    public $email = '';

    public $phone = '';
    public $address = '';
    public $date_of_birth = '';
    public $gender = '';

    public $institution = '';
    public $department = '';
    public $semester = '';

    public $skills = '';

    protected function generateLoginId(): string
    {
        do {
            $loginId = 'USR-' . strtoupper(Str::random(8));
        } while (User::where('login_id', $loginId)->exists());

        return $loginId;
    }

    protected function generateTemporaryPassword(): string
    {
        return strtoupper(Str::random(10));
    }

    public function nextStep()
    {
        if ($this->currentStep == 1) {
            $this->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email',
                'phone' => 'required|string|max:20',
                'address' => 'required|string|max:255',
                'date_of_birth' => 'required|date',
                'gender' => 'required|string|max:20',
            ]);
        }

        if ($this->currentStep == 2) {
            $this->validate([
                'institution' => 'required|string|max:255',
                'department' => 'required|string|max:255',
                'semester' => 'required|string|max:50',
            ]);
        }

        if ($this->currentStep < 3) {
            $this->currentStep++;
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function submitForm()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|max:20',
            'institution' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'semester' => 'required|string|max:50',
            'skills' => 'nullable|string|max:1000',
        ]);

        $loginId = $this->generateLoginId();
        $temporaryPassword = $this->generateTemporaryPassword();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => 'user',
            'login_id' => $loginId,
            'must_change_password' => true,
            'password' => Hash::make($temporaryPassword),
        ]);

        Application::create([
            'user_id' => $user->id,
            'phone' => $this->phone,
            'address' => $this->address,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'institution' => $this->institution,
            'department' => $this->department,
            'semester' => $this->semester,
            'skills' => $this->skills,
        ]);

        Mail::to($user->email)->send(new UserIdCreatedMail($user, $temporaryPassword));

        return redirect()->route('signin')->with(
            'status',
            'Registration completed successfully. Your User ID and temporary password have been sent to ' . $user->email . '.'
        );
    }

    public function render()
    {
        return view('livewire.multi-step-form');
    }
}