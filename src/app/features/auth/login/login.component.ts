import { Component, inject, signal } from "@angular/core";
import {
	FormBuilder,
	FormControl,
	FormGroup,
	ReactiveFormsModule,
	Validators,
} from "@angular/forms";

import { HlmButtonDirective } from "@spartan-ng/ui-button-helm";
import { HlmInputDirective } from "@spartan-ng/ui-input-helm";
import { HlmSelectImports } from "@spartan-ng/ui-select-helm";
import { BrnSelectImports } from "@spartan-ng/brain/select";
import { CompanyService } from "../../company/services/company.service";
import { AsyncPipe } from "@angular/common";
import { map } from "rxjs";

@Component({
	selector: "app-login",
	standalone: true,
	imports: [
		ReactiveFormsModule,
		HlmButtonDirective,
		HlmInputDirective,
		HlmSelectImports,
		BrnSelectImports,
		AsyncPipe,
	],
	templateUrl: "./login.component.html",
	providers: [CompanyService],
})
export class LoginComponent {
	companySelected = inject(CompanyService);

	submitted = signal(false);

	companies$$ = this.companySelected
		.getCompanies()
		.pipe(map((response) => response.data));

	loginForm = new FormGroup({
		company: new FormControl(null, Validators.required),
		email: new FormControl("", [Validators.required, Validators.email]),
		password: new FormControl("", [
			Validators.required,
			Validators.minLength(6),
		]),
	});

	onSubmit() {
		this.submitted.set(true);
		if (this.loginForm.invalid) return;
		console.log("Datos de login:", this.loginForm.value);
	}
}
