import { Component, HostListener, OnInit } from "@angular/core";
import { RegisterComponent } from "../register/register.component";
import { LoginComponent } from "../login/login.component";
import { CommonModule } from "@angular/common";

@Component({
	selector: "app-auth-container",
	imports: [RegisterComponent, LoginComponent, CommonModule],
	templateUrl: "./auth-container.component.html",
	styleUrl: "./auth-container.component.scss",
})
export class AuthContainerComponent implements OnInit {
	isRegisterActive = false;
	isMobile = false;

	constructor() {}

	ngOnInit(): void {
		this.checkScreenSize();
	}

	@HostListener("window:resize", ["$event"])
	onResize() {
		this.checkScreenSize();
	}

	checkScreenSize(): void {
		this.isMobile = window.innerWidth <= 768;
	}

	toggleForm(): void {
		this.isRegisterActive = !this.isRegisterActive;
	}

	get coverTitle(): string {
		return this.isRegisterActive ? "¿Ya tiene una cuenta?" : "¿Nuevo aquí?";
	}

	get coverText(): string {
		return this.isRegisterActive
			? "Inicie sesión con sus datos para acceder a todas las funciones de nuestra plataforma."
			: "Regístrese y descubra una gran cantidad de nuevas oportunidades para expandir su negocio.";
	}

	get buttonText(): string {
		return this.isRegisterActive ? "Iniciar sesión" : "Registrarse";
	}
}
