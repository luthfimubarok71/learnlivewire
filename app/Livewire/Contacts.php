<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use App\Livewire\Forms\ContactForm;

#[Title('Contact Us')]
class Contacts extends Component
{
    public ContactForm $contactForm;
    public function createNewMessage()
    {
        $this->contactForm->store();

        session()->flash('success', 'Your message has been sent successfully!');
    }

    public function render()
    {
        return view('livewire.contacts');
    }
}
