import { Component } from "@angular/core";
import { AlertComponent } from "./alert/alert.component";
import { BadgeComponent } from "./badge/badge.component";
import { ButtonComponent } from "./button/button.component";
import { CardComponent } from "./card/card.component";
import { DropdownComponent } from "./dropdown/dropdown.component";

@Component({
	selector: "app-ui",
	templateUrl: "./ui.component.html",
	imports: [
		AlertComponent,
		BadgeComponent,
		ButtonComponent,
		CardComponent,
		DropdownComponent,
	],
})
export class UiComponent {}
