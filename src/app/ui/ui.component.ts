import { Component } from "@angular/core";
import { AlertComponent } from "./alert/alert.component";

@Component({
  selector: 'app-ui',
  templateUrl: './ui.component.html',
  imports: [AlertComponent],
})
export class UiComponent {}
