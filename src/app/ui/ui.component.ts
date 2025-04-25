import { Component } from "@angular/core";
import { AlertComponent } from "./alert/alert.component";
import { BadgeComponent } from "./badge/badge.component";

@Component({
  selector: 'app-ui',
  templateUrl: './ui.component.html',
  imports: [AlertComponent, BadgeComponent],
})
export class UiComponent {}
