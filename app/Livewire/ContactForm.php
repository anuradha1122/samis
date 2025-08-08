<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmission;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Log;

class ContactForm extends Component
{
    #[Validate('required|string|min:3|max:50')]
    public $name = '';

    #[Validate('required|email:rfc,dns|max:100')]
    public $email = '';

    #[Validate('required|string|min:5|max:100')]
    public $subject = '';

    #[Validate('required|string|min:10|max:1000')]
    public $message = '';

    public function submit()
    {
        // Rate limiting (5 attempts per minute per IP)
        $executed = RateLimiter::attempt(
            'contact-form:'.request()->ip(),
            $perMinute = 5,
            function() {
                $this->validate();

                try {
                    // Sanitize inputs
                    $cleanData = [
                        'name' => htmlspecialchars($this->name, ENT_QUOTES, 'UTF-8'),
                        'email' => filter_var($this->email, FILTER_SANITIZE_EMAIL),
                        'subject' => htmlspecialchars($this->subject, ENT_QUOTES, 'UTF-8'),
                        'message' => htmlspecialchars($this->message, ENT_QUOTES, 'UTF-8'),
                    ];

                    // Send email (create this mail class with: php artisan make:mail ContactFormSubmission)
                    // Mail::to(config('mail.contact_to'))
                    //     ->send(new ContactFormSubmission($cleanData));

                    // Reset form
                    $this->name = '';
                    $this->email = '';
                    $this->subject = '';
                    $this->message = '';
                    
                    // Flash success message
                    session()->flash('status', 'success');
                    session()->flash('message', 'Your message has been sent successfully!');

                    return redirect()->route('landing.contact');
                    
                } catch (\Exception $e) {
                    Log::error('Contact form submission failed: '.$e->getMessage());
                    session()->flash('status', 'error');
                    session()->flash('message', 'Failed to send message. Please try again later.');
                }
            }
        );

        if (!$executed) {
            session()->flash('status', 'error');
            session()->flash('message', 'Too many attempts. Please wait a minute and try again.');
        }
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}