import { Component, computed, input } from "@angular/core";
import { NgClass, NgIf } from "@angular/common";

export type ButtonVariant = "primary" | "secondary" | "warning" | "danger";
export type IconPosition = "start" | "end";
export type ButtonSize = "sm" | "md" | "lg";

@Component({
	selector: "app-button",
	standalone: true,
	imports: [NgClass, NgIf],
	templateUrl: "./button.component.html",
})
export class ButtonComponent {
	// Inputs como signals
	disabled = input(false);
	variant = input<ButtonVariant>("primary");
	icon = input<string | undefined>(undefined);
	iconPosition = input<IconPosition>("start");
	size = input<ButtonSize>("md");
	outlined = input(false);

	// Computed para las clases dinámicas
	buttonClasses = computed(() => {
		const outlined = this.outlined();
		const variant = this.variant();
		const classes: { [key: string]: boolean } = {
			border: this.outlined(),

			// Variantes NO outlined
			"bg-blue-600 text-blue-50 hover:bg-blue-700 focus:ring-blue-400":
				!outlined && variant === "primary",
			"bg-gray-700 text-gray-50 hover:bg-gray-800 focus:ring-gray-500":
				!outlined && variant === "secondary",
			"bg-amber-500 text-amber-50 hover:bg-amber-600 focus:ring-amber-400":
				!outlined && variant === "warning",
			"bg-red-600 text-red-50 hover:bg-red-700 focus:ring-red-400":
				!outlined && variant === "danger",

			// Variantes outlined
			"border-blue-700 text-blue-600 hover:bg-blue-100 focus:ring-blue-500":
				outlined && variant === "primary",
			"border-gray-800 text-gray-600 hover:bg-gray-100 focus:ring-gray-500":
				outlined && variant === "secondary",
			"border-amber-700 text-amber-600 hover:bg-amber-100 focus:ring-amber-500":
				outlined && variant === "warning",
			"border-red-600 text-red-600 hover:bg-red-100 focus:ring-red-500":
				outlined && variant === "danger",

			// Tamaños
			"text-xs px-3 py-1.5": this.size() === "sm",
			"text-sm px-4 py-2": this.size() === "md",
			"text-base px-6 py-3": this.size() === "lg",
		};
		return classes;
	});

	// Computed para saber si hay icono al inicio o al final
	hasStartIcon = computed(() => this.icon() && this.iconPosition() === "start");
	hasEndIcon = computed(() => this.icon() && this.iconPosition() === "end");
}
