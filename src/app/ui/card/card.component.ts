import { NgClass } from "@angular/common";
import { Component, input } from "@angular/core";

@Component({
	selector: "app-card",
	imports: [NgClass],
	templateUrl: "./card.component.html",
	styleUrl: "./card.component.scss",
})
export class CardComponent {
	public title = input<string | undefined>();
	public size = input<"sm" | "md">("md");
}
