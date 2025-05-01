import { NgClass } from "@angular/common";
import { Component, input } from "@angular/core";

type BadgeVariant = "info" | "success" | "warning" | "error";

@Component({
	selector: "app-badge",
	standalone: true,
	imports: [NgClass],
	templateUrl: "./badge.component.html",
	styleUrl: "./badge.component.scss",
})
export class BadgeComponent {
	public readonly variant = input<BadgeVariant>("info");
}
