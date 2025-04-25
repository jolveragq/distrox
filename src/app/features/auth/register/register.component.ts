import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { FormBuilder, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';

@Component({
  selector: 'app-register',
  imports: [ReactiveFormsModule, CommonModule],
  templateUrl: './register.component.html',
  styleUrl: './register.component.scss'
})
export class RegisterComponent {
    registerForm: FormGroup;

    constructor(private fb: FormBuilder) {
      this.registerForm = this.fb.group({
        fullName: ['', Validators.required],
        email: ['', [Validators.required, Validators.email]],
        password: ['', [Validators.required, Validators.minLength(8)]],
        terms: [false, Validators.requiredTrue]
      });
    }

    onSubmit(): void {
      if (this.registerForm.valid) {
        console.log('Register form submitted', this.registerForm.value);
        // Aquí iría la lógica de registro
      } else {
        this.registerForm.markAllAsTouched();
      }
    }
  }
